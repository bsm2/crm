@extends('dashboard.index')

@section('content')

        <!-- Main content -->
        <div class="container-fluid ">
            <section class="content ">
                <div class="row ">
                    <div class="col-12">
                        <div class="card  ">
                            <div class="card-header">
                                <h2 class="card-title">@lang('site.contactPeople')</h2>

                                <form action="" method="get">

                                    <div class="row">
            
                                        <div class="col-md-4">
                                            <input type="text" name="search" class="form-control" placeholder="@lang('site.search')" value="{{ request()->search }}">
                                        </div>
            
                                        <div class="col-md-4">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> @lang('site.search')</button>
                                            
                                            {{-- @if (auth()->user()->hasPermission('contactPeople-create')) --}}
                                                <a href="{{ route('dashboard.contactPerson.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('site.create')</a>
                                            {{-- @else
                                                <a href="#" class="btn btn-primary disabled"><i class="fa fa-plus"></i> @lang('site.add')</a>
                                            @endif --}}
                                        </div>
            
                                    </div>
                            </form><!-- end of form -->
                            </div>
                        <!-- /.card-header -->
                            <div class="card-body " >
                                @if ($contactPeople->count()>0)
                                <table class="display table table-hover" id="data-table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>@lang('site.first_name')</th>
                                            <th>@lang('site.last_name')</th>
                                            <th>@lang('site.company')</th>
                                            <th>@lang('site.email')</th>
                                            <th>@lang('site.phone')</th>
                                            <th>@lang('site.linkedin_url')</th>
                                            <th>@lang('site.action')</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($contactPeople as $index=>$contactPerson)
                                            <tr>
                                                <td>{{$index+1}}</td>
                                                <td>{{$contactPerson->first_name}}</td>
                                                <td>{{$contactPerson->last_name}}</td>
                                                <td>{{$contactPerson->company->name}}</td>
                                                <td>{{$contactPerson->email}}</td>
                                                <td>{{$contactPerson->phone}}</td>
                                                <td><a href="{{$contactPerson->linkedin_url}}">LinkedIn</a></td>
                                                
                                                <td>
                                                    
                                                    {{-- @if (auth()->user()->hasPermission('contactPeople-update')) --}}
                                                        <a href="{{ route('dashboard.contactPerson.edit', $contactPerson->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> @lang('site.edit')</a>
                                                    {{-- @else --}}
                                                        {{-- <button  class="btn btn-info disabled"><i class="fa fa-trash"></i> @lang('site.edit')</button> --}}
                                                    {{-- @endif --}}
            
                                                    {{-- @if (auth()->user()->hasPermission('contactPeople-delete')) --}}
            
                                                        <form action="{{route('dashboard.contactPerson.destroy', $contactPerson->id)}}" method="post" style="display: inline-block">
                                                            
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="btn btn-danger delete btn-sm"><i class="fa fa-trash"></i> @lang('site.delete')</button>
                                                        </form><!-- end of form -->
                    
                                                    {{-- @else --}}
                                                        {{-- <button  class="btn btn-danger disabled"><i class="fa fa-trash"></i> @lang('site.delete')</button> --}}
                                                    {{-- @endif --}}
                                                    
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{-- pagination --}}
                                {{ $contactPeople->onEachSide(2)->links('pagination::bootstrap-4') }}
                            @else
                                <h2>@lang('site.no_data_found')</h2>
                            @endif

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

    @push('js')

        <script>
            $(document).ready( function () {
                $('#data-table').DataTable({
                    "language": {
                        "sSearch":'{{__('site.search')}}',
                        'sProcessing'     :'{{__('site.sProcessing') }}',
                        'sLengthMenu'     :'{{__('site.sLengthMenu')}}',
                        'sZeroRecords'    :'{{__('site.sZeroRecords')}}',
                        'sEmptyTable'     :'{{__('site.sEmptyTable')}}',
                        'sInfo'           :'{{__('site.sInfo')}}',
                        'sInfoEmpty'      :'{{__('site.sInfoEmpty')}}',
                        'sInfoFiltered'   :'{{__('site.sInfoFiltered')}}',
                        'sInfoPostFix'    :'{{__('site.sInfoPostFix')}}',
                        'sSearch'         :'{{__('site.sSearch')}}',
                        'sUrl'            :'{{__('site.sUrl')}}',
                        'sInfoThousands'  :'{{__('site.sInfoThousands')}}',
                        'sLoadingRecords' :'{{__('site.sLoadingRecords')}}',
                        'oPaginate'       :{
                            'sFirst'         :'{{__('site.sFirst')}}',
                            'sLast'          :'{{__('site.sLast')}}',
                            'sNext'          :'{{__('site.sNext')}}',
                            'sPrevious'      :'{{__('site.sPrevious')}}',
                        },
                        'oAria'            :{
                            'sSortAscending'  :'{{__('site.sSortAscending')}}',
                            'sSortDescending' :'{{__('site.sSortDescending')}}',
                        },
                    }
                } );
            } );

        </script>
    @endpush
@endsection

