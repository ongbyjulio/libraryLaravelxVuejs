<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Catalog;
use App\Models\Member;
use App\Models\Publisher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     *     @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // with untuk memanggil function user di model member
        // $member = Member::with('user')->get();  //untuk menampilkan data member dan foreign key nya dari table Member
        // $books = Book::with('publisher')->get();
        // $publisher = Publisher::with('books')->get();
        // return $publisher;
        // $catalog = Catalog::with('books')->get();
        // $books = Book::with('author', 'catalog', 'publisher')->get(); //menampilkan seluruh data 
        // return $books;

        // $data1 = Member::select('*')
        //         ->join('users','users.member_id','=','members.id')
        //         ->get();

        // $data2 = Member::select('*')
        //         ->leftjoin('users','users.member_id','=','members.id')
        //         ->where('users.id', NULL)
        //         ->get(); 

        // $data3 = Member::select('members.id','members.name')
        //         ->leftjoin('transactions','members.id','=','transactions.member_id')
        //         ->where('transactions.member_id', NULL)
        //         ->get(); 

        // $data4 = Member::select('members.id','members.name','members.phone_number')
        //         ->leftjoin('transactions','members.id','=','transactions.member_id')
        //         ->where('transactions.member_id','!=',NULL)
        //         ->get(); 

        // $data5 = Member::select('members.id','members.name','members.phone_number')
        //         ->leftjoin('transactions','members.id','=','transactions.member_id')
        //         ->whereNotNull('transactions.member_id')
        //         ->groupBy('members.id', 'members.name', 'members.phone_number')
        //         ->havingRaw('COUNT(transactions.member_id) > 1')
        //         ->get(); 

        // $data6 = Member::select('members.name','members.phone_number','members.address','transactions.date_start','transactions.date_end')
        //         ->leftjoin('transactions','members.id','=','transactions.member_id')
        //         ->orderBy('members.name','ASC')
        //         ->get(); 

        // $data7 = Member::select('members.name','members.phone_number','members.address','transactions.date_start','transactions.date_end')
        //         ->leftjoin('transactions','members.id','=','transactions.member_id')
        //         ->whereMonth('transactions.date_end', '=', '06')
        //         ->orderBy('members.name','ASC')
        //         ->get(); 

        // $data8 = Member::select('members.name','members.phone_number','members.address','transactions.date_start','transactions.date_end')
        //         ->leftjoin('transactions','members.id','=','transactions.member_id')
        //         ->whereMonth('transactions.date_start', '=', '05')
        //         ->orderBy('members.name','ASC')
        //         ->get(); 

        // $data9 = Member::select('members.name','members.phone_number','members.address','transactions.date_start','transactions.date_end')
        //         ->leftjoin('transactions','members.id','=','transactions.member_id')
        //         ->whereRaw('MONTH(transactions.date_start) = ?', [6])
        //         ->whereRaw('MONTH(transactions.date_end) = ?', [6])
        //         ->orderBy('members.name','ASC')
        //         ->get(); 

        // $data10 = Member::select('members.name','members.phone_number','members.address','transactions.date_start','transactions.date_end')
        //         ->leftjoin('transactions','members.id','=','transactions.member_id')
        //         ->where('members.address', 'LIKE', '%Kovacek%')
        //         ->orderBy('members.name','ASC')
        //         ->get(); 

        // $data11 = Member::select('members.name','members.phone_number','members.address','transactions.date_start','transactions.date_end')
        //         ->leftjoin('transactions','members.id','=','transactions.member_id')
        //         ->where('members.address', 'LIKE', '%Kovacek%')
        //         ->where('members.gender', '=', 'P')
        //         ->orderBy('members.name','ASC')
        //         ->get(); 

        // $data12 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end', 'books.isbn', 'transaction_details.qty')
        //         ->join('transactions', 'members.id', '=', 'transactions.member_id')
        //         ->join('transaction_details', 'transactions.id', '=', 'transaction_details.transaction_id')
        //         ->join('books', 'transaction_details.book_id', '=', 'books.id')
        //         ->where('transaction_details.qty', '>', 1)
        //         ->orderBy('members.name', 'ASC')
        //         ->get();

        // $data13 = Member::select('members.name','members.phone_number','members.address','transactions.date_start','transactions.date_end','books.isbn','transaction_details.qty','books.title','books.price',DB::raw('transaction_details.qty * books.price as total_harga'))
        //         ->join('transactions','members.id','=','transactions.member_id')
        //         ->join('transaction_details','transactions.id','=','transaction_details.transaction_id')
        //         ->join('books','transaction_details.book_id','=','books.id')
        //         ->get();

        // $data14 = Member::select('members.name','members.phone_number','members.address','transactions.date_start','transactions.date_end','books.isbn','transaction_details.qty','books.title','publishers.name as publisher_name','authors.name as author_name','catalogs.name as catalog_name')
        //         ->Join('transactions','members.id','=','transactions.member_id')
        //         ->Join('transaction_details','transactions.id','=','transaction_details.transaction_id')
        //         ->Join('books','transaction_details.book_id','=','books.id')
        //         ->Join('publishers','books.publisher_id','=','publishers.id')
        //         ->Join('authors','books.author_id','=','authors.id')
        //         ->Join('catalogs','books.catalog_id','=','catalogs.id')
        //         ->orderBy('transactions.date_start','ASC')
        //         ->get();

        // $data15 = Catalog::select('catalogs.id','catalogs.name', 'books.title')
        //     ->join('books', 'catalogs.id', '=', 'books.catalog_id')
        //     ->get();

        // $data16 = Book::select('books.*', 'publishers.name as publisher_name')
        //         ->leftJoin('publishers', 'books.publisher_id', '=', 'publishers.id')
        //         ->get();

        // $data17 = Book::where('author_id', 20)->count();

        // $data18 = Book::select('books.*')
        //         ->where('price', '>', 10000)
        //         ->get();

        // $data19 = Book::select('books.*')
        //         ->where('author_id','=','20')
        //         ->where('qty','>','14')
        //         ->get();

        // $data20 = Member::select('members.*')
        //         ->whereMonth('created_at','=','05')
        //         ->orderBy('name','ASC')
        //         ->get();

        //return $data20;
        return view('home');
    }
}