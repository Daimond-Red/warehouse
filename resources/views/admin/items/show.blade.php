@extends('layouts.master')

@section('pageBar')
    Item View Details
@stop
@section('content')

    <div class="panel">
        <div class="panel-body">
            <div style="">
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#tab2" role="tab" data-toggle="tab"> Added Stock </a>
                    </li>
                    <li role="presentation">
                        <a href="#tab3" role="tab" data-toggle="tab"> Released Stock </a>
                    </li>
                    <li role="presentation">
                        <a href="#tab4" role="tab" data-toggle="tab"> Return Stock </a>
                    </li>
                    <li role="presentation">
                        <a href="#tab1"  role="tab" data-toggle="tab"> Cumulative Details </a>
                    </li>
                </ul>

                <div class="tab-content">

                    <div role="tabpanel" class="tab-pane active" id="tab2">

                        <?php $collection1 = $model->itemLogsRel()->where('activity_type', \App\ItemLog::ADD)->orderBy('id', 'desc')->get(); ?>

                        @if(!count($collection1))
                            <h4 style="margin-left: 2%">No Record found.</h4>
                        @endif

                        @foreach( $collection1 as $log )
                            <?php
                            $itemModelLog = $log->itemRel;
                            $itemMasterModelLog = $itemModelLog->itemMasterRel;
                            ?>
                            <div style="margin: 5px 0">
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <strong>Added On: {{ getDateTimeValue($log->created_at) }}</strong>
                                    </div>
                                    <div class="list-group bg-white">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <table class="table table-striped table-no-datatable" style="padding: 2%">
                                                    <tr>
                                                        <td><strong>Item Name</strong></td>
                                                        <td>{{ $itemMasterModelLog->name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Invoice Number</strong></td>
                                                        <td>{{ $log->invoice_number }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Invoice Date</strong></td>
                                                        <td>{{ $log->invoice_date }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Qty</strong></td>
                                                        <td>{{ $log->qty }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Make</strong></td>
                                                        <td>{{ $log->make }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Model No.</strong></td>
                                                        <td>{{ $log->model_number }}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="col-md-6">
                                                <table class="table table-striped table-no-datatable" style="padding: 2%">
                                                    <tr>
                                                        <td><strong>Serial No.</strong></td>
                                                        <td>{{ $log->serial_number }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Manufacturing Date</strong></td>
                                                        <td>{{ $log->manufacturing_date }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Color</strong></td>
                                                        <td>{{ ucfirst($log->ofc_color) }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>FAT Report</strong></td>
                                                        <td>
                                                            @if( $log->fat_reports )
                                                                <a class="text-primary block m-b-xs" href="{{ getMediaUrl($log->fat_reports) }}" download>Download FIle</a>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Cable Drum Number</strong></td>
                                                        <td>{{ $log->cable_drum_number }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Delivery Challan No.</strong></td>
                                                        <td>{{ $log->delivery_challan_no }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Delivery Challan Date</strong></td>
                                                        <td>{{ $log->delivery_challan_date }}</td>
                                                    </tr>
                                                </table>
                                            </div>


                                        </div>
                                        <hr>
                                        <div style="margin: 2%" class="panel panel-success">
                                            <div class="panel-heading">
                                                <strong>Attached Documents</strong>
                                            </div>
                                            <div class="list-group bg-white">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <table class="table table-striped table-no-datatable" style="padding: 2%">
                                                            <thead>
                                                            <tr>
                                                                <th>Sr.No</th>
                                                                <th>File Type</th>
                                                                <th>File Name</th>
                                                                <th>Action</th>
                                                            </tr>
                                                            </thead>
                                                            <?php
                                                            $collection = \App\MediaFile::where('model', 'App\ItemLog')->where('model_id', $log->id)->get();
                                                            $i = 1;
                                                            ?>
                                                            <tbody>
                                                            @if(!count($collection))
                                                                <tr>
                                                                    <td colspan="12">No Record found.</td>
                                                                </tr>
                                                            @else
                                                                @foreach($collection as $mediaModel)
                                                                    <tr>
                                                                        <td>{{ $i++ }}</td>
                                                                        <td>{{ optional($mediaModel->typeRel)->title }}</td>
                                                                        <td>{{ $mediaModel->name }}</td>
                                                                        <td>
                                                                            <a href="{{getMediaUrl($mediaModel->url)}}" download class="btn btn-xs btn-info"> Download </a>
                                                                        </td>
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
                                </div>

                            </div>
                        @endforeach

                    </div>

                    <div role="tabpanel" class="tab-pane " id="tab3">
                        <?php
                            $releasedCollection = \App\ReleaseStock::where('item_id', $model->id)->orderBy('id', 'desc')->get();
                        ?>

                        @if(!count($releasedCollection))
                            <h4 style="margin-left: 2%">No Record found.</h4>
                        @endif

                        @foreach( $releasedCollection as $log )
                            <?php
                            $itemModelLog = $log->itemRel;
                            $itemMasterModelLog = $itemModelLog->itemMasterRel;
                            ?>
                            <div style="margin: 5px 0">
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <strong>Released on: {{ getDateTimeValue($log->created_at) }}</strong>
                                    </div>
                                    <div class="list-group bg-white">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <table class="table table-striped table-no-datatable" style="padding: 2%">
                                                    <tr>
                                                        <td><strong>Item Name</strong></td>
                                                        <td>{{ $itemMasterModelLog->name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Indent Number</strong></td>
                                                        <td>{{ $log->indent_number }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Indent Date</strong></td>
                                                        <td>{{ $log->indent_date }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Qty</strong></td>
                                                        <td>{{ $log->quantity }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Release To (Person Name)</strong></td>
                                                        <td>{{ $log->person_name }}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="col-md-6">
                                                <table class="table table-striped table-no-datatable" style="padding: 2%">
                                                    <tr>
                                                        <td><strong> Contact Number </strong></td>
                                                        <td>{{ $log->phone }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong> Remarks </strong></td>
                                                        <td>{{ $log->remarks }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong> Vehicle No </strong></td>
                                                        <td>{{ $log->vehicle_no }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong> Gate Pass No </strong></td>
                                                        <td>{{ $log->gate_pass_no }}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <strong>Attached Documents</strong>
                                    </div>
                                    <div class="list-group bg-white">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <table class="table table-striped table-no-datatable" style="padding: 2%">
                                                    <thead>
                                                        <tr>
                                                            <th>Sr.No</th>
                                                            <th>File Type</th>
                                                            <th>File Name</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <?php
                                                        $collection = \App\MediaFile::where('model', 'App\ItemLog')->where('model_id', $log->id)->get();
                                                        $i = 1;
                                                    ?>
                                                    <tbody>
                                                        @if(!count($collection))
                                                            <tr>
                                                                <td colspan="12">No Record found.</td>
                                                            </tr>
                                                        @else
                                                            @foreach($collection as $mediaModel)
                                                                <tr>
                                                                    <td>{{ $i++ }}</td>
                                                                    <td>{{ optional($mediaModel->typeRel)->title }}</td>
                                                                    <td>{{ $mediaModel->name }}</td>
                                                                    <td></td>
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

                        @endforeach
                    </div>
                    <div role="tabpanel" class="tab-pane" id="tab4">
                        <?php
                            $collection3 = $model->itemLogsRel()->where('activity_type', \App\ItemLog::RETURN)->get();
                        ?>

                        @if(!count( $collection3 ))
                            <h4 style="margin-left: 2%">No Record found.</h4>
                        @endif

                        @foreach( $model->itemLogsRel()->where('activity_type', \App\ItemLog::RETURN)->get() as $log )
                            <?php
                            $itemModelLog = $log->itemRel;
                            $itemMasterModelLog = $itemModelLog->itemMasterRel;
                            ?>
                            <div style="margin: 5px 0">
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <strong>Issued At: {{ getDateTimeValue($log->created_at) }}</strong>
                                    </div>
                                    <div class="list-group bg-white">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <table class="table table-striped table-no-datatable" style="padding: 2%">
                                                    <tr>
                                                        <td><strong>Item Name</strong></td>
                                                        <td>{{ $itemMasterModelLog->name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Invoice Number</strong></td>
                                                        <td>{{ $log->invoice_number }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Invoice Date</strong></td>
                                                        <td>{{ $log->invoice_date }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Qty</strong></td>
                                                        <td>{{ $log->qty }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Make</strong></td>
                                                        <td>{{ $log->make }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Model No.</strong></td>
                                                        <td>{{ $log->model_number }}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="col-md-6">
                                                <table class="table table-striped table-no-datatable" style="padding: 2%">
                                                    <tr>
                                                        <td><strong>Serial No.</strong></td>
                                                        <td>{{ $log->serial_number }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Manufacturing Date</strong></td>
                                                        <td>{{ $log->manufacturing_date }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Color</strong></td>
                                                        <td>{{ ucfirst($log->ofc_color) }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>FAT Report</strong></td>
                                                        <td>
                                                            @if( $log->fat_reports )
                                                                <a class="text-primary block m-b-xs" href="{{ getMediaUrl($log->fat_reports) }}" download>Download FIle</a>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Cable Drum Number</strong></td>
                                                        <td>{{ $log->cable_drum_number }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Delivery Challan No.</strong></td>
                                                        <td>{{ $log->delivery_challan_no }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Delivery Challan Date</strong></td>
                                                        <td>{{ $log->delivery_challan_date }}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <strong>Attached Documents</strong>
                                    </div>
                                    <div class="list-group bg-white">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <table class="table table-striped table-no-datatable" style="padding: 2%">
                                                    <thead>
                                                        <tr>
                                                            <th>Sr.No</th>
                                                            <th>File Type</th>
                                                            <th>File Name</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <?php
                                                        $collection = \App\MediaFile::where('model', 'App\ItemLog')->where('model_id', $log->id)->get();
                                                        $i = 1;
                                                    ?>
                                                    <tbody>
                                                        @if(!count($collection))
                                                            <tr>
                                                                <td colspan="12">No Record found.</td>
                                                            </tr>
                                                        @else
                                                            @foreach($collection as $mediaModel)
                                                                <tr>
                                                                    <td>{{ $i++ }}</td>
                                                                    <td>{{ optional($mediaModel->typeRel)->title }}</td>
                                                                    <td>{{ $mediaModel->name }}</td>
                                                                    <td></td>
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
                        @endforeach
                    </div>
                    <div role="tabpanel" class="tab-pane" id="tab1">
                        <div class="panel">
                            <div class="list-group bg-white">
                                <div class="row">
                                    <div class="col-md-6">
                                        <table class="table table-striped table-no-datatable" style="padding: 2%">
                                            <tbody>
                                            <tr>
                                                <td><strong>PIA</strong></td>
                                                <td> {{ optional($model->userRel)->name }} </td>
                                            </tr>
                                            <tr>
                                                <td><strong>Warehouse</strong></td>
                                                <td>{{ optional($model->store)->name }}</td>
                                            </tr>
                                            <?php $itemMasterModel = $model->itemMasterRel; ?>
                                            <tr>
                                                <td><strong>Unit</strong></td>
                                                <td> {{ optional($itemMasterModel->unit)->title }} </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-md-6">
                                        <table class="table table-striped table-no-datatable" style="padding: 2%">
                                            <tbody>
                                            <tr>
                                                <td><strong>Item Name</strong></td>
                                                <td> {{ $itemMasterModel->name }} </td>
                                            </tr>
                                            <tr>
                                                <td><strong>Description</strong></td>
                                                <td> {{ $itemMasterModel->description }} </td>
                                            </tr>
                                            <tr>
                                                <td><strong>Stock Type</strong></td>
                                                <td> {{ $itemMasterModel->stock_type }} </td>
                                            </tr>
                                            <tr>
                                                <td><strong>Total Quantity</strong></td>
                                                <td>{{ $model->quantity }}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

@section('script')
<script>
    $('document').ready(function () {
        $('.master-menu').addClass('active')
        $('.master-menu ul').show();
        $('.stocklist-menu').addClass('active');

        //$('.table-no-datatable').Datatable().destroy();
        $('.table-no-datatable').DataTable().destroy();
    });
</script>
@stop