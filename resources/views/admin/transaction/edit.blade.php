@extends('layouts.admin')

@section('css')
    {{-- untuk kebutuhan select : https://select2.org/getting-started/installation --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Transaction</a>
            <li class="breadcrumb-item" aria-current="page">Edit</li>
        </ol>
    </nav>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Data Transaction</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ url('transactions/' . $transaction->id) }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="member_id">Member</label>
                    <select class="form-control" id="member_id" name="member_id">
                        <option value="">Pilih Member</option>
                        @foreach ($members as $member)
                            <option value="{{ $member->id }}"
                                {{ $transaction->member_id == $member->id ? 'selected' : '' }}>
                                {{ getMemberName($member->id) }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="date_start">Date Start</label>
                        <input type="date" class="form-control" id="date_start" name="date_start"
                            value="{{ $transaction->date_start }}">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="date_end">Date End</label>
                        <input type="date" class="form-control" id="date_end" name="date_end"
                            value="{{ $transaction->date_end }}">
                    </div>
                </div>



                <div class="form-group">
                    <label for="book_ids">Data Buku</label>
                    <select class="form-control" id="book_ids" name="book_ids[]" multiple>
                        @foreach ($books as $book)
                            <option value="{{ $book->id }}"
                                {{ in_array($book->id, getSelectedBooks($transaction->id)) ? 'selected' : '' }}>
                                {{ $book->title }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="status-ya" value="ya"
                            {{ $transaction->status == 'ya' ? 'checked' : '' }}>
                        <label class="form-check-label" for="status-ya">
                            Sudah dikembalikan
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="status-tidak" value="tidak"
                            {{ $transaction->status == 'tidak' ? 'checked' : '' }}>
                        <label class="form-check-label" for="status-tidak">
                            Belum dikembalikan
                        </label>
                    </div>
                </div>
                <a class="btn btn-primary" href="{{ url('transactions') }}"> Back</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>

        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#book_ids').select2();
        });
    </script>
@endsection
