<div class="row">
    
    <div class="col-md-6">
        {!! HTML::vtext('location', null, [ 'label' => 'Location', 'data-validation' => 'required', 'id' => 'autocomplete']) !!}
    </div>
    <div class="col-md-6">
        {!! HTML::vinteger('radius', null, [ 'label' => 'Range', 'data-validation' => 'required']) !!}
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <button type="submit" class="btn btn-primary">Save</button>
        <button class="btn btn-danger close-add-more" data-clearid="#mainPanel" type="button">Close</button>
    </div>
</div>