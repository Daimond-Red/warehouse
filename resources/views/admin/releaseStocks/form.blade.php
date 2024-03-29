<div class="row">
    <?php $arr = ['' => 'Select'];

    $arr = $arr + (new \App\Basecode\Classes\Repositories\StoreRepository())->getCollection()->pluck('name', 'id')->toArray();

    ?>
    @if(! isset($readonly) )
    <div class="col-md-3">
        <div class="form-group">

            @if(\request('store_id'))
                {!! Form::label('Release From') !!}
                {!! Form::select('store_id', $arr, \request('store_id'), ['class' => 'form-control ', 'id' => 'store', 'data-validation' => 'required',]) !!}
            @else
                {!! Form::label('Release From') !!}
                {!! Form::select('store_id', $arr, null, ['class' => 'form-control ', 'id' => 'store', 'data-validation' => 'required',]) !!}
            @endif
            
        </div>

    </div>
    @endif

    <div class="col-md-3">
        <div class="form-group">
            {!! Form::label('Date') !!}
            {!! Form::text('date', date('d-m-Y'), ['placeholder' => 'Date', 'class' => 'form-control datepicker2', 'data-validation' => 'required', 'readonly']) !!}
        </div>

    </div>
    <div class="col-md-3">
        <div class="form-group">
            {!! Form::label('Release To (Person Name)') !!}
            {!! Form::text('person_name', null, ['placeholder' => 'Release To (Person Name)', 'class' => 'form-control', 'data-validation' => 'required']) !!}
        </div>

    </div>
    <!-- <div class="col-md-3">
        <div class="form-group">
            <?php //$arr = ['' => 'Select'];

            // foreach (\App\Vendor::get()->toArray() as $user) $arr[$user['id']] = $user['name'];
            ?>
            {!! Form::label('Vendor') !!}
            {!! Form::select('vendor_id', $arr, null, ['class' => 'form-control', 'data-validation' => 'required', 'id' => 'vendor']) !!}
        </div>

    </div> -->
    <div class="col-md-3">
        <div class="form-group">
            {!! Form::label('Contact Number') !!}
            {!! Form::text('phone', null, ['placeholder' => 'Contact Number', 'class' => 'form-control', 'id' => 'phone', 'data-validation' => 'required', 'minlegth' => '10', 'maxlength' => '10' ]) !!}
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            {!! Form::label('Remarks') !!}
            {!! Form::textarea('remarks', null, ['placeholder' => 'Remarks', 'class' => 'form-control', 'id' => 'remarks', 'rows' => 1  ]) !!}
        </div>
    </div>

    <div class="col-md-3">
        {!! HTML::vtext('indent_number', null, ['label' => 'Indent Number']) !!}
    </div>
    <div class="col-md-3">
        {!! HTML::vtext('indent_date', null, ['label' => 'Indent Date', 'class' => 'form-control datepicker']) !!}
    </div>

    <div class="col-md-3">
        {!! HTML::vtext('vehicle_no', null, ['label' => 'Vehicle No']) !!}
    </div>

    <div class="col-md-3">
        {!! HTML::vtext('gate_pass_no', null, ['label' => 'Gate Pass No']) !!}
    </div>
    
</div>
<div class="row">
    <div class="col-md-12">
        <a class="btn btn-primary btn-sm" id="hello" data-content=".repeter-content" data-container="#item_container" href="javascript:void(0);">Add</a>
        <div class="" style="padding-top:8px;">
            <div class="items" style="padding:6px 0; ">
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

        
        <div id="item_container">
            
        </div>
    </div>
</div>