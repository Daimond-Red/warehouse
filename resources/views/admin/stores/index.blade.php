@extends('layouts.master')

@section('pageBar')
    Warehouses
@stop
@section('content')
    <div id="mainPanel"></div>
    <div class="ajax-collection">
        <div class="panel panel-default">
            <div style="overflow:hidden;" class="panel-heading">
                Warehouse - List

                @if( isAuth( 'Store', 'create' ) )
                <span class="pull-right">
                            <a class="btn btn-primary btn-sm dataModel"
                               data-id="#mainPanel"
                               data-href="{{ route('admin.stores.create') }}">Add Warehouse</a></span>
                @endif

            </div>
            <div>
                <table class="table table-striped table-responsive" >
                    <thead>
                    <tr>
                        <th width="50">Action</th>
                        <th>Image</th>
                        <th>ID</th>
                        <?php if( isSuperAdmin() ): ?>
                        <th>PIA</th>
                        <?php endif; ?>
                        <th>Warehouse Name</th>
                        <th>Postcode</th>
                        <th>Village</th>
                        <th>District</th>
                        <th>Address</th>
                        <th>Lat</th>
                        <th>Lng</th>
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
                                        <button class="btn btn-default btn-sm" data-toggle="dropdown" aria-expanded="false"> Select <span class="caret"></span></button>
                                        <ul class="dropdown-menu">
                                            <?php if( isAuth( 'Store', 'edit' ) ): ?>
                                            <li>
                                                <a
                                                        data-id="#mainPanel"
                                                        data-href="<?php echo e(route('admin.stores.edit', $model->id)); ?>"
                                                        class="dataModel"
                                                >Edit Details</a>
                                            </li>
                                            <?php endif; ?>

                                            <?php if( isSuperAdmin() ): ?>
                                            <li>
                                                <a
                                                        href="<?php echo e(route('admin.stores.delete', $model->id)); ?>"
                                                        class="deleteItem"
                                                >Delete</a>
                                            </li>
                                            <?php endif; ?>
                                            <li>
                                                <a href="<?php echo e(route('admin.items.index', ['store_id' => $model->id])); ?>">View stocks</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                                <td>
                                    <a href="<?php echo e(getImageUrl($model->image)); ?>" class="light-image">
                                        <img src="<?php echo e(getImageUrl($model->image)); ?>" alt="<?php echo e($model->name); ?>" width="30">
                                    </a>
                                </td>
                                <td><?php echo e($model->id); ?></td>
                                <?php if( isSuperAdmin() ): ?>
                                <td><?php echo e(optional($model->userRel)->name); ?></td>
                                <?php endif; ?>
                                <td><?php echo e($model->name); ?></td>
                                <td><?php echo e($model->postcode); ?></td>
                                <td><?php echo e($model->village); ?></td>
                                <td><?php echo e($model->district); ?></td>
                                <td><?php echo $model->address; ?></td>
                                <td><?php echo e($model->lat); ?></td>
                                <td><?php echo e($model->lng); ?></td>
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
            $('.store-menu').addClass('active');
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