@extends('layouts.admin')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Books</a></li>
            <li class="breadcrumb-item active" aria-current="page">Catalog</li>
        </ol>
    </nav>
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{ url('catalogs/create') }}" class="btn btn-outline-primary">Add Data</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead style="background-color:rgb(203, 203, 203)">
                        <tr class="text-center">
                            <th width="10px">#</th>
                            <th>Name</th>
                            <th>Total Buku</th>
                            <th>Create At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($catalogs as $key)
                            <tr>
                                <td class="text-center">{{ $no++ }}</td>
                                <td>{{ $key->name }}</td>
                                <td class="text-center">{{ count($key->books) }}</td>
                                <td class="text-center">{{ date_formats($key->created_at) }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ url('catalogs/' . $key->id . '/edit') }}"
                                            class="btn btn-outline-primary rounded-end mr-2">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>

                                        <form action="{{ url('catalogs', ['id' => $key->id]) }}" method="POST">
                                            @method('delete')
                                            @csrf
                                            <button type="button" class="btn btn-outline-danger" data-toggle="modal"
                                                data-target="#confirmDeleteModal{{ $key->id }}">
                                                <li class="fas fa-trash"></li> Delete
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="confirmDeleteModal{{ $key->id }}"
                                                tabindex="-1" role="dialog"
                                                aria-labelledby="confirmDeleteModalLabel{{ $key->id }}"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="confirmDeleteModalLabel{{ $key->id }}">Confirm
                                                                Delete</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure you want to delete this catalog?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Cancel</button>
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </form>
                                    </div>

                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
