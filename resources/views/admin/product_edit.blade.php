@extends('layouts.admin')

@section('title', 'Edit Product')
@section('javascript')

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h3>Edit Product</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Edit Product</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Product</h3>

                </div>
                <div class="card-body">


                    <!-- form start -->
                    <form role="form" action="{{route('admin_product_update',['id'=>$data->id])}}" method="post"  enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label >Parent</label>

                                <select class="form-control select2" name="category_id" style="width: 100%;">
                                    @foreach ( $datalist as $rs)
                                        <option value="{{$rs->id}}"   @if ($rs->id == $data->category_id)  selected="selected"  @endif > {{ $rs->title}} </option>
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
                                    $(document).ready(function() {
                                        $('#detail').summernote();
                                    });
                                </script>


                            </div>
                            <div class="form-group">
                                <label  >Slug</label>
                                <input type="text" name="slug" value="{{$data->slug}}" class="form-control">
                            </div>

                            <div class="form-group">
                                <label  >Image</label>
                                <input type="file" name="image" value="{{$data->image}}" class="form-control">

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




                    <!-- /.card-body -->
                    <div class="card-footer">
                        ..
                    </div>
                    <!-- /.card-footer-->
                </div>
                <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
