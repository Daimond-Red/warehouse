<div class="panel panel-white">
    <div class="panel-heading">
        <div class="row">
            <div class="col-xs-8 col-sm-8 col-md-8">
                <h3 class="panel-title text-capitalize">Edit Details</h3> </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
        </div>
    </div>
    <div id="panel-1" class="collapse in">
        <div class="panel-body">
            {{ Form::model($model, [ 'route' => ['admin.items.update', $model->id], 'method' => 'PUT', 'files' => true, 'class' => 'form' ]) }}
            <div class="col-md-6">
                <div class="form-group">
                    {!! form::hidden('itemId', $model->id, ['id' => 'itemId']) !!}
                    {!! Form::label('Quantity') !!}
                    {!! Form::text('quantity', null, ['placeholder' => 'Quantity', 'class' => 'form-control ', 'id' => 'editQuantity', 'data-id' => $model->id ]) !!}
                </div>

            </div>
            <div class="row">
                <div class="col-md-12">
                    <a class="btn btn-primary changeQuantity">Save</a>
                    {{--<button class="btn btn-danger close-add-more" data-clearid="#mainPanel" type="button">Close</button>--}}
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>