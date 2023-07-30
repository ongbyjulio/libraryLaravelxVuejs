<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{

    //Untuk security agar bisa diakses harus login dulu!
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('admin.author');
    }

    public function api()
    {
        $authors = Author::all();

        //untuk kebutuhan memanggil helper
        //cara 1
        // foreach ($authors as $key => $author) {
        //     $author->date = date_formats($author->created_at);
        // }
        //cara 2 mengguanakan yajra tables
        $datatables = datatables()->of($authors)
            ->addColumn('date', function ($author) {
                return date_formats($author->created_at);
            })->addIndexColumn();

        return $datatables->make(true);
    }

    /**   * Show the form for creating a new resource.
     */
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
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone_number' => ['required', 'string', 'max:15'],
            'address' => ['required', 'string'],

        ]);

        Author::create($request->all());

        return redirect('authors');
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Author $author)
    {
        //
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone_number' => ['required', 'string', 'max:15'],
            'address' => ['required', 'string'],

        ]);




        $author->update($request->all());

        return redirect('authors');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        //
        $author->delete();

        return redirect('authors');
    }
}