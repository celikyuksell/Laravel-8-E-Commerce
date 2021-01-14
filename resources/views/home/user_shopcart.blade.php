@extends('layouts.home')

@section('title','My Shopcart')

@section('content')

    <div id="breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{route('home')}}">Home</a></li>
                <li class="active">Shopcart</li>
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
                                <th class="text-right"></th>
                                <th  > </th>
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
                                    </td>
                                    <td>{{ $rs->product->price}}</td>
                                    <td>
                                        <form action="{{route('user_shopcart_update',['id' => $rs->id])}}" method="post">
                                            @csrf
                                            <input  name="quantity" type="number" value="{{$rs->quantity}}" min="1" max="{{$rs->product->quantity}}" onchange="this.form.submit()">
                                        </form>

                                    </td>
                                    <td>{{ $rs->product->price * $rs->quantity}}</td>


                                    <td>
                                        <a href="{{route('user_shopcart_delete', ['id' => $rs->id])}}"  onclick="return confirm('Delete ! Are you sure?')" > <img src="{{asset('assets/admin/images')}}/delete.png" height="25"></a>

                                    </td>
                                </tr>
                                @php
                                    $total += $rs->product->price * $rs->quantity;
                                @endphp
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th class="empty" colspan="3"></th>
                                <th>SUBTOTAL</th>
                                <th colspan="2" class="sub-total">${{$total}}</th>
                            </tr>
                            <tr>
                                <th class="empty" colspan="3"></th>
                                <th>SHIPING</th>
                                <td colspan="2">Free Shipping</td>
                            </tr>
                            <tr>
                                <th class="empty" colspan="3"></th>
                                <th>TOTAL</th>
                                <th colspan="2" class="total">${{$total}}</th>
                            </tr>
                            </tfoot>
                        </table>
                        <div class="pull-right">
                            <button class="primary-btn">Place Order</button>
                        </div>
                    </div>
                    <!-- /.card-body -->



                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /section -->
@endsection
