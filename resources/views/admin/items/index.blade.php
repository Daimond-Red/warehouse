@extends('layouts.master')

@section('pageBar')
    STOCKS
@stop
@section('content')
    <div id="mainPanel"></div>
    <div class="panel panel-default">
        <div style="overflow:hidden;" class="panel-heading">
            Stock - List

            @if( isAuth('Item', 'create') )
                <span class="pull-right">
                    <a
                        href="{{ route('admin.releaseStocks.index') }}"
                        class="btn btn-success btn-sm">
                        Release Stock
                    </a>
                    <a
                        data-id="#mainPanel"
                        data-href="{{ route('admin.items.create') }}"
                        class="dataModel btn btn-primary btn-sm">
                        Add Stock again
                    </a>
                    <a
                            data-id="#mainPanel"
                            data-href="{{ route('admin.items.create', ['is_return' => true]) }}"
                            class="dataModel btn btn-info btn-sm">
                        Add return
                    </a>
                </span>
            @endif
        </div>
        <div class="table-responsive">
            <table class="table table-striped" >
                <thead>

                <tr>
                    <th width="80">Action</th>
                    <th >ID</th>
                    {{--@if( isSuperAdmin() )--}}
                        <th>PIA</th>
                    {{--@endif--}}
                    <!-- <th>Image</th> -->
                    <th>Item Name</th>
                    <th>Warehouse</th>
                    <th>Available Quantities</th>
                    <th>Unit</th>
                    <th>Make</th>
                    <th>Model No.</th>
                    <th>Serial No.</th>
                    <th>History</th>
                    <th width="10%">Created On</th>
                </tr>
                </thead>
                <tbody>
                @if(!count($collection))
                    {{--<tr>--}}
                        {{--<td colspan="11" class="text-center"> No matching records found </td>--}}
                    {{--</tr>--}}
                @else
                    @foreach($collection as $model)
                        <tr data-expanded="true">
                            <td>
                                <div class="btn-group dropdown">
                                    <button class="btn btn-sm btn-default" data-toggle="dropdown" aria-expanded="false">Action <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a
                                                href="{{ route('admin.items.show', $model->id) }}"
                                            >
                                                View Details
                                            </a>
                                        </li>
                                        @if( isSuperAdmin() )
                                        <li>
                                            <a href="JavaScript:Void(0)"
                                            data-id="#mainPanel"
                                            data-href="{{ route('admin.items.edit', $model->id) }}"
                                            class="dataModel"
                                            >Edit</a>
                                        </li>
                                        <li>
                                            <a href="{{route('admin.items.delete', $model->id)}}"  class="deleteItem">
                                                Delete
                                            </a>
                                        </li>
                                        <li><a href="{{ route('admin.items.documents', $model->id) }}">Upload Documents</a></li>
                                        <li><a href="{{ route('admin.items.finalFiles', $model->id) }}">Final Files</a></li>
                                        @endif
                                    </ul>
                                </div>
                            </td>
                            <td>{{ $model->id }}</td>
                            {{--@if( isSuperAdmin() )--}}
                                <td>{{ optional($model->userRel)->name  }}</td>
                            {{--@endif--}}
                            
                            <!-- <td>
                                <a href="{{ getImageUrl(optional($model->itemMasterRel)->image) }}" class="thumb-sm m-r light-image open-item-description">
                                    <img src="{{ getImageUrl(optional($model->itemMasterRel)->image) }}" class="r r-2x" width="30">
                                </a>
                            </td> -->
                            <td>{{ optional($model->itemMasterRel)->name }}</td>
                            <td>
                                {{ optional($model->store)->name }}
                            </td>
                            <td>{{ $model->quantity }}</td>
                            <td>{{ optional(optional($model->itemMasterRel)->unit)->unit }}</td>
                            <td>{{ $model->make }}</td>
                            <td>{{ $model->model_number }}</td>
                            <td>{{ $model->serial_number }}</td>
                            <td>
                                <a class="btn btn-info btn-xs " href="{{ route('admin.items.history', $model->id) }}">View History</a>
                            </td>

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
        $(document).ready(function() {

            $('.master-menu').addClass('active')
            $('.master-menu ul').show();
            $('.stocklist-menu').addClass('active');

            // $('body').on('select2:select', '#ofc_color', function (e) {
            //     if( $(this).val() ) {
            //         $('.cable_drum_number').removeClass('hide');
            //     } else {
            //         $('.cable_drum_number').addClass('hide');
            //     }
            // });

        });
    </script>
@stop