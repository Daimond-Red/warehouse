@extends('layouts.master')

@section('pageBar')
    Admin Users
@stop

@section('content')
    <div id="mainPanel"></div>
    <div class="panel panel-default">
        <div style="overflow:hidden;" class="panel-heading">
            Admin Users
            <span class="pull-right">
                            <a class="btn btn-primary btn-sm dataModel"
                               data-id="#mainPanel"
                               data-href="{{ route('admin.adminUsers.create') }}">Add New</a></span>
        </div>
        <div>
            <table class="table table-striped"  >
                <thead>
                <tr>
                    <th data-breakpoints="xs sm md" width="150">Action</th>
                    <th data-breakpoints="xs">ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <!-- <th>Status</th> -->
                    <th>Created On</th>
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
                                <div class="btn-group dropdown">
                                    <button
                                            data-id="#mainPanel"
                                            data-href="{{ route('admin.adminUsers.edit', $model->id) }}"
                                            class="btn btn-info btn-xs dataModel">Edit</button>
                                </div>
                                <div class="btn-group dropdown">
                                    <a class="deleteItem btn btn-danger btn-xs" href="{{route('admin.adminUsers.delete', $model->id)}}" >Delete</a>
                                </div>
                            </td>
                            <td>{{ $model->id }}</td>
                            <td>{{ $model->name }}</td>
                            <td>{{ $model->email }}</td>
                            
                            <td>{{ getDateValue($model->created_at) }}</td>
                            
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('script')
    <script>
        $(document).ready(function () {
             $('.adminuser-menu').addClass('active');
        });
    </script>
@stop