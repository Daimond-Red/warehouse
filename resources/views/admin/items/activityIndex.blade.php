@extends('layouts.master')

@section('pageBar')
    STOCKS
@stop
@section('content')
    <div id="mainPanel"></div>
    <div class="panel panel-default">
        <div style="overflow:hidden;" class="panel-heading">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home">Added Stock</a></li>
                <li><a data-toggle="tab" href="#menu1">Return Stock</a></li>
                <li><a data-toggle="tab" href="#menu2">Release Stock</a></li>
            </ul>
        </div>
        <div class="tab-content">
            <div id="home" class="tab-pane fade in active">
                <table class="table table-striped ajax-collection"  >
                    <thead>
                    <tr>
                        <th >ID</th>
                        @if( isSuperAdmin() )
                            <th>PIA</th>
                        @endif
                        <th>Item Name</th>
                        <th>Warehouse</th>
                        <th>Available Quantities</th>
                        <th>Add Qty</th>
                        <th>Unit</th>
                        <th>Date</th>
                        {{-- @if( isSuperAdmin() ) --}}
                        <th width="150">Is Approved</th>
                        {{-- @endif --}}
                    </tr>
                    </thead>
                    <tbody>
                    @if(!count($collection))
                        <tr>
                            <td colspan="15" class="text-center"> No matching records found </td>
                        </tr>
                    @else
                        @foreach($collection as $model)
                            @if($model->activity_type == \App\ItemLog::ADD)
                                <tr data-expanded="true">
                                    <td>{{ $model->id }}</td>
                                    @if( isSuperAdmin() )
                                        <td>{{ optional($model->userRel)->name  }}</td>
                                    @endif
                                    <td>{{ optional(optional($model->itemRel)->itemMasterRel)->name }}</td>
                                    <td>
                                        {{ optional(optional($model->itemRel)->store)->name }}
                                    </td>
                                    <td>{{ optional($model->itemRel)->quantity }}</td>
                                    
                                    <td>{{ $model->qty }}</td>
                                    <td>{{ optional(optional(optional($model->itemRel)->itemMasterRel)->unit)->unit }}</td>
                                    <td>{{ getDateValue($model->created_at) }}</td>
                                    @if( isSuperAdmin() )
                                    <td>
                                        
                                        <div class="btn-group dropdown ">
                                            @if($model->is_approved == 0)
                                                <a href="{{ route('admin.items.activityApprove', $model->id) }}"
                                                        class="btn btn-primary btn-xs approvedItem">Unapproved</a>
                                            @else 
                                                <a href="javascript:void(0);"
                                                        class="btn btn-success btn-xs">Approved</a>
                                            @endif
                                        </div>
                                        
                                    </td>
                                    @endif
                                </tr>
                            @endif
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
            <div id="menu1" class="tab-pane fade">
                <table class="table table-striped ajax-collection"  >
                    <thead>
                    <tr>
                        <th >ID</th>
                        @if( isSuperAdmin() )
                            <th>PIA</th>
                        @endif
                        <th>Item Name</th>
                        <th>Warehouse</th>
                        <th>Available Quantities</th>
                        <th>Release Qty</th>
                        <th>Unit</th>
                        <th>Date</th>
                        {{-- @if( isSuperAdmin() ) --}}
                        <th width="150">Is Approved</th>
                        {{-- @endif --}}
                    </tr>
                    </thead>
                    <tbody>
                    @if(!count($collection))
                        <tr>
                            <td colspan="15" class="text-center"> No matching records found </td>
                        </tr>
                    @else
                        @foreach($collection as $model)
                            @if($model->activity_type == \App\ItemLog::RETURN)
                                <tr data-expanded="true">
                                    <td>{{ $model->id }}</td>
                                    @if( isSuperAdmin() )
                                        <td>{{ optional($model->userRel)->name  }}</td>
                                    @endif
                                    <td>{{ optional(optional($model->itemRel)->itemMasterRel)->name }}</td>
                                    <td>
                                        {{ optional(optional($model->itemRel)->store)->name }}
                                    </td>
                                    <td>{{ optional($model->itemRel)->quantity }}</td>
                                    
                                    <td>{{ $model->qty }}</td>
                                    <td>{{ optional(optional(optional($model->itemRel)->itemMasterRel)->unit)->unit }}</td>
                                    <td>{{ getDateValue($model->created_at) }}</td>
                                    @if( isSuperAdmin() )
                                    <td>
                                        
                                        <div class="btn-group dropdown ">
                                            @if($model->is_approved == 0)
                                                <a href="{{ route('admin.items.activityApprove', $model->id) }}"
                                                        class="btn btn-primary btn-xs approvedItem">Unapproved</a>
                                            @else 
                                                <a href="javascript:void(0);"
                                                        class="btn btn-success btn-xs">Approved</a>
                                            @endif
                                        </div>
                                        
                                    </td>
                                    @endif
                                </tr>
                            @endif
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
            <div id="menu2" class="tab-pane fade">
                <table class="table table-striped ajax-collection"  >
                    <thead>
                    <tr>
                        <th >ID</th>
                        @if( isSuperAdmin() )
                            <th>PIA</th>
                        @endif
                        <th>Item Name</th>
                        <th>Warehouse</th>
                        <th>Available Quantities</th>
                        <th>Release Qty</th>
                        <th>Unit</th>
                        <th>Date</th>
                        {{-- @if( isSuperAdmin() ) --}}
                        <th width="150">Is Approved</th>
                        {{-- @endif --}}
                    </tr>
                    </thead>
                    <tbody>
                    @if(!count($collection))
                        <tr>
                            <td colspan="15" class="text-center"> No matching records found </td>
                        </tr>
                    @else
                        @foreach($collection as $model)
                            @if($model->activity_type == \App\ItemLog::RELEASE)
                                <tr data-expanded="true">
                                    <td>{{ $model->id }}</td>
                                    @if( isSuperAdmin() )
                                        <td>{{ optional($model->userRel)->name  }}</td>
                                    @endif
                                    <td>{{ optional(optional($model->itemRel)->itemMasterRel)->name }}</td>
                                    <td>
                                        {{ optional(optional($model->itemRel)->store)->name }}
                                    </td>
                                    <td>{{ optional($model->itemRel)->quantity }}</td>

                                    <td>{{ $model->qty }}</td>
                                    <td>{{ optional(optional(optional($model->itemRel)->itemMasterRel)->unit)->unit }}</td>
                                    <td>{{ getDateValue($model->created_at) }}</td>
                                    @if( isSuperAdmin() )
                                        <td>

                                            <div class="btn-group dropdown ">
                                                @if($model->is_approved == 0)
                                                    <a href="{{ route('admin.items.activityApprove', $model->id) }}"
                                                       class="btn btn-primary btn-xs approvedItem">Unapproved</a>
                                                @else
                                                    <a href="javascript:void(0);"
                                                       class="btn btn-success btn-xs">Approved</a>
                                                @endif
                                            </div>

                                        </td>
                                    @endif
                                </tr>
                            @endif
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop

@section('script')
    <script>
        $(document).ready(function(){

            $('.master-menu').addClass('active')
            $('.master-menu ul').show();
            $('.stocklist-menu').addClass('active');

            //$('.stockmanagement-menu').addClass('active');
            $('body').on('click', '.open-item-description', function() {

            });
        });
    </script>
@stop