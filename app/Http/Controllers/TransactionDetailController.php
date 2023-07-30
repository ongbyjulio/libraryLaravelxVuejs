<?php

namespace App\Http\Controllers;

use App\Models\TransactionDetail;
use Illuminate\Http\Request;

class TransactionDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */

    public function api()
    {
        $details = TransactionDetail::all();

        //untuk kebutuhan memanggil helper
        //cara 1
        // foreach ($authors as $key => $author) {
        //     $author->date = date_formats($author->created_at);
        // }
        //cara 2 mengguanakan yajra tables
        $datatables = datatables()->of($details);


        return $datatables->make(true);
    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(TransactionDetail $transactionDetail)
    {
        //
        $transactionDetails = TransactionDetail::where('transaction_id', $transactionDetail->id)->get();
        return response()->json($transactionDetails);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TransactionDetail $transactionDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TransactionDetail $transactionDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TransactionDetail $transactionDetail)
    {
        //
    }
}