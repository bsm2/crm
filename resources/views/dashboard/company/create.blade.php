@extends('dashboard.index')

@section('content')
    @section('breadcumb')
        <li class="breadcrumb-item active"><a href="{{route('dashboard.company.index')}}">@lang('site.companies')</a> </li>
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
                            <form action="{{route('dashboard.company.store')}}" method="POST" enctype="multipart/form-data">
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
                                    <label>@lang('site.website_url')</label>
                                    <input type="url" name="website_url" class="form-control" value="{{  old('website_url') }}">
                                </div>
        
                                <div class="form-group">
                                    <label>@lang('site.logo')</label>
                                    <input type="file" name="logo" class="form-control image" value="{{ old('logo') }}">
                                </div>
        
                                {{-- <div class="form-group">
                                    <img src="{{ $company->image_path }}"  style="width: 100px" class="img-thumbnail image-preview" alt="">
                                </div> --}}
        
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-add"></i> @lang('site.create')</button>
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