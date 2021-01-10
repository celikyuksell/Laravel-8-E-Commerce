@extends('layouts.admin')

@section('title', 'Edit Setting')
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
                        <h3>Edit Setting</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Edit Setting</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <form role="form" action="{{route('admin_setting_update')}}" method="post"  enctype="multipart/form-data">
            <section class="content">
                @csrf
                <div class="row">
                    <div class="card card-primary card-tabs col-12" >
                        <div class="card-header p-0 pt-1">
                            <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="custom-tabs-one-general-tab" data-toggle="pill" href="#custom-tabs-one-general" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">General</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-one-smtp-tab" data-toggle="pill" href="#custom-tabs-one-smtp" role="tab" aria-controls="custom-tabs-one-smtp" aria-selected="false">Smtp Email</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-one-social-tab" data-toggle="pill" href="#custom-tabs-one-social" role="tab" aria-controls="custom-tabs-one-social" aria-selected="false">Social Media</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-one-about-tab" data-toggle="pill" href="#custom-tabs-one-about" role="tab" aria-controls="custom-tabs-one-about" aria-selected="false">About Us</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-one-contact-tab" data-toggle="pill" href="#custom-tabs-one-contact" role="tab" aria-controls="custom-tabs-one-contact" aria-selected="false">Contact Page</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-one-references-tab" data-toggle="pill" href="#custom-tabs-one-references" role="tab" aria-controls="custom-tabs-one-references" aria-selected="false">References</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="custom-tabs-one-tabContent">
                                <div class="tab-pane fade show active" id="custom-tabs-one-general" role="tabpanel" aria-labelledby="custom-tabs-one-general-tab">
                                    <input type="hidden" id="id" name="id"  value="{{$data->id}}" class="form-control">
                                    <div class="form-group">
                                        <label >Title</label>
                                        <input type="text" id="title" name="title"  value="{{$data->title}}" class="form-control">
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
                                        <label >company</label>
                                        <input type="text" name="company" value="{{$data->company}}" class="form-control"   >
                                    </div>
                                    <div class="form-group">
                                        <label >Address</label>
                                        <input type="text" name="address" class="form-control"  value="{{$data->address}}"  >
                                    </div>
                                    <div class="form-group">
                                        <label >Phone</label>
                                        <input type="text" name="phone" value="{{$data->phone}}" class="form-control"   >
                                    </div>
                                    <div class="form-group">
                                        <label >email</label>
                                        <input type="text" name="email"  value="{{$data->email}}" class="form-control"   >
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
                                <div class="tab-pane fade" id="custom-tabs-one-smtp" role="tabpanel" aria-labelledby="custom-tabs-one-smtp-tab">
                                    <div class="form-group">
                                        <label >Smtp Server</label>
                                        <input type="text" name="smtpserver"  value="{{$data->smtpserver}}" class="form-control"   >
                                    </div>
                                    <div class="form-group">
                                        <label >Smtp Email</label>
                                        <input type="text" name="smtpemail"  value="{{$data->smtpemail}}" class="form-control"   >
                                    </div>
                                    <div class="form-group">
                                        <label >Smtppassword</label>
                                        <input type="password" name="smtppassword"  value="{{$data->smtppassword}}" class="form-control"   >
                                    </div>
                                    <div class="form-group">
                                        <label >Smtpport</label>
                                        <input type="number" name="smtpport"  value="{{$data->smtpport}}" class="form-control"   >
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-one-social" role="tabpanel" aria-labelledby="custom-tabs-one-social-tab">
                                    <div class="form-group">
                                        <label >Fax</label>
                                        <input type="text" name="fax"  value="{{$data->fax}}" class="form-control"   >
                                    </div>
                                    <div class="form-group">
                                        <label >Facebook</label>
                                        <input type="text" name="facebook"  value="{{$data->facebook}}" class="form-control"   >
                                    </div>
                                    <div class="form-group">
                                        <label >Instagram</label>
                                        <input type="text" name="instagram"  value="{{$data->instagram}}" class="form-control"   >
                                    </div>
                                    <div class="form-group">
                                        <label >Twitter</label>
                                        <input type="text" name="twitter"  value="{{$data->twitter}}" class="form-control"   >
                                    </div>
                                    <div class="form-group">
                                        <label >Youtube</label>
                                        <input type="text" name="youtube"  value="{{$data->youtube}}" class="form-control"   >
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-one-about" role="tabpanel" aria-labelledby="custom-tabs-one-about-tab">
                                    <div class="form-group">
                                        <label >About Us</label>
                                        <textarea id="aboutus" name="aboutus" >{{$data->aboutus}}</textarea>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-one-contact" role="tabpanel" aria-labelledby="custom-tabs-one-contact-tab">
                                    <div class="form-group">
                                        <label >References</label>
                                        <textarea id="contact" name="contact" >{{$data->contact}}</textarea>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-one-references" role="tabpanel" aria-labelledby="custom-tabs-one-references-tab">
                                    <div class="form-group">
                                        <label >references</label>
                                        <textarea id="references" name="references" >{{$data->references}}</textarea>
                                    </div>
                                    <script>
                                        $(document).ready(function() {
                                            $('#aboutus').summernote();
                                            $('#contact').summernote();
                                            $('#references').summernote();
                                        });
                                    </script>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update Setting</button>
                                </div>
                            </div>

                        </div>

                        <!-- /.card -->
                    </div>

                </div>


            </section>
            <!-- /.content -->
        </form>
    </div>
    <!-- /.content-wrapper -->

@endsection
