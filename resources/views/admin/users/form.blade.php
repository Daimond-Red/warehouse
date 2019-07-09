<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('Vendor Name') !!}
            {!! Form::text('name', null, ['placeholder' => 'Vendor Name', 'class' => 'form-control ']) !!}
        </div>

    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('Email') !!}
            {!! Form::email('email', null, ['placeholder' => 'Email', 'class' => 'form-control ']) !!}
        </div>

    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('Password') !!}
            {!! Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control ']) !!}
        </div>

    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('Phone') !!}
            {!! Form::text('phone', null, ['placeholder' => 'Phone', 'class' => 'form-control ']) !!}
        </div>

    </div>

    <div class="col-md-6">
        <div class="form-group">

            {!! Form::label('Image') !!}
            {!! Form::file('image', ['class' => 'form-control ']) !!}
        </div>

    </div>

    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('Address') !!}
            {!! Form::text('address', null, ['placeholder' => 'Address', 'class' => 'form-control ']) !!}
        </div>

    </div>
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('Village') !!}
            {!! Form::text('village', null, ['placeholder' => 'Village', 'class' => 'form-control ']) !!}
        </div>

    </div>
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('District') !!}
            {!! Form::text('district', null, ['placeholder' => 'District', 'class' => 'form-control ']) !!}
        </div>

    </div>
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('Pin-code') !!}
            {!! Form::text('postcode', null, ['placeholder' => 'Pin-code', 'class' => 'form-control ']) !!}
        </div>

    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <button type="submit" class="btn btn-primary">Save</button>
        <button class="btn btn-danger close-add-more" data-clearid="#mainPanel" type="button">Close</button>
    </div>
</div>