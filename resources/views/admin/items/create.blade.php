<div class="panel panel-white">
    <div class="panel-heading">
        <div class="row">
            <div class="col-xs-8 col-sm-8 col-md-8">
                @if( request('is_return') )
                <h3 class="panel-title text-capitalize">Return stock</h3> </div>
                @else
                <h3 class="panel-title text-capitalize">Add Stock/ Received Stock</h3> </div>
                @endif
            <div class="col-xs-4 col-sm-4 col-md-4">
                <a href="#panel-1" class="pull-right" data-toggle="collapse"> <i class="fa fa-angle-down fa-lg gray"></i> </a>
            </div>
        </div>
    </div>
    <div id="panel-1" class="collapse in">
        <div class="panel-body">
            <div class="repeter-content" style="display: none;">
                <div class="items" style="padding-top:8px; ">
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
            {{ Form::open( [ 'route' => 'admin.items.store', 'method' => 'POST', 'files' => true, 'class' => 'form' ]) }}
                @include('admin.items.form')
            {{ Form::close() }}
        </div>
    </div>
</div>