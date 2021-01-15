@extends('layouts.home')

@section('title','Order Items')

@section('content')

    <div id="breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{route('home')}}">Home</a></li>
                <li class="active">Order Items</li>
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

                    <div class="card-body">

                        <table class="shopping-cart-table table">
                            <thead>
                            <tr>
                                <th>Product</th>
                                <th></th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Quantity</th>
                                <th class="text-center">Total</th>
                                <th class="text-right">Status</th>
                                <th>Note </th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $total=0;
                            @endphp
                            @foreach ( $datalist as $rs)
                                <tr>
                                    <td class="thumb">
                                        @if ($rs->product->image)
                                            <img src="{{ Storage::url($rs->product->image)}}" height="30" alt="">
                                        @endif
                                    </td>
                                    <td> <a href="{{route('product',['id' => $rs->product->id,'slug' => $rs->product->slug ])}}">
                                            {{ $rs->product->title}}</a>
                                    </td>

                                    <td>{{ $rs->product->price}}</td>
                                    <td> {{$rs->quantity}}</td>
                                    <td>{{ $rs->amount}}</td>
                                    <td>{{ $rs->status}}</td>
                                    <td>{{ $rs->note}}</td>
                                    </td>
                                </tr>

                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th class="empty" colspan="2"></th>
                                <th>SUBTOTAL</th>
                                <th colspan="2" class="sub-total">${{$rs->order->total}}</th>
                            </tr>

                            </tfoot>
                        </table>

                    </div>
                    <!-- /.card-body -->



                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /section -->
@endsection
