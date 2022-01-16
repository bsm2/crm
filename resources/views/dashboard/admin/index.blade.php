@extends('dashboard.index')

@section('content')

        <!-- Main content -->
        <div class="container-fluid ">
            <section class="content ">
                <div class="row ">
                    <div class="col-12">
                        <div class="card  ">
                            <div class="card-header">
                                <h2 class="card-title">@lang('site.admins')</h2>

                                <form action="" method="get">

                                    <div class="row">
            
                                        <div class="col-md-4">
                                            <input type="text" name="search" class="form-control" placeholder="@lang('site.search')" value="{{ request()->search }}">
                                        </div>
            
                                        <div class="col-md-4">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> @lang('site.search')</button>
                                            
                                                <a href="{{ route('dashboard.admin.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('site.create')</a>
                                        </div>
            
                                    </div>
                            </form><!-- end of form -->
                            </div>
                        <!-- /.card-header -->
                            <div class="card-body " >
                                @if ($admins->count()>0)
                                <table class="table table-hover" id="data-table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>@lang('site.name')</th>
                                            <th>@lang('site.email')</th>
                                            <th>@lang('site.role')</th>
                                            <th>@lang('site.action')</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($admins as $index=>$admin)
                                            <tr>
                                                <td>{{$index+1}}</td>
                                                <td>{{$admin->name}}</td>
                                                <td>{{$admin->email}}</td>
                                                <td>{{$admin->role}}</td>
                                                
                                                <td>
                                                    
                                                        <a href="{{ route('dashboard.admin.edit', $admin->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> @lang('site.edit')</a>
            
                                                        <form action="{{route('dashboard.admin.destroy', $admin->id)}}" method="post" style="display: inline-block">
                                                            
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="btn btn-danger delete btn-sm"><i class="fa fa-trash"></i> @lang('site.delete')</button>
                                                        </form><!-- end of form -->
                    
                                                    
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{-- pagination --}}
                                {{ $admins->onEachSide(2)->links('pagination::bootstrap-4') }}
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