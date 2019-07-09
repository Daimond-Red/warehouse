@extends('layouts.master')

@section('pageBar')
    Generate Report
@stop
@section('content')

    {!! Form::open([ 'route' => 'admin.reports.index' , 'method' => 'get']) !!}
    <div class="row">
        <div class="col-md-5">
            <div class="panel panel-default">
                <div style="overflow:hidden;" class="panel-heading">
                    Reports
                </div>
                <div style="padding: 5%">
                    {!! Form::hidden('download', 'excel') !!}
                    {!! HTML::vselect('month', getMonthArr(), null, ['data-validation' => 'required']) !!}
                    {!! HTML::vtext('year', null, ['class' => 'form-control datepickerYear', 'data-validation' => 'required']) !!}
                    <button type="submit" class=" btn btn-primary">Generate</button>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@stop

@section('script')
    <script>
        $(document).ready(function(){
            $('.report-menu').addClass('active');
        });
    </script>
@stop