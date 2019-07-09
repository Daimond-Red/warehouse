@extends('layouts.master')

@section('pageBar')
	Warehouse - View
    {{-- <ul class="breadcrumb">
        <li class="breadcrumb-item text-capitalize">
            <h3>Warehouse - View {{ $model->name }}</h3>
        </li>
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.stores.index') }}">Warehouses</a></li>
        <li class="breadcrumb-item"><a href="#">Store - View</a></li>
    </ul> --}}
@stop
@section('content')
    <div id="mainPanel"></div>
    <div class="ajax-collection">
        <div class="panel panel-default">
        	<div style="overflow:hidden;" class="panel-heading">
                Items - List
                
            </div>
            <div>
                <table class="table table-striped"  >
                    <thead>
                    <tr>
                        <th data-breakpoints="xs">ID</th>
                        @if( isSuperAdmin() )
                            <th>PIA</th>
                        @endif
                        <th>Image</th>
                        <th>Item Name</th>
                        <th>Available Quantities</th>
                        <th>Unit</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(!count($items))
                        <tr>
                            <td colspan="15" class="text-center">No matching records found</td>
                        </tr>
                    @else
                        @foreach($items as $item)
                            <tr data-expanded="true">

                                <td>{{ $item->id }}</td>
                                @if( isSuperAdmin() )
                                    <td>{{ optional($item->userRel)->name  }}</td>
                                @endif
                                <td>
                                    <a href="{{ getImageUrl($item->image) }}" class="light-image">
                                        <img src="{{ getImageUrl($item->image) }}" alt="{{ $item->name }}" width="30">
                                    </a>
                                </td>
                                <td>{{ optional($item->itemMasterRel)->name }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ optional(optional($item->itemMasterRel)->unit)->unit }}</td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
        {{-- {{ $items->appends(array_merge(request()->all(), ['isAjax' => true]))->links() }} --}}
    </div>
@stop
@section('script')
    <script>
        $('document').ready(function () {
            $('.master-menu').addClass('active')
            $('.master-menu ul').show();
            $('.store-menu').addClass('active');
        });
    </script>
    
@stop