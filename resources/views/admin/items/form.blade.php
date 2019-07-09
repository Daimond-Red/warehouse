<div style="padding: 0 2%">

    <div class="row">
        <div class="col-md-4">
            {!! HTML::vselect('item_master_id', $itemMasterSelect, null, ['data-validation' => 'required', 'label' => 'Item Name', 'class' => 'form-control select2-select']) !!}
        </div>

        @if( request('is_return') )

            {!! Form::hidden('is_return', true) !!}

            <div class="col-md-4">
                {!! HTML::vtext('indent_number', null, ['label' => 'Indent Number']) !!}
            </div>
            <div class="col-md-4">
                {!! HTML::vtext('indent_date', null, ['label' => 'Indent Date', 'class' => 'form-control datepicker2']) !!}
            </div>
        @else
            <div class="col-md-4">
                {!! HTML::vtext('invoice_number', null, ['label' => 'Invoice Number']) !!}
            </div>
            <div class="col-md-4">
                {!! HTML::vtext('invoice_date', null, ['label' => 'Invoice Date', 'class' => 'form-control datepicker2']) !!}
            </div>
        @endif

    </div>

    <div class="row">
        <div class="col-md-4">
            {!! HTML::vinteger('quantity', null, [ 'data-validation' => 'required', 'step' => '0.001' ]) !!}
        </div>
        <div class="col-md-4">
            @if(isset($model) && $model)
                {!! HTML::vselect('store_id[]', $storesSelect, null, [ 'disabled', 'class' => 'form-control select2-select', 'multiple' => 'multiple', 'data-validation' => 'required', 'label' => 'Stores' ]) !!}
            @else
                {!! HTML::vselect('store_id[]', $storesSelect, null, [ 'class' => 'form-control select2-select', 'multiple' => 'multiple', 'data-validation' => 'required', 'label' => 'Warehouses' ]) !!}
            @endif
        </div>
        <div class="col-md-4">
            {!! HTML::vtext('make') !!}
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            {!! HTML::vtext('model_number', null, ['label' => 'Model Number']) !!}
        </div>
        <div class="col-md-4">
            {!! HTML::vtext('serial_number', null, ['label' => 'Serial Number']) !!}
        </div>
        <div class="col-md-4">
            {!! HTML::vtext('manufacturing_date', null, ['label' => 'Manufacturing Date', 'class' => 'form-control datepicker2', 'readonly']) !!}
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            {!! HTML::vselect('ofc_color', getColorsArr(), null, [ 'label' => 'Color', 'class' => 'form-control select2-select']) !!}
        </div>
        <div class="col-md-4">
            {!! HTML::vfile('fat_reports', ['label' => 'FAT Reports']) !!}
        </div>
        <div class="col-md-4">
            {!! HTML::vtext('cable_drum_number', null, ['label' => 'Cable Drum Number']) !!}
        </div>
    </div>

    @if( request('is_return') )
        <div class="row">
            <div class="col-md-4">
                {!! HTML::vtext('reason', null, ['label' => 'Return reason']) !!}
            </div>
        </div>
    @endif

    @if(! request('is_return') )
        <div class="row">
            <div class="col-md-4">
                {!! HTML::vtext('delivery_challan_no', null, ['label' => 'Delivery Challan No']) !!}
            </div>
            <div class="col-md-4">
                {!! HTML::vtext('delivery_challan_date', null, ['label' => 'Delivery Challan Date',  'class' => 'form-control datepicker2']) !!}
            </div>
            
        </div>
        
    @endif
    @if(isset($model) && $model)
    @else 
        <div class="row">
            <div class="col-md-12" >
                <a class="btn btn-primary btn-sm" id="hello" data-content=".repeter-content" data-container="#item_container" href="javascript:void(0);">Add Document</a>
                <div class="" style="padding-top:8px;">
                    <div class="items" style="padding-top:8px; ">
{{--                        <div class="row">--}}
{{--                            <div class="col-md-4">--}}
{{--                                {!! HTML::vselect('upload_template_id[]', $uploadTypesSelect, null, ['label' => 'Template', 'data-validation' => 'required']) !!}--}}
{{--                            </div>--}}
{{--                            <div class="col-md-4">--}}
{{--                                {!! HTML::vfile('uploads[]', [ 'label' => 'File' , 'multiple' => 'multiple']) !!} --}}
{{--                            </div>--}}
{{--                            <div class="col-md-4" style="padding-top: 1.9em;">--}}
{{--                                <a href="javascript:void(0);" id="remove-btn" class="btn btn-danger btn-sm" onclick="$(this).parents('.items').remove()">--}}
{{--                                      Remove--}}
{{--                                </a>--}}
{{--                            </div>    --}}
{{--                        </div>--}}
                    </div>
                </div>

                
                <div id="item_container">
                    
                </div>
            </div>
        </div>    
    @endif

    @if(! isset($readonly) )
    <hr>
    <div class="row">
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Save</button>
            <button class="btn btn-danger close-add-more" data-clearid="#mainPanel" type="button">Close</button>
        </div>
    </div>
    @endif

</div>

