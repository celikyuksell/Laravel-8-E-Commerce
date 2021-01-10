<!-- Google font -->
<link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">
<!-- Bootstrap -->
<link type="text/css" rel="stylesheet" href="{{ asset('assets')}}/css/bootstrap.min.css" />
<!-- Slick -->
<link type="text/css" rel="stylesheet" href="{{ asset('assets')}}/css/slick.css" />
<link type="text/css" rel="stylesheet" href="{{ asset('assets')}}/css/slick-theme.css" />
<!-- nouislider -->
<link type="text/css" rel="stylesheet" href="{{ asset('assets')}}/css/nouislider.min.css" />
<!-- Font Awesome Icon -->
<link rel="stylesheet" href="{{ asset('assets')}}/css/font-awesome.min.css">
<!-- Custom stlylesheet -->
<link type="text/css" rel="stylesheet" href="{{ asset('assets')}}/css/style.css" />


<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Message Detail</h3>
            @include('home.message')
        </div>
        <div class="card-body">


            <!-- form start -->
            <form role="form" action="{{route('admin_message_update',['id'=>$data->id])}}" method="post"  enctype="multipart/form-data">
                @csrf
                <div class="card-body">

                    <table id="example1" class="table table-bordered table-striped">

                        <tr>
                            <th>Id</th> <td>{{ $data->id}}</td>
                        </tr>
                        <th>Name</th><td>{{ $data->name}}</td>
                        </tr>
                        <tr>
                            <th>Email</th>  <td>{{ $data->email}}</td>
                        <tr>
                        </tr>
                        <th>Phone</th>  <td>{{ $data->phone}}</td>
                        <tr>
                        </tr>
                        <th>Subject</th><td>{{ $data->subject}}</td>
                        <tr>
                        </tr>
                        <th>Message</th>   <td>{{ $data->message}}</td>
                        <tr>
                        </tr>
                        <th>Admin Note</th>
                        <td>
                            <textarea id="note" name="note" >{{ $data->note}} </textarea>

                        </td>
                        <tr>
                            <td></td>
                            <td>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update Message</button>
                                </div>
                            </td>
                        </tr>
                    </table>

                </div>
                <!-- /.card-body -->


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
