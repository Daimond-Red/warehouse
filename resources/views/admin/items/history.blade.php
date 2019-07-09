@extends('layouts.master')

@section('pageBar')
    STOCK HISTORY
@stop
@section('content')
    <div id="mainPanel"></div>
    <div class="panel panel-default">
        <div style="overflow:hidden;" class="panel-heading">
            Stock History
        </div>
        <div>
            <table class="table table-striped "  >
                <thead>
                <tr>
                    <th >ID</th>
                    <th>PIA</th>
                    <th>Date</th>
                    <th>Warehouse</th>
                    <th>Item Name</th>
                    <th>Unit</th>
                    <th>Activity Status</th>
                    <th>Quantity</th>
                    <th>Type</th>
                    <th>Number</th>
                    <th>Date</th>
                    <th>Reason</th>
                    <th class="hide"></th>
                    {{--<th>Balance</th>--}}
                </tr>
                </thead>
                <tbody>
                @if(!count($collection))
                    <tr>
                        <td colspan="15" class="text-center"> No matching records found </td>
                    </tr>
                @else
                    @foreach($collection as $log)

                        <?php $model = $log->itemRel; ?>
                        <tr data-expanded="true">
                            <td>{{ $model->id }}</td>
                            <td>{{ optional($log->userRel)->name }}</td>
                            <td>{{ getDateTimeValue($log->created_at) }}</td>
                            <td>{{ optional($model->store)->name }}</td>
                            <td>{{ optional($model->itemMasterRel)->name }}</td>
                            <td>{{ optional(optional($model->itemMasterRel)->unit)->unit }}</td>
                            <td>{{ $log->activity_type }}</td>
                            <td>{{ $log->qty }}</td>
                            <td>
                                @if( $log->activity_type == \App\ItemLog::ADD )
                                    Invoice
                                @else
                                    Indent
                                @endif
                            </td>
                            <td>
                                @if( $log->activity_type == \App\ItemLog::ADD )
                                    {{ $log->invoice_number }}
                                @else
                                    {{ $log->indent_number }}
                                @endif
                            </td>
                            <td>
                                @if( $log->activity_type == \App\ItemLog::ADD )
                                    {{ $log->invoice_date }}
                                @else
                                    {{ $log->indent_date }}
                                @endif
                            </td>
                            <td>{!! getShortTd($log->reason) !!}</td>
                            <td class="hide"></td>
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
        $(document).ready(function(){
            $('.master-menu').addClass('active')
            $('.master-menu ul').show();
            $('.stocklist-menu').addClass('active');
        });
    </script>
@stop