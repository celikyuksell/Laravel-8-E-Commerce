@extends('layouts.home')

@section('title','Add Product')
@section('headerjs')
    <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
@endsection
@section('content')

    <div id="breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{route('home')}}">Home</a></li>
                <li class="active">Add Product</li>
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
                    <form role="form" action="{{route('user_product_store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label >Category</label>

                                <select class="form-control select2" name="category_id" style="width: 100%;">
                                    @foreach($datalist as $rs)
                                        <option value="{{$rs->id}}"> {{ \App\Http\Controllers\Admin\CategoryController::getParentsTree($rs, $rs->title) }} </option>
                                    @endforeach
                                </select>

                            </div>

                            <div class="form-group">
                                <label >Title</label>
                                <input type="text" id="title" name="title" class="form-control"   >
                            </div>
                            <div class="form-group">
                                <label >Keywords</label>
                                <input type="text" name="keywords" class="form-control"   >
                            </div>
                            <div class="form-group">
                                <label >Description</label>
                                <input type="text" name="description" class="form-control"   >
                            </div>
                            <div class="form-group">
                                <label >Price</label>
                                <input type="number" name="price" value="0" class="form-control"   >
                            </div>
                            <div class="form-group">
                                <label >Quantity</label>
                                <input type="number" name="quantity" class="form-control"  value="1"  >
                            </div>
                            <div class="form-group">
                                <label >Minquantity</label>
                                <input type="number" name="minquantity" value="5" class="form-control"   >
                            </div>
                            <div class="form-group">
                                <label >Tax</label>
                                <input type="number" name="tax"  value="18" class="form-control"   >
                            </div>
                            <div class="form-group">
                                <label >Detail</label>
                                <textarea id="detail" name="detail" ></textarea>
                                <script>
                                    CKEDITOR.replace( 'detail' );
                                </script>
                            </div>
                            <div class="form-group">
                                <label  >Slug</label>
                                <input type="text" name="slug" class="form-control"   >
                            </div>

                            <div class="form-group">
                                <label  >Image</label>
                                <input type="file" name="image"  class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control select2" name="status" style="width: 100%;">
                                    <option selected="selected">False</option>
                                    <option>True</option>
                                </select>
                            </div>

                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Add Product</button>
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
