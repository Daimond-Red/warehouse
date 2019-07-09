<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('Item Name') !!}
            {!! Form::text('name', null, ['placeholder' => 'Item Name', 'data-validation' => 'required', 'class' => 'form-control ']) !!}
        </div>

    </div>
    <!-- <div class="col-md-6">
        <div class="form-group">
            <?php
                $arr = [];

                // foreach (\App\ItemType::get()->toArray() as $type) $arr[$type['title']] = $type['title'];

            ?>
            {!! Form::label('Item Type') !!}
            {!! Form::select('type', $arr, null, [ 'class' => 'form-control ']) !!}
        </div>

    </div> -->
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('Description') !!}
            {!! Form::textarea('description', null, ['placeholder' => 'Description', 'class' => 'form-control ']) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <?php $arr = [];

                foreach (\App\Unit::get()->toArray() as $unit) $arr[$unit['id']] = $unit['unit'];
            ?>
            {!! Form::label('Unit') !!}
            {!! Form::select('unit_id', $arr, null, ['class' => 'form-control ']) !!}
        </div>

    </div>

    <div class="col-md-6">
        <div class="form-group">

            {!! Form::label('Image') !!}
            {!! Form::file('image', ['class' => 'form-control ']) !!}
        </div>

    </div>
    
</div>
<div class="row">
    <div class="col-md-12">
        <button type="submit" class="btn btn-primary">Save</button>
        <button class="btn btn-danger close-add-more" data-clearid="#mainPanel" type="button">Close</button>
    </div>
</div>