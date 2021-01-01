<html>
<head>
    <title>Image Gallery</title>
    <link rel="stylesheet" href="{{ asset('assets')}}/admin/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('assets')}}/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('assets')}}/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('assets')}}/admin/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets')}}/admin/dist/css/adminlte.min.css">
</head>
<body>

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Product : {{$data->title}}</h3>
                </div>
                <div class="card-body">
                    <!-- form start -->
                    <form role="form" action="{{route('admin_image_store',['product_id'=>$data->id])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label >Title</label>
                                <input type="text" id="title" name="title" class="form-control"   >
                            </div>
                            <div class="form-group">
                                <label  >Image</label>
                                <input type="file" name="image"  class="form-control">
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Add Image</button>
                        </div>
                    </form>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Title(s)</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ( $images as $rs)
                            <tr>
                                <td>{{ $rs->id}}</td>
                                <td>{{ $rs->title}}</td>
                                <td>
                                    @if ($rs->image)
                                        <img src="{{ Storage::url($rs->image)}}" height="60" alt="">
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('admin_image_delete', ['id' => $rs->id,'product_id'=>$data->id])}}"  onclick="return confirm('Record will be Delete ! Are you sure?')" >
                                        <img src="{{asset('assets/admin/images')}}/delete.png" height="25"></a></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        ..
                    </div>
                    <!-- /.card-footer-->
                </div>
                <!-- /.card -->
            </div>

</body>
</html>
