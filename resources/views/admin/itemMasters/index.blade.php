@extends('layouts.master')

@section('pageBar')
    Items
@stop
@section('content')
    <div id="mainPanel"></div>
    <div class="ajax-collection">
        <div class="panel panel-default">
            <div style="overflow:hidden;" class="panel-heading">
                Items - List

                @if( isAuth( 'ItemMaster', 'create' ) )
                <span class="pull-right">
                            <a class="btn btn-primary btn-sm dataModel"
                               data-id="#mainPanel"
                               data-href="{{ route('admin.itemMasters.create') }}">Add Item</a></span>
                @endif

            </div>
            <div>
                <table class="table table-striped"  >
                    <thead>
                    <tr>
                        @if( isAuth( 'ItemMaster', 'edit' ) || isAuth( 'ItemMaster', 'destroy' ) )
                            <th width="150">Action</th>
                        @endif
                        <th data-breakpoints="xs">ID</th>
                        @if( isSuperAdmin() )
                            <th>PIA</th>
                        @endif
                        <th>Image</th>
                        <th>Item Name</th>
                        <th>Description</th>
                        <th>Item Type</th>
                        <th>Unit</th>
                        <th>Created At</th>
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
                                @if( isAuth( 'ItemMaster', 'edit' ) || isAuth( 'ItemMaster', 'destroy' ) )
                                <td>

                                    @if( isAuth( 'ItemMaster', 'edit' ) )
                                    <div class="btn-group dropdown">
                                        <button
                                                data-id="#mainPanel"
                                                data-href="{{ route('admin.itemMasters.edit', $model->id) }}"
                                                class="btn btn-info btn-xs dataModel">Edit</button>
                                    </div>
                                    @endif

                                    @if( isAuth( 'ItemMaster', 'destroy' ) )
                                    <div class="btn-group dropdown">
                                        <a class="deleteItem btn btn-danger btn-xs" href="{{route('admin.itemMasters.delete', $model->id)}}" >Delete</a>
                                    </div>
                                    @endif
                                </td>
                                @endif
                                <td>{{ $model->id }}</td>
                                @if( isSuperAdmin() )
                                    <td>{{ optional($model->userRel)->name  }}</td>
                                @endif
                                <td>
                                    <a href="{{ getImageUrl($model->image) }}" class="light-image">
                                        <img src="{{ getImageUrl($model->image) }}" alt="{{ $model->name }}" width="30">
                                    </a>
                                </td>
                                <td>{{ $model->name }}</td>
                                <td>{!! getShortTd($model->description) !!}</td>
                                <td>{{ $model->stock_type }}</td>
                                <td>{{ optional($model->unit)->unit }}</td>
                                <td>{{ getDateTimeValue($model->created_at) }}</td>
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
        $('document').ready(function () {
            $('.master-menu').addClass('active')
            $('.master-menu ul').show();
            $('.itemlist-menu').addClass('active');

            $('body').on('select2:select', '#ofc_color', function (e) {
                if( $(this).val() ) {
                    $('.cable_drum_number').removeClass('hide');
                } else {
                    $('.cable_drum_number').addClass('hide');
                }
            });

        });
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyDC6FU6iM6b6JyG_gHPWjGPfZXWoc1rlLc"></script>
    <script type="text/javascript">
        function initialize() {

            autocomplete = new google.maps.places.Autocomplete(
            /** @type  {HTMLInputElement} */ (document.getElementById('autocomplete')), {
                types: ['geocode']
            });

        }
    </script>
@stop