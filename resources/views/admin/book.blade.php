@extends('layouts.admin')
@section('css')
    <style type="text/css">

    </style>
@endsection

@section('content')
    <!-- DataTales Example -->
    <div id="controller">
        <div id="content-wrapper" class="d-flex flex-column">

            <div class="card shadow bg- mb-4 p-2 d-flex justify-content-center">
                <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-10 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group align-items-center m-3 d-flex justify-content-between">

                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                            aria-label="Search" aria-describedby="basic-addon2" v-model="search">
                        <div class="input-group-append">
                            <button class="btn btn-info" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                            &nbsp;
                            <a class="btn btn-info" @click="addData()">
                                <i class="fas fa-plus fa-sm"></i> <b>Add Data</b>
                            </a>
                        </div>

                    </div>
                </form>
                <!-- Content -->
            </div>

            <div class="row p-4">

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4" v-for="book in filteredList">
                    <div class="card border-bottom-info shadow h-100 py-2">
                        <div class="card-body" v-on:click="editData(book)">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2 text-center">
                                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                        <div class="h6 mb-0 font-weight-bold text-info">@{{ truncateText(book.title, 15) }}</div>
                                        <div class="mb-0 text-info font-weight-bold">(@{{ book.qty }})</div>
                                        <hr>
                                    </div>

                                    <b>Rp. @{{ numberWithSpaces(book.price) }}</b>

                                </div>
                                {{-- <div class="col-auto" v-on:click="editData(book)">
                                    <i class="fas fa-edit fa-2x text-gray-300"></i>
                                </div> --}}

                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>

        <!-- Modal Default -->
        <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createModalLabel">Books</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" @submit="submitForm($event, book.id)">

                        <input type="hidden" name="_method" value="PUT" v-if="editStatus">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="isbn">ISBN:</label>
                                <input type="number" class="form-control" id="isbn" name="isbn"
                                    :value="book.isbn" required>
                            </div>
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" id="name" name="title"
                                    :value="book.title" required>
                            </div>
                            <div class="form-group">
                                <label for="year">Tahun:</label>
                                <input type="number" class="form-control" id="year" name="year"
                                    :value="book.year" required>
                            </div>
                            <div class="form-group">
                                <label for="publisher">Publisher</label>
                                <select name="publisher_id" id="publisher" class="form-control">
                                    @foreach ($p as $publisher)
                                        <option :selected="book.publisher_id == {{ $publisher->id }}"
                                            value="{{ $publisher->id }}">{{ $publisher->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="pengarang">Pengarang</label>
                                <select name="author_id" class="form-control" id="pengarang">
                                    @foreach ($a as $author)
                                        <option :selected="book.author_id == {{ $author->id }}"
                                            value="{{ $author->id }}">{{ $author->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="catalog">Catalog</label>
                                <select name="catalog_id" class="form-control" id="catalog">
                                    @foreach ($c as $catalog)
                                        <option :selected="book.catalog_id == {{ $catalog->id }}"
                                            value="{{ $catalog->id }}">{{ $catalog->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="qty">Jumlah</label>
                                <input type="number" class="form-control" :value="book.qty" id="qty"
                                    name="qty" required>
                            </div>
                            <div class="form-group">
                                <label for="price">Harga</label>
                                <input type="number" class="form-control" :value="book.price" id="price"
                                    name="price" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" v-if="editStatus"
                                v-on:click="deleteData($event, book.id)">Delete</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('js')
    <script type="text/javascript">
        var actionUrl = '{{ url('books') }}'; //variable global
        var apiUrl = '{{ url('api/books ') }}';
    </script>
    <script src="{{ asset('js/books.js') }}"></script>
@endsection
