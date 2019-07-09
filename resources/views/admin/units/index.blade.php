@extends('layouts.master')

@section('pageBar')
    Units
@stop
@section('content')
    <div id="mainPanel"></div>
    <div class="ajax-collection">
        <div class="panel panel-default">
            <div style="overflow:hidden;" class="panel-heading">
                Units - List

                @if( isAuth( 'Unit', 'create' ) )
                <span class="pull-right">
                            <a class="btn btn-primary btn-sm dataModel"
                               data-id="#mainPanel"
                               data-href="{{ route('admin.units.create') }}">Add Unit</a></span>
                @endif

            </div>
            <div>
                <table class="table table-striped" ui-jq="footable" >
                    <thead>
                    <tr>
                        <th width="150">Action</th>
                        <th data-breakpoints="xs">ID</th>
                        <th>Unit Name</th>
                        <th>Abbreviation</th>
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
                                    @if( isAuth( 'Unit', 'edit' ) )
                                    <div class="btn-group dropdown">
                                        <button
                                                data-id="#mainPanel"
                                                data-href="{{ route('admin.units.edit', $model->id) }}"
                                                class="btn btn-info btn-xs dataModel">Edit</button>
                                    </div>
                                    @endif

                                    @if( isSuperAdmin() )
                                    <div class="btn-group dropdown">
                                        <a class="deleteItem btn btn-danger btn-xs" href="{{route('admin.units.delete', $model->id)}}" >Delete</a>
                                    </div>
                                    @endif

                                </td>
                                <td>{{ $model->id }}</td>
                                <td>{{ $model->title }}</td>
                                <td>{{ $model->unit }}</td>
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
            $('.unit-menu').addClass('active');
        });
    </script>
@stop