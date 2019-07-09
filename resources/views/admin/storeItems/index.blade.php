@extends('layouts.master')

@section('content')
    <div id="content" class="app-content" role="main">
        <div class="app-content-body ">
            <div class="bg-light lter b-b wrapper-md">
                <h1 class="m-n font-thin h3">VENDORS</h1>
            </div>
            <div class="wrapper-md">

                <div id="mainPanel">

                </div>


                <div class="panel panel-default">
                    <div style="overflow:hidden;" class="panel-heading">
                        Vendor - List
                        <span class="pull-right">
                            <a class="btn btn-primary btn-sm dataModel"
                               data-id="#mainPanel"
                               data-href="{{ route('admin.users.create') }}">Add Vendor</a></span>
                    </div>
                    <div>
                        <table class="table table-striped"  >
                            <thead>
                            <tr>
                                <th data-breakpoints="xs sm md" width="150">Action</th>
                                <th data-breakpoints="xs">ID</th>
                                <th>Image</th>
                                <th>Warehouse Name</th>
                                <th>Village</th>
                                <th>District</th>
                                <th>Address</th>
                                
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
                                                        data-href="{{ route('admin.users.edit', $model->id) }}"
                                                        class="btn btn-info btn-xs dataModel">Edit</button>
                                            </div>
                                            <div class="btn-group dropdown">
                                                <a class="deleteItem btn btn-danger btn-xs" href="{{route('admin.users.delete', $model->id)}}" >Delete</a>
                                            </div>
                                        </td>
                                        <td>{{ $model->id }}</td>
                                        <td>
                                            <img src="{{ getMediaUrl($model->image) }}" alt="{{ $model->name }}" width="30">
                                        </td>
                                        <td>{{ $model->name }}</td>
                                        <td>{{ $model->village }}</td>
                                        <td>{{ $model->district }}</td>
                                        <td>{{ $model->address }}</td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop