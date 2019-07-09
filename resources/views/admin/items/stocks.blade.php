@extends('layouts.master')

@section('pageBar')
    {{ auth()->user()->name }} - WAREHOUSE MANAGEMENT
@stop
@section('content')

<style>
label{
	display:block;
}
.select2-container{
	width:100% !important;
}
.select2-container--default .select2-selection--single {
    border: 1px solid #cfdadd !important;
    border-radius: 1px !important;
    height: 32px !important;
}
</style>

    <!-- stats -->
    <div class="row">
        <div class="col-md-12">
            <div class="row row-sm text-center">

                @if( isAuth('Store', 'index') && isAuth('Store', 'create') && (!isSuperAdmin()) )
                <div class="col-xs-3">
                    <a href="{{ route('admin.stores.index') }}" class="block panel padder-v item">
                        <div class="h1 text-info h3">Add Warehouse</div>
                    </a>
                </div>
                @endif

                <div class="col-xs-3">
                    <a id="search" class="block panel padder-v item">
                        <span class="text-info h3 block">Search Warehouse</span>
                    </a>
                </div>

                @if( isAuth('Item', 'index') && isAuth('Item', 'create') && (!isSuperAdmin()) )
                <div class="col-xs-3">
                    <a href="{{ route('admin.items.index') }}" class="block panel padder-v  item">
                        <span class="text-info h3 block">Add Stock</span>
                    </a>
                </div>
                @endif

                @if(  (!isSuperAdmin()) )
                    <div class="col-xs-3">
                        <a href="{{ route('admin.releaseStocks.index') }}" class="block panel padder-v item">
                            <span class="text-info  h3 block">Release Stock</span>
                        </a>
                    </div>
                @endif

            </div>
        </div>
    </div>
    <!-- / stats -->

    <div id="search-panel" style="display: none;" class="panel panel-default">
        <div class="panel-body">

            {{ Form::open( [ 'route' => 'admin.items.stocks', 'method' => 'POST', 'class' => 'form'  ]) }}
                <div class="row">
                    <div class="form-group col-md-6">
                        <?php //$val = isset(\request('location')) ?>
                        {!! Form::label('Location') !!}
                        {!! Form::text('location', \request('location'), [ 'class' => 'form-control', 'id' => 'autocomplete', 'placeholder' => 'Location']) !!}
                        
                    </div>
                    <div class="col-md-2">
                        {!! HTML::vinteger('radius', null, ['label' => 'Radius']) !!}
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <?php $arr = ['' => 'Select'];
                                $arr = array_merge($arr, (new \App\Basecode\Classes\Repositories\StoreRepository())->getCollection(false)->pluck('name', 'name')->toArray()) ;
                                
                            ?>
                            {!! HTML::vselect('name', $arr,  null, [ 'label' => 'Warehouse Name', 'class' => 'form-control select2-select']) !!}

                        </div>
                        
                    </div>
                        
                </div>
                <div class="row">
                    
                </div>
                <button type="submit" class="btn btn-primary">Search</button>
                <button id="close-search-panel" type="button" class="btn btn-danger">Close</button>
            {{ Form::close() }}
        </div>
    </div>

    <div class="panel panel-default"><div class="panel-body" id="map_div" style="height: 100vh;"></div></div>

@stop

@section('script')
    <script>

        function initMap() {

            locations = [];

            <?php if( isset($data) ): ?>
                locations = <?php echo json_encode($data);?>;
                Lat = parseFloat("{{ $lat }}");
                Lng = parseFloat("{{ $lng }}");
            <?php endif; ?>

            var uluru = {lat: Lat, lng: Lng};
            
            <?php if( $lat == 0 && $lng == 0 ) { ?>
                var uluru = {lat: 15.8884015, lng: 78.5179578};
            <?php } ?>

            var map = new google.maps.Map(document.getElementById('map_div'), {
                // zoom: 5,
                center: uluru
            });

            var infowindow = new google.maps.InfoWindow();
            var markerBounds = new google.maps.LatLngBounds();

            var marker, i;

            for (j = 0; j < locations.length; j++) {

                for (i = 0; i < locations[j].length; i++) {

                    var markerPosition = new google.maps.LatLng(locations[j][i][1], locations[j][i][2]);
                    marker = new google.maps.Marker({
                        position: markerPosition,
                        map: map,
                        icon: '{{ getMediaUrl('uploads/marker.png') }}'
                    });
                    
                    infowindow.setContent(locations[j][i][0]);
                    //infowindow.open(map, marker);
                    markerBounds.extend(markerPosition);

                    google.maps.event.addListener(marker, 'click', (function(marker, i,j) {

                        return function() {
                            infowindow.setContent(locations[j][i][0]);
                            infowindow.open(map, marker);
                        }

                    })(marker, i,j));

                    // infowindow.open(map, marker);
                }

            }

            map.fitBounds(markerBounds);
            map.panToBounds(markerBounds); 

            if (markerBounds.getNorthEast().equals(markerBounds.getSouthWest())) {
               var extendPoint = new google.maps.LatLng(markerBounds.getNorthEast().lat() + 0.25, markerBounds.getNorthEast().lng() + 0.25);
               markerBounds.extend(extendPoint);
            }

            map.fitBounds(markerBounds);

        }

        $(document).ready(function () {
            $('.stockmanagement-menu').addClass('active');

            $('body').on('click', '#search', function() {
                $('#search-panel').show();
            });

            $('#close-search-panel').click(function(){
                $('#search-panel').hide();
            });
        });

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyDC6FU6iM6b6JyG_gHPWjGPfZXWoc1rlLc&callback=initMap"></script>
    <script type="text/javascript">
        autocomplete = new google.maps.places.Autocomplete(
        /** @type  {HTMLInputElement} */ (document.getElementById('autocomplete')), {
            types: ['geocode']
        });
    </script>
   
@stop