@extends('layouts.master')

@section('pageBar')
    Location
@stop
@section('content')
    <div id="mainPanel"></div>
    <div class="ajax-collection">
        <div class="panel panel-default">
            <div style="overflow:hidden;" class="panel-heading">
                Location
            </div>
            <div>
                <table class="table table-striped" ui-jq="footable" >
                    <thead>
                    <tr>
                        @if( isAuth('Location', 'destroy') )
                        <th width="150">Action</th>
                        @endif
                        <th data-breakpoints="xs">ID</th>
                        <th>Location</th>
                        <th>Radius Range</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(!count($collection))
                        <tr>
                            <td colspan="15" class="text-center">No matching records found</td>
                        </tr>
                    @else
                        @foreach($collection as $model)
                            <tr data-expanded="true">
                                @if( isAuth('Location', 'destroy') )
                                <td>
                                    <div class="btn-group dropdown">
                                        <button
                                                data-id="#mainPanel"
                                                data-href="{{ route('admin.locations.edit', $model->id) }}"
                                                class="btn btn-info dataModel btn-xs">Edit</button>
                                    </div>
                                </td>
                                @endif
                                <td>{{ $model->id }}</td>
                                <td>{{ $model->location }}</td>
                                <td>{{ $model->radius }} miles </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop

@section('script')
    <script>
        $(document).ready(function(){
            $('.master-menu').addClass('active')
            $('.master-menu ul').show();
            $('.location-menu').addClass('active');
        });
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyDC6FU6iM6b6JyG_gHPWjGPfZXWoc1rlLc"></script>
    <script type="text/javascript">
        function initialize() {

            autocomplete = new google.maps.places.Autocomplete(
            /** @type  {HTMLInputElement} */ (document.getElementById('autocomplete')), {
                types: ['geocode']
            });

        }
    </script>
@stop