@extends('layouts.admin')

@section('css')
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Books</a></li>
            <li class="breadcrumb-item active" aria-current="page">Member</li>
        </ol>
    </nav>

    <!-- DataTales Example -->
    <div id="controller">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="#" class="btn btn-outline-primary" @click="addData()">Add
                    Data</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead style="background-color:rgb(203, 203, 203)">
                            <tr class="text-center">
                                <th width="10px">#</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>No Handphone</th>
                                <th>Email</th>
                                <th>Alamat</th>
                                <th>Create At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>

        <!-- Create Modal -->
        <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createModalLabel">Members</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form :action="actionUrl" method="POST" @submit="submitForm($event, data.id)">
                        @csrf

                        <!-- Update -->
                        <input type="hidden" name="_method" value="PUT" v-if="editStatus">

                        <div class="modal-body">
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" id="name" :value="data.name"
                                    name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="gender">Gender:</label>
                                <select class="form-control" id="gender" name="gender" :value="data.gender" required>
                                    <option value="">Select Gender</option>
                                    <option value="P">Perempuan</option>
                                    <option value="L">Laki-laki</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" :value="data.email"
                                    name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="phone_number">Phone Number:</label>
                                <input type="text" class="form-control" id="phone_number" :value="data.phone_number"
                                    name="phone_number" required>
                            </div>
                            <div class="form-group">
                                <label for="address">Address:</label>
                                <textarea class="form-control" id="address" name="address" :value="data.address" rows="3" required></textarea>
                            </div>

                        </div>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
        var actionUrl = '{{ url('members') }}'; //variable global
        var apiUrl = '{{ url('api/members') }}';

        //untuk kolom data '' name nya harus sama di {{ url('api/authors') }}
        var columns = [{
                data: 'DT_RowIndex',
                class: 'text-center',
                orderable: true
            },
            {
                data: 'name',
                class: 'text-center',
                orderable: false
            },
            {
                data: 'gender',
                class: 'text-center',
                orderable: false
            },
            {
                data: 'phone_number',
                class: 'text-center',
                orderable: false
            },
            {
                data: 'address',
                class: 'text-center',
                orderable: false
            },
            {
                data: 'email',
                class: 'text-center',
                orderable: false
            },
            {
                data: 'date',
                class: 'text-center',
                orderable: false
            },
            {
                render: function(index, row, data, meta) {
                    return `<a href="#" class="btn btn-outline-primary rounded-end mr-2" onclick="controller.editData(event, ${meta.row})"><i class="fas fa-edit"></i></a><a href="#" class="btn btn-outline-primary rounded-end mr-2" onclick="controller.deleteData(event, ${data.id})"><i class="fas fa-trash"></i></a>`;
                },

                orderable: false,
                width: '200px',
                class: 'text-center'
            },
        ];
    </script>
    <script src="{{ asset('js/data.js') }}"></script>
@endsection
