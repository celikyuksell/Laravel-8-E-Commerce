@extends('layouts.admin')

@section('title', 'Users List')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h3>Users</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Users</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">

                <div class="card">

                    <!-- /.card-header -->
                    <div class="card-body">

                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th></th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Roles</th>
                                <th style="width: 5px" colspan="2"> Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ( $datalist as $rs)
                                <tr>
                                    <td>{{ $rs->id}}</td>
                                    <td>
                                        @if ($rs->profile_photo_path)
                                            <img src="{{ Storage::url($rs->profile_photo_path)}}" height="50" style="border-radius: 10px" alt="">
                                        @endif
                                    </td>
                                    <td>{{ $rs->name}}</td>
                                    <td>{{ $rs->email}}</td>
                                    <td>{{ $rs->phone}}</td>
                                    <td>{{ $rs->address}}</td>
                                    <td> @foreach($rs->roles as $row)
                                        {{ $row->name }},
                                        @endforeach
                                        <a href="{{route('admin_user_roles',['id' => $rs->id])}}" onclick="return !window.open(this.href, '','top=100 left=300 width=800,height=600')">
                                        <i class="nav-icon fas fa-plus-circle"></i>
                                        </a>
                                    </td>

                                    <td><a href="{{route('admin_user_edit', ['id' => $rs->id])}}" >  <img src="{{asset('assets/admin/images')}}/edit.png" height="25"></a></td>
                                    <td>
                                        <a href="{{route('admin_user_delete', ['id' => $rs->id])}}"  onclick="return confirm('Delete ! Are you sure?')" > <img src="{{asset('assets/admin/images')}}/delete.png" height="25"></a>

                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->



                <!-- /.card-body -->
                <div class="card-footer">
                    Footer
                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection

@section('footer')
    <script src="{{ asset('assets')}}/admin/plugins/jquery-knob/jquery.knob.min.js"></script>
    <script src="{{ asset('assets')}}/admin/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('assets')}}/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('assets')}}/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('assets')}}/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endsection
