<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Catalog;
use App\Models\Member;
use App\Models\Publisher;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    // 
    public function dashboard()
    {
        $total_anggota = Member::count();
        $total_buku = Book::count();
        $total_peminjam = Transaction::whereMonth('date_start', date('m'))->count();
        $total_penerbit = Publisher::count();

        $data_penerbit = Book::select(DB::raw("count(publisher_id) as total"))->groupby("publisher_id")->orderby("publisher_id", "asc")->pluck('total');
        $label_penerbit = Publisher::orderBy("publishers.id", "asc")->join("books", "books.publisher_id", "=", "publishers.id")->groupby("name")->pluck('name');

        $data_catalog = Book::select(DB::raw("count(catalog_id) as total"))->groupby("catalog_id")->orderby("catalog_id", "asc")->pluck('total');
        $label_catalog = Catalog::orderBy("catalogs.id", "asc")->join("books", "books.catalog_id", "=", "catalogs.id")->groupby("name")->pluck('name');


        $label_bar = ['Peminjaman', 'Pengembalian'];
        $data_bar = [];

        foreach ($label_bar as $key => $value) {
            $data_bar[$key]['label'] = $label_bar[$key];
            //$data_bar[$key]['backgroundColor'] = $key == 0 ? 'rgba(60,141,188,0.9)' : 'rgba(210,214,222,1)';
            $data_bar[$key]['lineTension'] = 0.3;
            $data_bar[$key]['backgroundColor'] = 'rgba(78, 115, 223, 0.05)';
            $data_bar[$key]['borderColor'] = 'rgba(78, 115, 223, 1)';
            $data_bar[$key]['pointRadius'] = 3;
            $data_bar[$key]['pointBackgroundColor'] = 'rgba(78, 115, 223, 1)';
            $data_bar[$key]['pointBorderColor'] = 'rgba(78, 115, 223, 1)';
            $data_bar[$key]['pointHoverRadius'] = 3;
            $data_bar[$key]['pointHoverBackgroundColor'] = 'rgba(78, 115, 223, 1)';
            $data_bar[$key]['pointHoverBorderColor'] = 'rgba(78, 115, 223, 1)';
            $data_bar[$key]['pointHitRadius'] = 10;
            $data_bar[$key]['pointBorderWidth'] = 2;

            $data_month = [];
            foreach (range(1, 12) as $month) {
                if ($key == 0) {
                    $data_month[] = Transaction::select(DB::raw("COUNT(*) as total"))->whereMonth('date_start', $month)->first()->total;
                } else {
                    $data_month[] = Transaction::select(DB::raw("COUNT(*) as total"))->whereMonth('date_end', $month)->first()->total;
                }
            }

            $data_bar[$key]['data'] = $data_month;


        }

        //return $data_bar;
        return view('admin.dashboard', compact('total_anggota', 'total_buku', 'total_peminjam', 'total_penerbit', 'data_penerbit', 'label_penerbit', 'data_bar', 'data_catalog'));
    }
}