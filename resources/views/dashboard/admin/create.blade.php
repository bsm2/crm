@extends('dashboard.index')

@section('content')
    @section('breadcumb')
        <li class="breadcrumb-item active"><a href="{{route('dashboard.admin.index')}}">@lang('site.admins')</a> </li>
        <li class="breadcrumb-item active">@lang('site.create') </li>
    @endsection
    <!-- Main content -->
    <div class="container-fluid ">
        <section class="content ">
            <div class="row ">
                <div class="col-12">
                    <div class="card  ">
                        <div class="card-header">
                            <h3 class="card-title ">@lang('site.create')</h3>
                            
                        </div>
                    <!-- /.card-header -->
                        <div class="card-body " >
                            <h4>
                                @include('partials.errors')
                            </h4>
                            <form action="{{route('dashboard.contactPerson.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('POST')
        
                                <div class="form-group">
                                    <label>@lang('site.name')</label>
                                    <input type="text" name="name" class="form-control" value="{{  old('name') }}">
                                </div>
                                <div class="form-group">
                                    <label>@lang('site.email')</label>
                                    <input type="email" name="email" class="form-control" value="{{  old('email') }}">
                                </div>
                                <div class="form-group">
                                    <label>@lang('site.password')</label>
                                    <input type="password" name="password" class="form-control" value="">
                                </div>

                                <div class="form-group">
                                    <label>@lang('site.role')</label>
                                    <input type="string" name="role" class="form-control" value="{{  old('role') }}">
                                </div>
        
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> @lang('site.create')</button>
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