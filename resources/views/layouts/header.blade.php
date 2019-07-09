<!DOCTYPE html>
<html lang="en" class="">
<head>
    <meta charset="utf-8" />
    <title>{{ config('app.name') }}</title>
    <meta name="description" content="app, web app, responsive, responsive layout, admin, admin panel, admin dashboard, flat, flat ui, ui kit, AngularJS, ui route, charts, widgets, components" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="stylesheet" href=" {{ getMediaUrl('libs/assets/animate.css/animate.css') }}" type="text/css" />
    <link rel="stylesheet" href=" {{ getMediaUrl('libs/assets/font-awesome/css/font-awesome.min.css') }}" type="text/css" />
    <link rel="stylesheet" href=" {{ getMediaUrl('libs/assets/simple-line-icons/css/simple-line-icons.css') }}" type="text/css" />
    
    <link rel="stylesheet" href=" {{ getMediaUrl('libs/jquery/bootstrap/dist/css/bootstrap.css') }}" type="text/css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.4/jquery.fancybox.min.css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href=" {{ getMediaUrl('libs/css/font.css') }}" type="text/css" />
    <link rel="stylesheet" href=" {{ getMediaUrl('libs/css/app.css') }}" type="text/css" />

    <link rel="stylesheet" href="{{ getMediaUrl('assets/global/plugins/bootstrap-summernote/summernote.css') }}">
    <link rel="stylesheet" href="{{ getMediaUrl('assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}">
    <link rel="icon" href="{{ getMediaUrl('fav.png') }}" sizes="16x16" type="image/png">
    @yield('style')
    <style>
        .datepicker {
            background: white !important;
        }
        body{
            color: black !important;
        }

        th, td{
            white-space:nowrap !important;
        }

        ::-webkit-scrollbar {
            width: 0.6em;
        }

        ::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
        }

        ::-webkit-scrollbar-thumb {
            background-color: darkgrey;
            outline: 1px solid slategrey;
        }
        .table{
            overflow-y: hidden;
        }

        .datepicker {
             margin: 0px 0px;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button{
            padding:3px 9px !important;
            border:1px solid lightgrey !important;
            background:transparent !important;
            color: #337ab7 !important;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current, .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover{
            background:#337ab7  !important;
            color:white !important;
        }

        .table-responsive {
            min-height: .01%;
            overflow-x: auto;
            display: block;
            width: 100%;
            width: 100% !important;
        }

    </style>
</head>
<body>
<div class="app app-header-fixed ">
    <header id="header" class="app-header navbar" role="menu">
        <!-- navbar header -->
        <div class="navbar-header bg-dark">
            <button class="pull-right visible-xs dk" ui-toggle-class="show" target=".navbar-collapse">
                <i class="glyphicon glyphicon-cog"></i>
            </button>
            <button class="pull-right visible-xs" ui-toggle-class="off-screen" target=".app-aside" ui-scroll="app">
                <i class="glyphicon glyphicon-align-justify"></i>
            </button>
        
			<a href="/index.html" class="navbar-brand text-lt">
                <img src="{{ getMediaUrl('img/APSFL.png') }}" alt="logo" class="" style="margin-left: 56%">
            </a>
            <!-- / brand -->
        </div>
        <!-- / navbar header -->

        <!-- navbar collapse -->
        <div class="collapse pos-rlt navbar-collapse box-shadow bg-white-only">
            <!-- buttons -->
            <div class="nav navbar-nav hidden-xs">
                <a href="#" class="btn no-shadow navbar-btn" ui-toggle-class="app-aside-folded" target=".app">
                    <i class="fa fa-dedent fa-fw text"></i>
                    <i class="fa fa-indent fa-fw text-active"></i>
                </a>
            </div>


            <!-- nabar right -->
            <ul class="nav navbar-nav navbar-right">

                <li class="dropdown">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle clear" data-toggle="dropdown">
                        <!-- <span class="thumb-sm avatar pull-right m-t-n-sm m-b-n-sm m-l-sm">
                            <img src="{{ getMediaUrl('img/a0.jpg') }}" alt="user">
                            <i class="on md b-white bottom"></i>
                        </span> -->
                        <span class="hidden-sm hidden-md">{{ auth()->user()->name }}</span> <b class="caret"></b>
                    </a>
                    <!-- dropdown -->
                    <ul class="dropdown-menu animated fadeInRight w">

                        <li>
                            <a href="javascript:void(0);" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </ul>
                    <!-- / dropdown -->
                </li>
            </ul>
            <!-- / navbar right -->
        </div>
        <!-- / navbar collapse -->
    </header>
    {{--<div ui-butterbar="" class="butterbar active"><span class="bar"></span></div>--}}
    <!-- aside -->
        @include('layouts.sidebar')
    <!-- / aside -->