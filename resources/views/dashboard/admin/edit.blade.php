@extends('dashboard.index')

@section('content')
    @section('breadcumb')
        <li class="breadcrumb-item active"><a href="{{route('dashboard.admin.index')}}">@lang('site.admins')</a> </li>
        <li class="breadcrumb-item active">@lang('site.edit') </li>
    @endsection
    <!-- Main content -->
    <div class="container-fluid ">
        <section class="content ">
            <div class="row ">
                <div class="col-12">
                    <div class="card  ">
                        <div class="card-header">
                            <h3 class="card-title ">@lang('site.edit')</h3>
                            
                        </div>
                    <!-- /.card-header -->
                        <div class="card-body " >
                            <form action="{{route('dashboard.admin.update', $admin->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
        
                                <div class="form-group">
                                    <label>@lang('site.name')</label>
                                    <input type="text" name="name" class="form-control" value="{{ $admin->name }}">
                                </div>

                                <div class="form-group">
                                    <label>@lang('site.email')</label>
                                    <input type="email" name="email" class="form-control" value="{{ $admin->email }}">
                                </div>

                                <div class="form-group">
                                    <label>@lang('site.password')</label>
                                    <input type="password" name="password" class="form-control" value="">
                                </div>
                                
                                <div class="form-group">
                                    <label>@lang('site.role')</label>
                                    <input type="string" name="role" class="form-control" value="{{  $admin->role }}">
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> @lang('site.edit')</button>
                                </div>
        
                            </form>


                        </div>
                    <!-- /.card-body -->
                    </div>
                <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        <section >
    </div><!-- /.container-fluid -->

@endsection