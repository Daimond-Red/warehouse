@extends('layouts.master')

@section('pageBar')
    Vendors
@stop
@section('content')
    <div id="mainPanel"></div>
    <div class="ajax-collection">
        <div class="panel panel-default">
            <div style="overflow:hidden;" class="panel-heading">
                Vendor - List
                <span class="pull-right">

                @if( isAuth( 'Vendor', 'create' ) )
                <a class="btn btn-primary btn-sm dataModel"
                   data-id="#mainPanel"
                   data-href="{{ route('admin.vendors.create') }}">Add Vendor</a>
                @endif

            </span>
            </div>
            <div>
                <table class="table table-striped"  >
                    <thead>
                    <tr>
                        <th data-breakpoints="xs sm md" width="150">Action</th>
                        <th data-breakpoints="xs">ID</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Package</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(!count($collection))
                        <tr>
                            <td colspan="15" class="text-center">No matching records found</td>
                        </tr>
                    @else
                        @foreach($collection as $model)
                            <tr data-expanded="true">
                                <td>
                                    @if( isAuth( 'Vendor', 'edit' ) )
                                    <div class="btn-group dropdown">
                                        <button
                                                data-id="#mainPanel"
                                                data-href="{{ route('admin.vendors.edit', $model->id) }}"
                                                class="btn btn-info btn-xs dataModel">Edit</button>
                                    </div>
                                    @endif

                                    @if( isAuth( 'Vendor', 'destroy' ) )
                                    <div class="btn-group dropdown">
                                        <a class="deleteItem btn btn-danger btn-xs" href="{{route('admin.vendors.delete', $model->id)}}" >Delete</a>
                                    </div>
                                    @endif
                                </td>
                                <td>{{ $model->id }}</td>
                                <td>{{ $model->name }}</td>
                                <td>{{ $model->phone }}</td>
                                <td>{{ $model->package }}</td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
        {{ $collection->appends(array_merge(request()->all(), ['isAjax' => true]))->links() }}
    </div>
@stop

@section('script')
    <script>
        $(document).ready(function(){
            $('.master-menu').addClass('active')
            $('.master-menu ul').show();
            $('.vendor-menu').addClass('active');
        });
    </script>
@stop