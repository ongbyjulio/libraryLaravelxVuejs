<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Member;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Exception;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //
        return view('admin.transaction.index');
    }


    public function api(Request $request)
    {

        $transactions = Transaction::query();

        // Cek apakah parameter status dan tanggal diberikan
        if ($request->has('status') && $request->has('date')) {
            $status = $request->input('status');
            $date = $request->input('date');

            // Terapkan filter berdasarkan status dan tanggal
            $transactions->where('status', $status)->whereDate('date_start', $date);
        } elseif ($request->has('status')) {
            $status = $request->input('status');

            // Terapkan filter berdasarkan status
            $transactions->where('status', $status);
        } elseif ($request->has('date')) {
            $date = $request->input('date');

            // Terapkan filter berdasarkan tanggal
            $transactions->whereDate('date_start', $date);
        }

        $filteredTransactions = $transactions->get();

        $datatables = datatables()->of($filteredTransactions)
            ->addColumn('date', function ($transaction) {
                return date_formats($transaction->created_at);
            })
            ->addColumn('name_members', function ($transaction) {
                return getNameMember($transaction->member_id);
            })
            ->addColumn('totalPinjam', function ($transaction) {
                return getTotalPinjam($transaction->id);
            })
            ->addColumn('totalBayar', function ($transaction) {
                $getPayment = getTotalBayar($transaction->member_id, $transaction->id);
                return 'Rp.' . numberWithSpaces($getPayment) . ',00';
            })
            ->addColumn('lamaPinjam', function ($transaction) {
                return getDuration($transaction->date_start, $transaction->date_end);

            })
            ->addIndexColumn();

        return $datatables->make(true);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $members = Member::all();
        $books = Book::where('qty', '>', 0)->get();
        return view('admin.transaction.create', compact('members', 'books'))->with('success', 'Data Berhasil dibuat.');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'member_id' => 'required',
            'date_start' => 'required',
            'date_end' => 'required',
            'book_ids' => 'required|array',
            'book_ids.*' => 'exists:books,id',
            'status' => 'required',
        ]);

        // Tambah data ke table transactions
        $transaction = Transaction::create([
            'member_id' => $request->member_id,
            'date_start' => $request->date_start,
            'date_end' => $request->date_end,
            'status' => $request->status,
        ]);

        // Tambah data ke table transaction_details
        foreach ($request->book_ids as $bookId) {
            TransactionDetail::create([
                'transaction_id' => $transaction->id,
                'book_id' => $bookId,
                'qty' => 1, // Sesuaikan dengan jumlah buku yang dipilih
            ]);

            // Kurangi stok buku
            $book = Book::find($bookId);
            $book->qty -= 1; // Sesuaikan dengan jumlah buku yang dipilih
            $book->save();
        }

        return redirect('transactions')->with('success', 'Add Successfuly.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        //
        $books = Book::all();
        return view('admin.transaction.detail', compact('transaction', 'books'));
    }

    public function showTransaction(Transaction $transactions)
    {
        //
        return response()->json($transactions);
    }

    public function showDetail(Transaction $transactionDetail)
    {
        //
        $transactionDetails = TransactionDetail::where('transaction_id', $transactionDetail->id)->get();
        return response()->json($transactionDetails);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {

        $members = Member::all();
        $books = Book::where('qty', '>', 0)->get();

        //return $selectedBooks;
        return view('admin.transaction.edit', compact('members', 'books', 'transaction'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, Transaction $transaction)
    {
        $validatedData = $request->validate([
            'member_id' => 'required',
            'date_start' => 'required',
            'date_end' => 'required',
            'status' => 'required|in:ya,tidak',
            'book_ids' => 'required|array',
        ]);

        // Ambil data transaksi berdasarkan ID
        $transaction = Transaction::findOrFail($transaction->id);

        // Mengupdate data transaksi
        $transaction->fill($validatedData)->save();

        if ($validatedData['status'] == 'ya') {
            foreach ($validatedData['book_ids'] as $bookId) {
                $book = Book::findOrFail($bookId);
                $book->qty += 1;
                $book->save();
            }
        }
        // Menghitung perbedaan buku terpilih dengan buku sebelumnya pada transaksi
        $selectedBookIds = $validatedData['book_ids'];
        $previousBookIds = $transaction->books->pluck('id')->toArray();

        $booksToAdd = array_diff($selectedBookIds, $previousBookIds);
        $booksToRemove = array_diff($previousBookIds, $selectedBookIds);

        // Menambahkan data buku baru pada transaksi
        foreach ($booksToAdd as $bookId) {
            $transaction->books()->attach($bookId);
            $book = Book::findOrFail($bookId);
            $book->qty -= 1;
            $book->save();
        }

        // Menghapus data buku yang tidak dipilih pada transaksi
        foreach ($booksToRemove as $bookId) {
            $transaction->books()->detach($bookId);
            $book = Book::findOrFail($bookId);
            $book->qty += 1;
            $book->save();
        }

        // Redirect atau melakukan tindakan lainnya setelah update berhasil
        return redirect('transactions');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {

    }


    public function deleteTransaction(Transaction $id)
    {

        try {
            $transaction = Transaction::find($id->id);

            if (!$transaction || $transaction->status == 'tidak') {
                return redirect('transactions')->with('warning', 'Oppss. Status buku belum dikembalikan.');
            }


            // Hapus data dari tabel transaction_details berdasarkan transaction_id
            TransactionDetail::where('transaction_id', $id->id)->delete();
            // Hapus data dari tabel transactions
            Transaction::where('id', $id->id)->delete();

            return redirect('transactions')->with('success', 'Data tranksasi berhasil dihapus.');
        } catch (Exception $e) {
            return redirect('transactions')->with('error', 'Terjadi Error Saat Menghapus Data');
        }
    }

}