@extends('layouts.home')

@section('title','Edit Product')
@section('headerjs')
    <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
@endsection
@section('content')

    <div id="breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{route('home')}}">Home</a></li>
                <li class="active">Edit Product</li>
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

                    <!-- form start -->
                    <form role="form" action="{{route('user_product_update',['id'=>$data->id])}}" method="post"  enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label >Category</label>

                                <select class="form-control select2" name="category_id" style="width: 100%;">
                                    @foreach($datalist as $rs)
                                        <option value="{{$rs->id}}"  @if ($rs->id == $data->parent_id)  selected="selected"  @endif >
                                            {{ \App\Http\Controllers\Admin\CategoryController::getParentsTree($rs, $rs->title) }}
                                        </option>
                                    @endforeach
                                </select>

                            </div>

                            <div class="form-group">
                                <label >Title</label>
                                <input type="text" id="title" name="title"  value="{{$data->title}}" class="form-control"   >
                            </div>
                            <div class="form-group">
                                <label >Keywords</label>
                                <input type="text" name="keywords" value="{{$data->keywords}}" class="form-control"   >
                            </div>
                            <div class="form-group">
                                <label >Description</label>
                                <input type="text" name="description"  value="{{$data->description}}" class="form-control"   >
                            </div>
                            <div class="form-group">
                                <label >Price</label>
                                <input type="number" name="price" value="{{$data->price}}" class="form-control"   >
                            </div>
                            <div class="form-group">
                                <label >Quantity</label>
                                <input type="number" name="quantity" class="form-control"  value="{{$data->quantity}}"  >
                            </div>
                            <div class="form-group">
                                <label >Minquantity</label>
                                <input type="number" name="minquantity" value="{{$data->minquantity}}" class="form-control"   >
                            </div>
                            <div class="form-group">
                                <label >Tax</label>
                                <input type="number" name="tax"  value="{{$data->tax}}" class="form-control"   >
                            </div>
                            <div class="form-group">
                                <label >Detail</label>
                                <textarea id="detail" name="detail" >{{$data->detail}}</textarea>
                                <script>
                                    CKEDITOR.replace( 'detail' );
                                </script>


                            </div>
                            <div class="form-group">
                                <label  >Slug</label>
                                <input type="text" name="slug" value="{{$data->slug}}" class="form-control">
                            </div>

                            <div class="form-group">
                                <label  >Image</label>
                                <input type="file" name="image"  class="form-control">

                                @if ($data->image)
                                    <img src="{{ Storage::url($data->image)}}" height="100" alt="">
                                @endif
                            </div>


                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control select2" name="status" style="width: 100%;">
                                    <option selected="selected">{{$data->status}}</option>
                                    <option>True</option>
                                    <option>False</option>
                                </select>
                            </div>

                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update Product</button>
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
