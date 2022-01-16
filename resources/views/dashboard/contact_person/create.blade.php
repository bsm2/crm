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
                            <form action="{{route('dashboard.contactPerson.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('POST')
        
                                <div class="form-group">
                                    <label>@lang('site.first_name')</label>
                                    <input type="text" name="first_name" class="form-control" value="{{  old('first_name') }}">
                                </div>
                                <div class="form-group">
                                    <label>@lang('site.last_name')</label>
                                    <input type="text" name="last_name" class="form-control" value="{{  old('last_name') }}">
                                </div>
                                <div class="form-group">
                                    <label>@lang('site.email')</label>
                                    <input type="email" name="email" class="form-control" value="{{  old('email') }}">
                                </div>

                                <div class="form-group">
                                    <label>@lang('site.phone')</label>
                                    <input type="phone" name="phone" class="form-control" value="{{  old('phone') }}">
                                </div>
        
                                <div class="form-group">
                                    <label>@lang('site.company')</label>
                                    <select name="company_id" class="form-control">
                                        <option value="">@lang('site.companies')</option>
                                        @foreach ($companies as $company)
                                            <option name ="company_id"value="{{ $company->id }}" {{ old('company_id') == $company->id ? 'selected' : '' }}>{{ $company->name }}</option>
                                        @endforeach
                                    </select>
                        
                                </div>

                                <div class="form-group">
                                    <label>@lang('site.linkedin_url')</label>
                                    <input type="url" name="linkedin_url" class="form-control" value="{{  old('linkedin_url') }}">
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