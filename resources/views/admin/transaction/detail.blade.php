@extends('layouts.admin')

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Transaction</a></li>
            <li class="breadcrumb-item" aria-current="page">Detail Transaction </li>
        </ol>
    </nav>
    {{-- {{ $transaction->id }} --}}

    <hr>
    <div class="card text-center col-lg-7 p-2">
        <div class="card-header text-left ">
            Periode : <b class="text-dark">{{ $transaction->date_start }} - {{ $transaction->date_end }}</b>
        </div>
        <div class="card-body">
            <h3 class="card-title">{{ getNameMember($transaction->id) }}</h3>
            <hr>
            <p class="card-text">Data Buku :
            <ul class="list-group list-group-flush">
                @foreach ($transaction->books as $book)
                    <li class="list-group-item list-group-item-secondary" value="{{ $book->id }}">
                        {{ $book->title }}
                    </li>
                @endforeach
            </ul>
            <hr>
            Status :
            @if ($transaction->status == 'tidak')
                <span class="badge badge-dark">Belum Dikembalikan</span>
            @endif
            @if ($transaction->status == 'ya')
                <span class="badge badge-success">Sudah Dikembalikan</span>
            @endif
            </p>
            <hr>

        </div>
        <div class="card-footer text-muted">
            <a href="{{ url('transactions') }}" class="btn btn-primary">Back</a>
        </div>
    </div>
    <hr>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#book_ids').select2();
        });
    </script>
@endsection
