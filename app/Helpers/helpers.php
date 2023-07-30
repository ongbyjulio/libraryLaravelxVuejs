<?php
use App\Models\Member;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Carbon\Carbon;


//note untuk nama function jangan sama dengan bawaan php
/**
 * Summary of date_formats
 * @param mixed $value
 * @return string
 */
function date_formats($value)
{
    return date('H:i:s - d M Y', strtotime($value));
}

if (!function_exists('numberWithSpaces')) {
    function numberWithSpaces($x)
    {
        return preg_replace('/\B(?=(\d{3})+(?!\d))/', '.', $x);
    }
}
//Transaction
// SELECT count(member_id),book_id from transactions 
// join transaction_details 
// on transactions.id = transaction_details.transaction_id
// WHERE member_id = 3;

// SELECT transactions.member_id, SUM(transaction_details.qty * books.price) as total from transactions
// join transaction_details
// on transactions.id = transaction_details.transaction_id
// JOIN books 
// ON transaction_details.book_id = books.id
// where member_id = 3;

if (!function_exists('getTotalBayar')) {
    function getTotalBayar($memberId, $id_transaction)
    {

        $totalPayment = \DB::table('transactions')
            ->join('transaction_details', 'transactions.id', '=', 'transaction_details.transaction_id')
            ->join('books', 'transaction_details.book_id', '=', 'books.id')
            ->select(\DB::raw('SUM(transaction_details.qty * books.price) as total'))
            ->where('transactions.member_id', $memberId)
            ->where('transactions.id', $id_transaction)
            ->first();

        return $totalPayment->total ?? 0;
    }
}

if (!function_exists('getTotalPinjam')) {
    function getTotalPinjam($Id)
    {

        $totalPinjam = Transaction::select('transactions.id')
            ->join('transaction_details', 'transactions.id', '=', 'transaction_details.transaction_id')
            ->where('transactions.id', $Id)
            ->count();
        return $totalPinjam;
    }
}

if (!function_exists('getNameMember')) {
    function getNameMember($memberId)
    {

        $nameMember = Member::where('id', $memberId)->first();

        if ($nameMember) {
            return $nameMember->name;
        }

        return null;
    }
}

if (!function_exists('getDuration')) {
    function getDuration($startDate, $endDate)
    {
        $start = Carbon::parse($startDate);
        $end = Carbon::parse($endDate);
        $duration = $end->diffInDays($start);

        return $duration;
    }
}

if (!function_exists('getMemberName')) {
    function getMemberName($memberId)
    {
        $member = Member::find($memberId);

        if ($member) {
            return $member->name;
        }

        return null;
    }
}



function getSelectedBooks($transactionId)
{ //untuk kebutuhan edit data buku
    $transactionDetails = TransactionDetail::where('transaction_id', $transactionId)->get();
    $selectedBooks = $transactionDetails->pluck('book_id')->toArray();
    return $selectedBooks;
}



//Helper Notification
function getCountDateEnd() //seluruh data terlambat
{
    $currentDate = Carbon::now();
    $dateEndTransactions = Transaction::where('date_end', '<', $currentDate)
        ->where('status', 'tidak')
        ->count();

    return $dateEndTransactions;
}

function getDataDateEnd()
{
    $currentDate = Carbon::now(); //data data yang akan dimasukkan ke perulangan
    $dateEndTransactions = Transaction::where('date_end', '<', $currentDate)
        ->get();
    return $dateEndTransactions;
}

function countDays($dateEnd)
{

    $end = Carbon::parse($dateEnd);
    $days = Carbon::now();

    $days = $end->diffInDays($days);

    return $days;
}








//End



?>