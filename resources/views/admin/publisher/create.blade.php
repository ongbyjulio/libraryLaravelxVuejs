@extends('layouts.admin')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Books</a></li>
            <li class="breadcrumb-item" aria-current="page">Publisher</li>
            <li class="breadcrumb-item active" aria-current="page">Add Data</li>
        </ol>
    </nav>

    <div class="col-xl-8 col-lg-10">
        <!-- Default Card Example -->


        <!-- Basic Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Data publisher</h6>

            </div>





            <div class="card-body">
                <form class="user" action="{{ url('publishers') }}" method="post">
                    @csrf
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="text" class="form-control form-control-user"
                                placeholder="Enter Name publisher..." required autofocus name="name"
                                value="{{ old('name') }}">
                        </div>
                        <div class="col-sm-6">
                            <input type="email" class="form-control form-control-user"
                                placeholder="Enter Email publisher..." required name="email" value="{{ old('email') }}">
                        </div>

                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="tel" class="form-control form-control-user"
                                placeholder="Enter Phone Number publisher..." required name="phone_number"
                                value="{{ old('phone_number') }}">
                        </div>
                        <div class="col-sm-6">
                            <input type="text" class="form-control form-control-user"
                                placeholder="Enter Address publisher..." required name="address"
                                value="{{ old('address') }}">
                        </div>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <hr class="" width="50px"> &nbsp;&nbsp;
                    <div class="btn-group form-group row">
                        <a href="{{ url('publishers') }}" class="btn btn-info btn-user rounded-3">
                            <i class="fas fa-chevron-circle-left"> </i> Back
                        </a>

                        <button type="submit" class="btn btn-info btn-user rounded-3">
                            <i class="fas fa-check"> </i> Kirim
                        </button>
                    </div>


                </form>
            </div>

        </div>
    @endsection
