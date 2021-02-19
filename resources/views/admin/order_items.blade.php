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
            <h3 class="card-title">Order Detail</h3>
            @include('home.message')
        </div>
        <div class="card-body">


            <!-- form start -->

            <div class="card-body">
                <form role="form" action="{{route('admin_order_update',['id'=>$data->id])}}" method="post">
                    @csrf
                    <table id="example1" class="table table-bordered table-striped">
                        <tr>
                            <th>Id</th> <td>{{ $data->id}}</td>
                        </tr>
                        <tr>
                            <th>User</th><td>{{ $data->user->name}}</td>
                        </tr>
                        <tr>
                            <th>Name</th><td>{{ $data->name}}</td>
                        </tr>
                        <tr>
                            <th>Address</th>  <td>{{ $data->address }}</td>
                        </tr>
                        <tr>
                            <th>Phone</th>  <td>{{ $data->phone}}</td>
                        </tr>
                        <tr>
                            <th>Email</th><td>{{ $data->email}}</td>
                        </tr>
                        <tr>
                            <th>Total</th>   <td>{{ $data->total}}</td>
                        </tr>
                        <tr>
                            <th>Ip</th>   <td>{{ $data->IP}}</td>
                        </tr>
                        <tr>
                            <th>Created Date </th>   <td>{{ $data->created_at}}</td>
                        </tr>
                        <tr>
                            <th>Updated Date </th>   <td>{{ $data->updated_at}}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>
                                <select name="status">
                                    <option selected>{{ $data->status}}</option>
                                    <option>Accepted</option>
                                    <option>Canceled</option>
                                    <option>Shipping</option>
                                    <option>Completed</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Admin Note: </th>
                            <td> <textarea name="note" rows="3" cols="30"> {{ $data->note}} </textarea></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update Order</button>
                                </div>
                            </td>
                        </tr>
                    </table>
                </form>

                <table class="shopping-cart-table table">
                    <thead>
                    <tr>
                        <th>Product</th>
                        <th></th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Quantity</th>
                        <th class="text-center">Total</th>
                        <th class="text-right">Status</th>
                        <th>Note </th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $total=0;
                    @endphp
                    @foreach ( $datalist as $rs)
                        <form role="form" action="{{route('admin_order_item_update',['id'=>$rs->id])}}" method="post">
                            @csrf
                            <tr>
                                <td class="thumb">
                                    @if ($rs->product->image)
                                        <img src="{{ Storage::url($rs->product->image)}}" height="30" alt="">
                                    @endif
                                </td>
                                <td> <a href="{{route('product',['id' => $rs->product->id,'slug' => $rs->product->slug ])}}">
                                        {{ $rs->product->title}}</a>
                                </td>

                                <td>{{ $rs->product->price}}</td>
                                <td> {{$rs->quantity}}</td>
                                <td>{{ $rs->amount}}</td>

                                <td><select name="status">
                                        <option selected>{{ $rs->status}}</option>
                                        <option>Accepted</option>
                                        <option>Canceled</option>
                                        <option>Shipping</option>
                                        <option>Completed</option>
                                    </select>
                                </td>
                                <td> <textarea name="note"  cols="15"> {{ $rs->note}} </textarea></td>
                                <td> <input type="submit" value="Update" ></td>

                            </tr>
                        </form>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th class="empty" colspan="2"></th>
                        <th>SUBTOTAL</th>
                        <th colspan="2" class="sub-total">${{$rs->order->total}}</th>
                    </tr>

                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->

            <!-- /.card-body -->
            <div class="card-footer">
                ..
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->
    </div>
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
