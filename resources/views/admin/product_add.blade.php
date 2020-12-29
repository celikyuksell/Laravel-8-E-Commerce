@extends('layouts.admin')

@section('title', 'Add Product')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h3>Add Product</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Add Product</li>
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
                    <h3 class="card-title">Add Product</h3>

                </div>
                <div class="card-body">


                    <!-- form start -->
                    <form role="form" action="{{route('admin_product_store')}}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label >Parent</label>

                                <select class="form-control select2" name="category_id" style="width: 100%;">
                                    @foreach ( $datalist as $rs)
                                        <option value="{{ $rs->id}}">{{ $rs->title}}</option>
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

                                <input type="text" name="detail" class="form-control"   >
                            </div>
                            <div class="form-group">
                                <label  >Slug</label>
                                <input type="text" name="slug" class="form-control"   >
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
