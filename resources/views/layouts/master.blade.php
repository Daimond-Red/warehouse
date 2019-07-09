@include('layouts.header')
<div id="content" class="app-content" role="main">
    <div class="app-content-body ">
        <div ui-butterbar="" class="butterbar active" style="display: none"><span class="bar"></span></div>
        <div class="bg-light lter b-b wrapper-md">
            <h1 class="m-n font-thin h3">@yield('pageBar')</h1>
        </div>
        <div class="wrapper-md">
            @yield('content')
        </div>
    </div>
</div>
@include('layouts.footer')