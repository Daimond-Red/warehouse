@extends('layouts.master')

@section('content')
    <div id="content" class="app-content" role="main">
        <div class="app-content-body ">
            <div class="bg-light lter b-b wrapper-md">
                <h1 class="m-n font-thin h3">RELEASE STOCK</h1>
            </div>
            <div class="wrapper-md">

                <div id="mainPanel">

                </div>


                <div class="panel panel-default">
                    <div style="overflow:hidden;" class="panel-heading">
                        Release Stock - List
                        <span class="pull-right">
                            <a
                                    data-id="#mainPanel"
                                    data-href="{{ route('admin.releaseStocks.create') }}"
                                    class="dataModel btn btn-primary btn-sm">Release Stock</a></span>
                    </div>
                    <div>
                        <table class="table table-striped"  >
                            <thead>
                            <tr>
                                <th >ID</th>
                                <th>Vendor</th>
                                <th>Warehouse</th>
                                <th>Stock</th>
                                <th>Quantity</th>

                                <th width="150">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!count($collection))
                                <tr>
                                    <td colspan="15" class="text-center"> No matching records found </td>
                                </tr>
                            @else
                                @foreach($collection as $model)
                                    <tr data-expanded="true">
                                        <td>{{ $model->id }}</td>
                                        <td>{{ optional($model->vendor)->name }}</td>
                                        <td>{{ optional($model->store)->name }}</td>
                                        <td>{{ optional($model->stock)->name }}</td>
                                        <td>{{ $model->quantity.' '.optional($model->stock->unit)->unit }}</td>
                                        <td>
                                            <div class="btn-group dropdown">
                                                <button
                                                        data-id="#mainPanel"
                                                        data-href="{{ route('admin.releaseStocks.edit', $model->id) }}"
                                                        class="btn btn-info btn-xs dataModel">Edit</button>
                                            </div>
                                            <div class="btn-group dropdown">
                                                <a class="deleteItem btn btn-danger btn-xs" href="{{route('admin.releaseStocks.delete', $model->id)}}" >Delete</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('script')
    <script>
        $(window).load(function(){
            $('body').on('change', '#store', function () {
                $.get(url, function(res){
                    $(contentId).html(res);
                    setLibToFields();
                    removePageLoader();
                });
            });
        });

    </script>
@stop