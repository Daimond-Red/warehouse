<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <?php $arr = ['' => 'Select'];

            foreach (\App\Store::get()->toArray() as $store) $arr[$store['id']] = $store['name'];
            ?>
            {!! Form::label('Warehouse From') !!}
            {!! Form::select('store_id', $arr, null, ['class' => 'form-control ']) !!}
        </div>

    </div>
    <div class="col-md-6">
        <div class="form-group">
            <?php $arr = ['' => 'Select'];

            foreach (\App\Item::get()->toArray() as $item) $arr[$item['id']] = $item['name'];
            ?>
            {!! Form::label('Stock') !!}
            {!! Form::select('item_id', $arr, null, ['class' => 'form-control ']) !!}
        </div>

    </div>
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-3>
                <div class="form-group">
                    {!! Form::label('') !!}
                    {!! Form::text('remain_quantity', null, ['placeholder' => 'Quantity', 'class' => 'form-control ', 'disabled' => true]) !!}
                </div>
            </div>
            <div class="col-md-9">
                <div class="form-group">
                    {!! Form::label('Quantity') !!}
                    {!! Form::text('quantity', null, ['placeholder' => 'Quantity', 'class' => 'form-control ']) !!}
                </div>
            </div>
        </div>


    </div>

</div>
<div class="row">
    <div class="col-md-12">
        <button type="submit" class="btn btn-primary">Save</button>
        <button class="btn btn-danger close-add-more" data-clearid="#mainPanel" type="button">Close</button>
    </div>
</div>