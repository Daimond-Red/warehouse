<div style="margin: 5px 0">
    <div class="panel panel-info">
        <div class="panel-heading">
            <strong>Released on: {{ getDateTimeValue($model->created_at) }}</strong>
        </div>
        <div class="list-group bg-white">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-striped table-no-datatable" style="padding: 2%">
                        <tr>
                            <td><strong>Item Name</strong></td>
                            <td>
                                @if( $model->itemRel && $model->itemRel->itemMasterRel && optional($model->itemRel->itemMasterRel)->name )
                                    {{ $model->itemRel->itemMasterRel->name }}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Indent Number</strong></td>
                            <td>{{ $model->indent_number }}</td>
                        </tr>
                        <tr>
                            <td><strong>Indent Date</strong></td>
                            <td>{{ $model->indent_date }}</td>
                        </tr>
                        <tr>
                            <td><strong>Qty</strong></td>
                            <td>{{ $model->quantity }}</td>
                        </tr>
                        <tr>
                            <td><strong>Release To (Person Name)</strong></td>
                            <td>{{ $model->person_name }}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <table class="table table-striped table-no-datatable" style="padding: 2%">
                        <tr>
                            <td><strong> Contact Number </strong></td>
                            <td>{{ $model->phone }}</td>
                        </tr>
                        <tr>
                            <td><strong> Remarks </strong></td>
                            <td>{{ $model->remarks }}</td>
                        </tr>
                        <tr>
                            <td><strong> Vehicle No </strong></td>
                            <td>{{ $model->vehicle_no }}</td>
                        </tr>
                        <tr>
                            <td><strong> Gate Pass No </strong></td>
                            <td>{{ $model->gate_pass_no }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>