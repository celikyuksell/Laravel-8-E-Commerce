@extends('layouts.home')

@section('title','My Reviews')

@section('content')

    <div id="breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{route('home')}}">Home</a></li>
                <li class="active">Reviews</li>
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

                <!-- MAIN -->
                <div id="main" class="col-md-10">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Product</th>
                            <th>Subject</th>
                            <th>Review</th>
                            <th>Rate</th>
                            <th>Status</th>
                            <th>Date</th>

                            <th style="width: 5px" colspan="3"> Actions</th>

                        </tr>
                        </thead>
                        <tbody>
                        @include('home.message')
                        @foreach ( $datalist as $rs)
                            <tr>
                                <td>{{ $rs->id}}</td>

                                <td> <a href="{{route('product',['id' => $rs->product->id,'slug' => $rs->product->slug ])}}" target="_blank">
                                        {{ $rs->product->title}} </a>
                                </td>
                                <td>{{ $rs->subject}}</td>
                                <td>{{ $rs->review}}</td>
                                <td>{{ $rs->rate}}</td>
                                <td>{{ $rs->status}}</td>
                                <td>{{ $rs->created_at}}</td>


                                <td>
                                    <a href="{{route('admin_review_delete', ['id' => $rs->id])}}"  onclick="return confirm('Delete ! Are you sure?')" > <img src="{{asset('assets/admin/images')}}/delete.png" height="25"></a>

                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>

            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->
@endsection
