<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Catalog;
use App\Models\Publisher;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class BookController extends Controller
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
        if (auth()->user()->can('index buku')) {
            $p = Publisher::all();
            $c = Catalog::all();
            $a = Author::all();
            return view('admin.book', compact('p', 'c', 'a'));
        } else {
            return response()->view('errors.403', [], 403);
        }
    }

    public function api()
    {
        $books = Book::all();
        return json_encode($books);
    }

    public function test_spatie()
    {
        // $role = Role::create(['name' => 'petugas']);
        // $permission = Permission::create(['name' => 'index buku']);

        // $role->givePermissionTo($permission);
        // $permission->assignRole($role);
        // $user = User::where('id', 1)->first();
        // $user->assignRole('petugas');
        // return $user;

        // return $permission;
    }

    /**
     * Show the form for creating a new resource.
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
            'isbn' => ['required', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
            'year' => ['required', 'string', 'max:255'],
            'publisher_id' => ['required', 'string', 'max:255'],
            'author_id' => ['required', 'string', 'max:255'],
            'catalog_id' => ['required', 'string', 'max:255'],
            'qty' => ['required', 'string', 'max:255'],
            'price' => ['required', 'string', 'max:255'],
        ]);

        Book::create($request->all());

        return redirect('books');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        //
        $this->validate($request, [
            'isbn' => ['required', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
            'year' => ['required', 'string', 'max:255'],
            'publisher_id' => ['required', 'string', 'max:255'],
            'author_id' => ['required', 'string', 'max:255'],
            'catalog_id' => ['required', 'string', 'max:255'],
            'qty' => ['required', 'string', 'max:255'],
            'price' => ['required', 'string', 'max:255'],
        ]);
        $book->update($request->all());

        return redirect('books');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
        $book->delete();

        return redirect('books');
    }
}