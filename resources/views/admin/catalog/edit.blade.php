@extends('layouts.admin')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Books</a></li>
            <li class="breadcrumb-item" aria-current="page">Catalog</li>
            <li class="breadcrumb-item active" aria-current="page">Edit Data </li>
        </ol>
    </nav>

    <div class="col-lg-6">
        <!-- Default Card Example -->


        <!-- Basic Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Data Catalog</h6>
            </div>
            <div class="card-body">
                <form class="user" action="{{ url('catalogs/' . $catalog->id) }}" method="post">
                    @csrf
                    {{ method_field('PUT') }}
                    {{-- //khusus untuk edit data --}}
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user " value="{{ $catalog->name }}"
                            placeholder="Enter Name Catalog..." required name="name">
                    </div>
                    <hr class="flex-fill" width="50px"> &nbsp;&nbsp;
                    <div class="btn-group">
                        <a href="{{ url('catalogs') }}" class="btn btn-info btn-user rounded-3">
                            <i class="fas fa-chevron-circle-left"> </i> Back
                        </a>

                        <button type="submit" class="btn btn-info btn-user rounded-3">
                            <i class="fas fa-check"> </i> Kirim
                        </button>
                    </div>




                </form>
            </div>
        </div>

    </div>
@endsection
