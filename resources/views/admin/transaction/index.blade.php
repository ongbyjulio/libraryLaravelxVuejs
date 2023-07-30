@extends('layouts.admin')

@section('css')
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Transaction</a></li>
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
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session('warning'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ session('warning') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div id="controller">
        <div class="container">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row flex-nowrap">
                        <div class="col-md-3">
                            <a href="{{ url('transactions/create') }}" class="btn btn-outline-primary btn-sm">Add Data</a>
                        </div>

                        <div class="col-md-9">
                            <div class="form-inline float-md-right">
                                <label for="filterStatus">Filter Status:</label>
                                <select id="filterStatus" class="form-control mx-sm-2" v-model="selectedStatus"
                                    @change="applyFilters">
                                    <option value="" disabled>--Pilih Option--</option>
                                    <option value="all" selected>All</option>
                                    <option value="tidak">Belum Dikembalikan</option>
                                    <option value="ya">Sudah Dikembalikan</option>
                                </select>
                                <label for="filterTanggal">Filter Tanggal Pinjam:</label>

                                <input type="date" id="filterTanggal" class="form-control mx-sm-2"
                                    v-model="selectedTanggal" @change="applyFilters">
                            </div>
                        </div>

                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="dataTables">
                            <thead class="bg-secondary text-light">
                                <tr>
                                    <th scope="col">Date Start</th>
                                    <th scope="col">Date End</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">(Days)</th>
                                    <th scope="col">Book</th>
                                    <th scope="col">Payment</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>

                        </table>

                    </div>
                </div>


            </div>
        </div>

    </div>
@endsection

@section('js')
    <script type="text/javascript">
        var actionUrlDetails = '{{ url('transaction_details') }}';
        var actionUrl = '{{ url('transactions') }}'; //variable global
        var apiUrl = '{{ url('api/transactions') }}';

        //untuk kolom data '' name nya harus sama di {{ url('api/authors') }}
        var columns = [{
                data: 'date_start',
                class: 'text-center',
                orderable: true
            },
            {
                data: 'date_end',
                class: 'text-center',
                orderable: false
            },
            {
                data: 'name_members',
                class: 'text-center',
                orderable: false
            },
            {
                data: 'lamaPinjam',
                class: 'text-center',
                orderable: false
            },
            {
                data: 'totalPinjam',
                class: 'text-center',
                orderable: false
            },
            {
                data: 'totalBayar',
                class: 'text-center',
                orderable: false
            },
            //<span class="badge badge-danger">Belum dikembalikan</span>' : '<span class="badge badge-primary">Sudah dikembalikan</span>
            {
                render: function(index, row, data, meta) {
                    if (data.status === 'ya') {
                        return `<span class="badge badge-primary">Sudah dikembalikan</span>`;
                    } else {
                        return `<span class="badge badge-danger">Belum dikembalikan</span>`;
                    }
                },
                class: 'text-center',
                orderable: false
            },


            {
                render: function(index, row, data, meta) {
                    return `<a href="{{ url('transactions/${data.id}/edit') }}" class="btn btn-outline-primary rounded-end mr-2"><i class="fas fa-edit"></i></a>
                    <a href="{{ url('/api/transactions/${data.id}/delete') }}" class="btn btn-outline-danger rounded-end mr-2" ><i class="fas fa-trash"></i></a>
                    <a href="{{ url('/transactions/${data.id}') }}" class="btn btn-outline-success rounded-end mr-2" ><i class="fas fa-eye"></i></a>`;
                },

                orderable: false,
                width: '200px',
                class: 'text-center'
            },
        ];

        var controller = new Vue({
            el: "#controller",
            data: {
                transactions: [],
                transaction: {},
                selectedStatus: '',
                selectedTanggal: '',
                actionUrl, // = actionUrl : actionUrl
                apiUrl,
                //editStatus: false,
            },

            mounted: function() {
                this.get_transactions();
            },
            methods: {
                applyFilters() {
                    this.get_transactions();
                },
                get_transactions() {
                    const _this = this;
                    const filterStatus = document.getElementById('filterStatus').value;
                    const filterTanggal = document.getElementById('filterTanggal').value;
                    let url = _this.apiUrl;

                    // if (filterStatus !== '' || filterTanggal !== '') {
                    // Tambahkan parameter filter berdasarkan status jika dipilih

                    if (filterStatus === 'all') {
                        this.selectedTanggal = '';
                        url += '?=' + filterStatus;
                    }

                    if (filterStatus !== '') {
                        url += '?status=' + filterStatus;
                    }

                    // Tambahkan parameter filter berdasarkan tanggal jika dipilih
                    if (filterTanggal !== '') {
                        this.selectedStatus = '';
                        url += (filterStatus !== '' ? '&' : '?') + 'date=' + filterTanggal;
                    }



                    if (_this.table) {
                        _this.table.destroy();
                    }

                    _this.table = $("#dataTables")
                        .DataTable({
                            ajax: {
                                url: url,
                                type: "GET",
                            },
                            columns,
                            paging: false,
                            searching: false,
                            //diedit sebelum columns: columns
                        })
                        .on("xhr", function() {
                            _this.transactions = _this.table.ajax.json().data;
                        });

                },



            },

            //untuk mematikan inilisasi bawaan datatables
            mounted: function() {

                this.get_transactions();
            },


        });
    </script>
@endsection
