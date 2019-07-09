@extends('layouts.master')


@section('style')
    <style type="text/css">
        #addStockForm {
            display: none;
        }
    </style>
@stop
@section('pageBar')
    Release/Issue Stock
@stop

@section('content')
    <div class="repeter-content" style="display: none;">
        <div class="items" style="padding-top:8px; ">
            <div class="row">
                <div class="col-md-4">
                    {!! HTML::vselect('upload_template_id[]', $uploadTypesSelect, null, ['label' => 'Template', 'data-validation' => 'required']) !!}
                </div>
                <div class="col-md-4">
                    {!! HTML::vfile('uploads[]', [ 'label' => 'File' , 'multiple' => 'multiple']) !!} 
                </div>
                <div class="col-md-4" style="padding-top: 1.9em;">
                    <a href="javascript:void(0);" id="remove-btn" class="btn btn-danger btn-sm" onclick="$(this).parents('.items').remove()">
                          Remove
                    </a>
                </div>    
            </div>   
        </div>
    </div>
    {{ Form::open( [ 'route' => 'admin.releaseStocks.store', 'method' => 'POST', 'files' => true, 'class' => 'form' ]) }}

    <div id="mainPanel1">
        <div class="panel panel-white">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-8 col-sm-8 col-md-8">
                        <h3 class="panel-title text-capitalize">Create New</h3>
                    </div>
                </div>
            </div>
            <div id="panel-1" class="collapse in">
                <div class="panel-body">

                    @include('admin.releaseStocks.form')

                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary releaseButton" disabled>Release</button>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="panel panel-white hide" id="stock-list">

        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-8 col-sm-8 col-md-8">
                    <h3 class="panel-title text-capitalize">Stock/Item list</h3>
                </div>
            </div>
        </div>
        <div id="panel-2" class="collapse in">
            <div class="panel-body" id="itemList">
            </div>
        </div>
    </div>

    {{ Form::close() }}

    <div class="panel panel-default">
        <div style="overflow:hidden;" class="panel-heading">Release Stock - List</div>

        <table class="table table-striped table-responsive">

            <thead>
                <tr>
                    <th>Action</th>
                    <th >ID</th>
                    <th>Person Name</th>
                    <th>Phone</th>
                    <th>Warehouse</th>
                    <th>Item</th>
                    <th>Released Quantity</th>
                    <th>Release Date</th>
                    <th>Quantity Remaining</th>
                    <th>Indent Number</th>
                    <th>Indent Date</th>
                    <th>Vehicle No</th>
                    <th>Gate pass No</th>
                    
                </tr>
            </thead>

            <tbody>
                @if(!count($collection))
                    <tr>
                        <td colspan="15" class="text-center"> No matching records found </td>
                    </tr>
                @else
                    @foreach($collection as $model)
                        <tr>
                            <td>
                                <button
                                        data-title="View Details"
                                        data-href="{{ route('admin.releaseStocks.show', ['id' => $model->id]) }}"
                                        class="btn btn-info btn-xs btnAppModel"
                                >View details</button>
                            </td>
                            <td>{{ $model->id }}</td>
                            <td>{{ $model->person_name }}</td>
                            <td>{{ $model->phone }}</td>
                            <td>{{ optional($model->store)->name }}</td>
                            <td>{{ optional(optional($model->stock)->itemMasterRel)->name }}</td>
                            <td>{{ $model->quantity.' '.optional($model->stock->unit)->unit }}</td>
                            <td>{{ getDateValue($model->date) }}</td>
                            <td>{{ optional($model->stock)->quantity.' '.optional(optional($model->stock)->unit)->unit }}</td>
                            <td>{{ $model->indent_number }}</td>
                            <td>{{ $model->indent_date }}</td>
                            <td>{{ $model->vehicle_no }}</td>
                            <td>{{ $model->gate_pass_no }}</td>
                            
                        </tr>
                    @endforeach
                @endif
            </tbody>

        </table>

    </div>

@stop

