@extends('layouts.home')

@section('title', $data->title)
@section('description'){{ $data->description }} @endsection
@section('keywords',$data->keywords)


@section('content')

    <div id="breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{route('home')}}">Home</a></li>
                <li>{{ \App\Http\Controllers\Admin\CategoryController::getParentsTree($data->category, $data->category->title) }}</li>
                <li class="active">{{$data->title}}</li>
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

                <!--  Product Details -->
                <div class="product product-details clearfix">
                    <div class="col-md-6">
                        <div id="product-main-view">
                            <div class="product-view">
                                <img src="{{ Storage::url($data->image)}}" style="height: 300px" alt="">
                            </div>

                            @foreach($datalist as $rs)

                                <div class="product-view">
                                    <img src="{{ Storage::url($rs->image)}}" style="height: 300px" alt="">
                                </div>
                            @endforeach

                        </div>
                        <div id="product-view">
                            <div class="product-view">
                                <img src="{{ Storage::url($data->image)}}" style="height: 75px" alt="">
                            </div>
                            @foreach($datalist as $rs)
                                <div class="product-view">
                                    <img src="{{ Storage::url($rs->image)}}" style="height: 75px" alt="">
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="product-body">
                            <div class="product-label">
                                <span>New</span>
                                <span class="sale">-20%</span>
                            </div>
                            <h2 class="product-name">{{$data->title}}</h2>
                            <h3 class="product-price">{{$data->price }} <del class="product-old-price">{{$data->price * 1.2}}</del></h3>
                            <div>
                                @php
                                    $avgrev = \App\Http\Controllers\HomeController::avrgreview($data->id);
                                    $countreview = \App\Http\Controllers\HomeController::countreview($data->id);
                                @endphp
                                <div class="product-rating">
                                    <i class="fa fa-star @if ($avgrev<1) -o empty @endif"></i>
                                    <i class="fa fa-star @if ($avgrev<2) -o empty @endif"></i>
                                    <i class="fa fa-star @if ($avgrev<3) -o empty @endif"></i>
                                    <i class="fa fa-star @if ($avgrev<4) -o empty @endif"></i>
                                    <i class="fa fa-star @if ($avgrev<5) -o empty @endif"></i>
                                </div>
                                <a href="#tab2">{{ $countreview  }} Review(s) {{$avgrev }}  / Add Review</a>
                            </div>
                            <p><strong>Availability:</strong> In Stock</p>
                            <p><strong>Brand:</strong> E-SHOP</p>
                            <p>{{$data->descripton}}</p>
                            <div class="product-options">
                                <ul class="size-option">
                                    <li><span class="text-uppercase">Size:</span></li>
                                    <li class="active"><a href="#">S</a></li>
                                    <li><a href="#">XL</a></li>
                                    <li><a href="#">SL</a></li>
                                </ul>
                                <ul class="color-option">
                                    <li><span class="text-uppercase">Color:</span></li>
                                    <li class="active"><a href="#" style="background-color:#475984;"></a></li>
                                    <li><a href="#" style="background-color:#8A2454;"></a></li>
                                    <li><a href="#" style="background-color:#BF6989;"></a></li>
                                    <li><a href="#" style="background-color:#9A54D8;"></a></li>
                                </ul>
                            </div>

                            <div class="product-btns">
                                <form action="{{route('user_shopcart_add',['id' => $data->id])}}" method="post">
                                    @csrf
                                    <div class="qty-input">
                                        <span class="text-uppercase">QTY: </span>
                                        <input class="input" name="quantity" type="number" value="1" max="{{$data->quantity}}">
                                    </div>
                                    <button type="submit"  class="primary-btn add-to-cart" ><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                                </form>
                                <div class="pull-right">
                                    <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                                    <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                                    <button class="main-btn icon-btn"><i class="fa fa-share-alt"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="product-tab">
                            <ul class="tab-nav">
                                <li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
                                <li><a data-toggle="tab" href="#tab1">Details</a></li>
                                <li><a data-toggle="tab" href="#tab2">Reviews ({{ $countreview  }})</a></li>
                            </ul>
                            <div class="tab-content">
                                <div id="tab1" class="tab-pane fade in active">
                                    <p>
                                        {!! $data->detail !!}
                                    </p>
                                </div>
                                <div id="tab2" class="tab-pane fade in">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="product-reviews">

                                                @foreach($reviews as $rs)
                                                    <div class="single-review">
                                                        <div class="review-heading">
                                                            <div><a href="#"> <i class="fa fa-user-o"></i> {{$rs->user->name}}</a> </div>
                                                            <div><a href="#"><i class="fa fa-clock-o"></i> {{$rs->created_at}}</a></div>
                                                            <div class="review-rating pull-right">
                                                                <i class="fa fa-star @if ($rs->rate<1) -o empty @endif"></i>
                                                                <i class="fa fa-star @if ($rs->rate<2) -o empty @endif"></i>
                                                                <i class="fa fa-star @if ($rs->rate<3) -o empty @endif"></i>
                                                                <i class="fa fa-star @if ($rs->rate<4) -o empty @endif"></i>
                                                                <i class="fa fa-star @if ($rs->rate<5) -o empty @endif"></i>
                                                            </div>
                                                        </div>
                                                        <div class="review-body">
                                                            <strong>{{$rs->subject}}</strong>
                                                            <p>{{$rs->review}}</p>
                                                        </div>
                                                    </div>
                                                @endforeach



                                                <ul class="reviews-pages">
                                                    <li class="active">1</li>
                                                    <li><a href="#">2</a></li>
                                                    <li><a href="#">3</a></li>
                                                    <li><a href="#"><i class="fa fa-caret-right"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <h4 class="text-uppercase">Write Your Review</h4>
                                            @livewire('review', ['id' => $data->id])
                                        </div>
                                    </div>



                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /Product Details -->

            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->
@endsection
