<!-- HOME -->
<div id="home">
    <!-- container -->
    <div class="container">
        <!-- home wrap -->
        <div class="home-wrap">
            <!-- home slick -->
            <div id="home-slick">
            @php
                $i=0;
            @endphp
            @foreach($slider as $rs)
                @php
                    $i+= 1;
                @endphp
                <!-- banner -->
                    <div class="banner banner-1 @if($i==1)active @endif ">
                        <img src="{{ Storage::url($rs->image)}}" style="height: 500px" alt="">
                        <div class="banner-caption text-center ">
                            <h3>{{$rs->title}}</h3>
                            <h3 class="white-color font-weak">{{$rs->price}}t</h3>
                            <a href="{{route('product',['id' => $rs->id,'slug' => $rs->slug ])}}" class="primary-btn">Shop Now</a>
                        </div>

                    </div>
                    <!-- /banner -->
                @endforeach


            </div>
            <!-- /home slick -->
        </div>
        <!-- /home wrap -->
    </div>
    <!-- /container -->
</div>
<!-- /HOME -->
