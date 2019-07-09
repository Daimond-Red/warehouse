<div class="panel panel-white">
    <div class="panel-heading">
        <div class="row">
            <div class="col-xs-8 col-sm-8 col-md-8">
                <h3 class="panel-title text-capitalize">Create New</h3> </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <a href="#panel-1" class="pull-right" data-toggle="collapse"> <i class="fa fa-angle-down fa-lg gray"></i> </a>
            </div>
        </div>
    </div>
    <div id="panel-1" class="collapse in">
        <div class="panel-body">
            {{ Form::open( [ 'route' => 'admin.users.store', 'method' => 'POST', 'files' => true, 'class' => 'form' ]) }}
            @include('admin.users.form')
            {{ Form::close() }}
        </div>
    </div>
</div>