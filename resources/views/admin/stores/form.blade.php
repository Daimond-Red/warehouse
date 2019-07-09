<div class="row">
    <div class="col-md-4">
        {!! HTML::vtext('name', null, ['label' => 'Warehouse Name', 'data-validation' => 'required']) !!}
    </div>
    
    <div class="col-md-4">
        {!! HTML::vtext('address', null, ['data-validation' => 'required', 'id' => 'autocomplete']) !!}
    </div>
    <div class="col-md-4">
        {!! HTML::vtext('village', null, ['label' => 'Village/Town']) !!}
    </div>

</div>
<div class="row">
    <div class="col-md-4">
        {!! HTML::vtext('district', null, ['label' => 'District']) !!}
    </div>
    <div class="col-md-4">
        {!! HTML::vtext('postcode') !!}
    </div>
    <div class="col-md-4">
        {!! HTML::vtext('lat', null, ['label' => 'Latitude']) !!}
    </div>
    
</div>
<div class="row">
    <div class="col-md-4">
        {!! HTML::vtext('lng', null, ['label' => 'Longitude']) !!}
    </div>
        <div class="col-md-4">
        {!! HTML::vimage('image') !!}
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <button type="submit" class="btn btn-primary">Save</button>
        <button class="btn btn-danger close-add-more" data-clearid="#mainPanel" type="button">Close</button>
    </div>
</div>