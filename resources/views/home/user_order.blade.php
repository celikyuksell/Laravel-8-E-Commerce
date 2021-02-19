@extends('layouts.home')

@section('title','My Orders')

@section('content')

    <div id="breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{route('home')}}">Home</a></li>
                <li class="active">User Orders</li>
            </ul>
        </div>
    </div>
    <!-- /BREADCRUMB -->

    <!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- ASIDE -->
                <div id="aside" class="col-md-2">
                    @include('home.usermenu')
                </div>
                <!-- /ASIDE -->

                <!-- Default box -->
                <div class="card col-md-10">

                    <div class="card">

                        <!-- /.card-header -->
                        <div class="card-body">

                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>total</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th style="width: 5px" colspan="2"> Actions</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach ( $datalist as $rs)
                                    <tr>
                                        <td>{{ $rs->id}}</td>
                                        <td>{{ $rs->name}}</td>
                                        <td>{{ $rs->phone}}</td>
                                        <td>{{ $rs->email}}</td>
                                        <td>{{ $rs->address}}</td>
                                        <td>{{ $rs->total}}</td>
                                        <td>{{ $rs->created_at}}</td>
                                        <td>{{ $rs->status}}</td>
                                        <td><a href="{{route('user_order_show', ['id' => $rs->id])}}" >  <img src="{{asset('assets/admin/images')}}/edit.png" height="25"></a></td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->


                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /section -->
@endsection
