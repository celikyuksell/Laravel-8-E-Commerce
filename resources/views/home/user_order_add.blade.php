@extends('layouts.home')

@section('title', 'Order Products')


@section('content')

    <div id="breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{route('home')}}">Home</a></li>
                <li class="active">Order</li>
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
                <form id="checkout-form" action="{{route('user_order_store')}}" method="post" class="clearfix">
                    @csrf
                    <div class="col-md-6">
                        <div class="billing-details">

                            <div class="section-title">
                                <h3 class="title">Order Details</h3>

                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="name" value="{{ Auth::user()->name }}" placeholder="Name & Surname">
                            </div>

                            <div class="form-group">
                                <input class="input" type="email" name="email"  value="{{ Auth::user()->email }}" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="address"  value="{{ Auth::user()->address }}" placeholder="Address">
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="phone"  value="{{ Auth::user()->phone }}" placeholder="Phone Number">
                            </div>

                        </div>
                    </div>

                    <div class="col-md-6">

                        <div class="payments-methods">
                            <div class="section-title">
                                <h4 class="title">Payments Detail Total = $ {{$total}} </h4>
                            </div>
                            <div class="input-checkbox">
                                <input type="hidden" name="total" value="{{$total}}">


                            </div>

                            <div class="form-group">
                                <input class="input" type="text" name="cardname" value="{{ Auth::user()->name }}" placeholder=" Card Name & Surname">
                            </div>

                            <div class="form-group">
                                <input class="input" type="number" name="cardnumber"  value="" placeholder="Card Number">
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="dates"  value="" placeholder="Valid Dates mm/yy">
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="key"  value="" placeholder="Secret number">
                            </div>

                        </div>
                    </div>


                            <div class="pull-right">
                                <button class="primary-btn">Place Order</button>
                            </div>
                        </div>

                    </div>
                </form>

            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->
@endsection
