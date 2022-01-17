@extends('dashboard.index')

@section('content')
    @section('breadcumb')
        <li class="breadcrumb-item active"><a href="{{route('dashboard.company.index')}}">@lang('site.companies')</a> </li>
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
                            <form action="{{route('dashboard.company.update', $company->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
        
                                <div class="form-group">
                                    <label>@lang('site.en.name')</label>
                                    <input type="text" name="name_en" class="form-control" value="{{ $company['name_en']}}">
                                </div>
                                <div class="form-group">
                                    <label>@lang('site.ar.name')</label>
                                    <input type="text" name="name_ar" class="form-control" value="{{ $company['name_ar']}}">
                                </div>
                                <div class="form-group">
                                    <label>@lang('site.email')</label>
                                    <input type="email" name="email" class="form-control" value="{{ $company->email }}">
                                </div>
        
                                <div class="form-group">
                                    <label>@lang('site.image')</label>
                                    <input type="file" name="logo" class="form-control image" value="{{ $company->image_path }}">
                                </div>
        
                                <div class="form-group">
                                    <img src="{{ $company->logo_path }}"  style="width: 100px" class="img-thumbnail image-preview" alt="">
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