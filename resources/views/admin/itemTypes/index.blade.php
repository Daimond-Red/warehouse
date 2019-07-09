@extends('layouts.master')

@section('pageBar')
    Item Type
@stop
@section('content')

    <div id="mainPanel"></div>
    <div class="ajax-collection">
        <div class="panel panel-default">
            <div style="overflow:hidden;" class="panel-heading">
                Item Type - List

                @if( isAuth('ItemType', 'create') )
                <span class="pull-right">
                <a class="btn btn-primary btn-sm dataModel"
                   data-id="#mainPanel"
                   data-href="{{ route('admin.itemTypes.create') }}">Add</a></span>
                @endif

            </div>
            <div>
                <table class="table table-striped" ui-jq="footable" >
                    <thead>
                    <tr>
                        @if( isAuth('ItemType', 'edit') || isAuth('ItemType', 'destroy') )
                        <th width="150">Action</th>
                        @endif
                        <th>ID</th>
                        <th>Title</th>
                        <th>Tag</th>
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
                                @if( isAuth('ItemType', 'edit') || isAuth('ItemType', 'destroy') )
                                <td>
                                    @if( isAuth('ItemType', 'edit') )
                                    <div class="btn-group dropdown">
                                        <button
                                                data-id="#mainPanel"
                                                data-href="{{ route('admin.itemTypes.edit', $model->id) }}"
                                                class="btn btn-info btn-xs dataModel">Edit</button>
                                    </div>
                                    @endif

                                    @if( isSuperAdmin() )
                                    <div class="btn-group dropdown">
                                        <a class="deleteItem btn btn-danger btn-xs" href="{{route('admin.itemTypes.delete', $model->id)}}" >Delete</a>
                                    </div>
                                    @endif

                                </td>
                                @endif
                                <td>{{ $model->id }}</td>
                                <td>{{ $model->title }}</td>
                                <td>{{ $model->tag }}</td>
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
            $('.stock-menu').addClass('active');
        });
    </script>
@stop