@extends('layouts.master')

@section('pageBar')
    STOCKS
@stop
@section('content')

    <div class="panel panel-default">
        <div style="overflow:hidden;" class="panel-heading">
            Documents - List
        </div>
        <div>

            <div class="row" style="margin: 1%">
                <div class="col-md-3">
                    {{ Form::open( [ 'route' => ['admin.items.documentsStore', $model->id], 'method' => 'POST', 'files' => true ]) }}
                        {!! HTML::vselect('upload_template_id', $uploadTypesSelect, null, ['label' => 'Template', 'data-validation' => 'required']) !!}
                        {!! HTML::vfile('file', ['data-validation' => 'required']) !!}
                        {!! Form::hidden('type', $type) !!}
                        <button class="btn btn-primary">Upload</button>
                    {!! Form::close() !!}
                </div>
                <div class="col-md-9">
                    <div class="row">
                        @foreach( \App\MediaFile::whereModelId($model->id)->whereModel(\App\Item::class)->whereType($type)->get() as $row )
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
                                <div class="prtm-block" style="padding: 0px">
                                    <div class="overlay-wrap text-center">
                                        <div class="">
                                            <a href="{{ getMediaUrl($row->url) }}" download>
                                                <img src="{{ getMediaUrl('svg/file.svg') }}" alt="Video" class="img-responsive" width="100" height="100">
                                            </a>
                                        </div>
                                        <div class="hover-overlay pos-center primary-tp-layer">
                                            <div class="center-holder">
                                                <a href="{{route('admin.items.documentsDelete', $row->id)}}" class="deleteItem btn btn-danger btn-block">Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wrapper-content">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <span class="mrgn-b-xs show" style="text-align: center">{{$row->name}}</span>
                                                <b>Template:</b> {{ optional($row->typeRel)->title }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
@stop

@section('script')
    <script>
        $(document).ready(function(){

            $('.master-menu').addClass('active')
            $('.master-menu ul').show();
            $('.stocklist-menu').addClass('active');

        });
    </script>
@stop