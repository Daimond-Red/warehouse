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
            {{ Form::open( [ 'route' => 'admin.releaseStocks.store', 'method' => 'POST', 'files' => true, 'class' => 'form' ]) }}
            @include('admin.releaseStocks.form')


            <div>
                <table class="table table-striped"  >

                    <tbody id="itemList">

                    </tbody>
                </table>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Release</button>
                    <button class="btn btn-danger close-add-more" data-clearid="#mainPanel" type="button">Close</button>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>