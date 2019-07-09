<div class="row">
    <div class="col-md-6">
        {!! HTML::vtext('name', null, ['label' => 'Item Name', 'data-validation' => 'required']) !!}
    </div>
    <div class="col-md-6">
        {!! HTML::vimage('image') !!}
    </div>
</div>

<div class="row">

    <div class="col-md-6">
        <?php
        $arr = ['' => 'Select'];
        $arr = (new \App\Basecode\Classes\Repositories\UnitRepository())->getCollection()->orderBy('id', 'desc')->pluck('unit', 'id');

        ?>
        {!! HTML::vselect('unit_id', $arr, null, ['label' => 'Unit', 'data-validation' => 'required', 'class' => 'form-control select2-select']) !!}
    </div>
    <div class="col-md-6">
        <?php
        $arr = ['' => 'Select'];
        $arr = (new \App\Basecode\Classes\Repositories\ItemTypeRepository())->getCollection()->orderBy('id', 'desc')->pluck('title', 'title');
        ?>
        {!! HTML::vselect('stock_type', $arr, null, ['label' => 'Item Type', 'data-validation' => 'required', 'class' => 'form-control select2-select']) !!}
    </div>

</div>
<div class="row">
    <div class="col-md-12">
        {!! HTML::vtextarea('description', null, ['label' => 'Description']) !!}
    </div>
</div>
<div class="row">

</div>
<div class="row">
    <div class="col-md-12">
        <button type="submit" class="btn btn-primary">Save</button>
        <button class="btn btn-danger close-add-more" data-clearid="#mainPanel" type="button">Close</button>
    </div>
</div>