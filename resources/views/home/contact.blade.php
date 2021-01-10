@extends('layouts.home')

@section('title', 'Contact -' . $setting->title)
@section('description'){{ $setting->description }} @endsection
@section('keywords',$setting->keywords)

@section('content')

    <div id="breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{route('home')}}">Home</a></li>
                <li class="active">Contact</li>
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
                <div class="col-md-7">
                    <h3 class="section-title">İletişim Bilgileri</h3>
                    {!! $setting->contact !!}
                </div>

                <div class="col-md-5">
                    <h3 class="section-title">İletişim Formu</h3>
                    @include('home.message')
                    <form id="checkout-form" class="clearfix" action="{{route('sendmessage')}}" method="post">
                        @csrf
                        <div class="billing-details">

                            <div class="form-group">
                                <input class="input" type="text" name="name" placeholder="Name & Surname">
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="phone" placeholder="Phone Number">
                            </div>
                            <div class="form-group">
                                <input class="input" type="email" name="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="subject" placeholder="Subject">
                            </div>
                            <div class="form-group">
                                    <textarea class="input" name="message" rows="5" placeholder="Your message">
                                    </textarea>

                            </div>


                            <div class="pull-right">
                                <button type="submit" class="primary-btn">Send Message</button>
                            </div>
                        </div>

                    </form>


                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->
@endsection
