<div class="row">
    <div class="col-md-6">
        {!! HTML::vtext('name', null, ['data-validation' => 'required']) !!}
    </div>
    <div class="col-md-6">
        {!! HTML::vtext('email', null, ['data-validation' => 'email']) !!}
    </div>

    <div class="col-md-6">
        @if( isset($model) )
            {!! HTML::vtext('password', '') !!}
        @else
            {!! HTML::vtext('password', null, ['data-validation' => 'required']) !!}
        @endif
    </div>
    {{--<div class="col-md-6">--}}
        {{--{!! HTML::vselect('status', ['' => 'Please select', 'Enable', 'Disable'], null, ['data-validation' => 'required']) !!}--}}
    {{--</div>--}}

   

</div>

 {{-- @include('admin.adminUsers.permission') --}}
<div class="row">
    <div style="margin-top:10px;" class="col-md-12">
        <button type="submit" class="btn btn-primary">Save</button>
        <button class="btn btn-danger close-add-more" data-clearid="#mainPanel" type="button">Close</button>
    </div>
</div>