@section('script')

    <script>


        $('.master-menu').addClass('active')
        $('.master-menu ul').show();
        $('.stocklist-menu').addClass('active');

        var checkStock = true;
        $(window).load(function(){
            @if(\request('store_id'))
                var store_id = $('#store').val();
                var url = "{{ route('admin.stores.items') }}?store_id=" + store_id;
                var contentId = $('#itemList');
                $.get(url, function(res){
                    $(contentId).html(res);

                });
            @endif
            $('body').on('click', '#add-stock', function() {
                $('#addStockForm').show();
            });

            $('.close-form').click(function(){
                $('#addStockForm').hide();
            });
            
            $('body').on('change', '#store', function () {
                var store_id = this.value;
                
                var url = "{{ route('admin.stores.items') }}?store_id=" + store_id;
                var contentId = $('#itemList');

                pageLoader();
                $.get(url, function(res){
                    removePageLoader();
                    $(contentId).html( '<table class="table table-striped" >' + res + '</table>' );
                });

                if( $(this).val() ) {
                    $('#stock-list').removeClass('hide');
                } else {
                    $('#stock-list').addClass('hide');
                }

            });
            $('body').on('change', '#vendor', function () {
                var vendor_id = this.value;

                var url = "{{ route('admin.vendors.get') }}?vendor_id=" + vendor_id;
                
                $.get(url, function(res){

                    if(res) $('#phone').val(res.phone);
                });
            });

            $('body').on('click', '.addStockList', function() {
                var item_id = $('#itemId').val();
                var quantity = $('#addQuantity').val();
                // console.log(store_id);
                var url = "{{ route('admin.items.item') }}?item_id=" + item_id+"&quantity="+quantity;

                var contentId = $('#itemListContent');
                $.get(url, function(res){

                    $('.quantity-exceed').remove();
                    $(contentId).append(res);

                });
            });

            $('body').on('click', '.select-all', function() {
                var group = $(this).attr('data-group');
                
                if ( $(this).is(':checked') ) {
                    
                    $(group).prop('checked', true);
                    if ( checkStock ) {

                        $('.releaseButton').attr('disabled', false);
                    } 
                    // setDoctor();
                } else {
                    $(group).prop('checked', false);
                    // clearDoctor();
                }

                $('.item_list').trigger('change');


            });
            $('body').on('click', '.changeQuantity', function() {
                // alert('sdafdasdf');
                $('#myModal').modal('hide');
                var quantity = $('#editQuantity').val();
                var itemId = $('#editQuantity').data('id');
                // console.log(itemId);

                $('#quantities_'+itemId).val(quantity);

                $('#quantities_'+itemId).parent('tr').find('td span').html(quantity);
            });


            $('body').on('input', '.check-stock', function() {
                var item_id = $(this).data('item');
                var quantity = $(this).val();
                if(quantity == 0) {
                    errorAlert('You have to release some quantity.');
                    $('.releaseButton').attr('disabled', true);
                    return false;
                } 
                console.log(item_id + '  '+quantity);
                var url = "{{ route('admin.items.itemCheck') }}?item_id=" + item_id+"&quantity="+quantity;

                // var contentId = $('#itemListContent');
                $.get(url, function(res){
                    if(res == 0) {
                        errorAlert('Quantity is exceed please change.');
                        if ( ($('[name="items[]"]:checked').length == 0 || $('[name="items[]"]:checked').length > 0)  && checkStock) {

                            $('.releaseButton').attr('disabled', true);
                        }
                        checkStock = false;
                    } else {
                        checkStock = true;
                        if ( $('[name="items[]"]:checked').length > 0 && checkStock) {

                            $('.releaseButton').attr('disabled', false);
                        } 
                       
                    }
                    
                });
            });

            $('body').on('click', '[name="items[]"]', function() {
                if ( $('[name="items[]"]:checked').length > 0 && checkStock) {

                    $('.releaseButton').attr('disabled', false);
                } 
            });

            $('body').on('change', '.datepicker', function() {
                $('.datepicker').blur();
            });

            $('body').on('change', '.item_list', function() {
                if( $(this).is(':checked') ) {
                    $('.check-stock[data-item='+ $(this).val() +']').removeAttr('disabled');
                } else {
                    $('.check-stock[data-item='+ $(this).val() +']').attr('disabled', 'disabled');
                }
            });
            
        });
        

    </script>
@stop