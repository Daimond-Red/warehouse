<div class="row">
    <div class="col-md-6">
        {!! HTML::vtext('name', null, ['label' => 'Vendor Name', 'data-validation' => 'required']) !!}
    </div>

    <div class="col-md-6">
        {!! HTML::vinteger('phone', null, ['label' => 'Phone', 'data-validation' => 'required']) !!}
    </div>

    <div class="col-md-4">
        {!! HTML::vtext('package', null, ['data-validation' => 'required']) !!}
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <button type="submit" class="btn btn-primary">Save</button>
        <button class="btn btn-danger close-add-more" data-clearid="#mainPanel" type="button">Close</button>
    </div>
</div>