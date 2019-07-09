    </div>
    <footer id="footer" class="app-footer" role="footer">
        <div class="wrapper b-t bg-light">
            <span class="pull-right"><a class="m-l-sm text-muted"><i class="fa fa-long-arrow-up"></i></a></span>
            &copy; 2019 Copyright.
        </div>
    </footer>

    <div id="appModal" class="modal fade" role="dialog">
        <!-- Modal content-->
        <div class="modal-dialog modal-lg" style="width: 100%; height: 100%; padding-left: 4%; padding-right: 4%">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" id="dataModelTitle"></h4>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content" id="modelContent">

            </div>
        </div>
    </div>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
    <script src="{{ getMediaUrl('libs/jquery/bootstrap/dist/js/bootstrap.js') }}"></script>
    <script src="{{ getMediaUrl('libs/js/ui-load.js') }}"></script>
    <script src="{{ getMediaUrl('libs/js/ui-jp.config.js') }}"></script>
    <script src="{{ getMediaUrl('libs/js/ui-jp.js') }}"></script>
    <script src="{{ getMediaUrl('libs/js/ui-nav.js') }}"></script>
    <script src="{{ getMediaUrl('libs/js/ui-toggle.js') }}"></script>
    <script src="{{ getMediaUrl('libs/js/ui-client.js') }}"></script>
    {{-- <script src="{{ getMediaUrl('libs/jquery/datatables/media/js/jquery.dataTables.min.js') }}"></script> --}}
    <!-- <script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyDC6FU6iM6b6JyG_gHPWjGPfZXWoc1rlLc&callback=initMap"></script> -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.4/jquery.fancybox.min.js"></script>
    <script src="{{ getMediaUrl('assets/global/plugins/bootstrap-summernote/summernote.min.js') }}"></script>
    <script src="{{ getMediaUrl('assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script type="text/javascript" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	
	<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
    
    {{-- <script src="{{ getMediaUrl('libs/js/repeator.js') }}"></script> --}}

    <script>

        function initFancyBox() {
            $(".light-image").fancybox();
        }

        function errorAlert(msg){
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": true,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "4000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
            toastr.error(msg, "Errors");
        }

        function successAlert(msg) {
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": true,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "4000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
            toastr.success(msg, "Success");
        }

        function pageLoader() {
            $('.butterbar').show();
        }

        function removePageLoader() {
            $('.butterbar').hide();
        }

        $('body').on('click', '.btnAppModel', function () {
            var url = $(this).data('href');
            var title = $(this).data('title');

            pageLoader();

            $.get(url, function(res){

                $('#dataModelTitle').text(title);
                $('#appModal .modal-body').html(res);

                setLibToFields();
                removePageLoader();

                $('#appModal').modal('show');

            });
        });

        $('body').on('click', '.dataModel', function () {

            var url = $(this).data('href');
            var contentId = $(this).data('id');

            pageLoader();

            $.get(url, function(res){
                $(contentId).html(res);

                setLibToFields();
                removePageLoader();
            });
        });
        $('body').on('click', '.dataModelPopup', function () {

            var url = $(this).data('href');
            var contentId = $(this).data('id');
            // alert(url);
            pageLoader();
            // console.log(url);

            $.get(url, function(res){
                $(contentId).html(res);
                $('#myModal').modal('show');
                setLibToFields();
                removePageLoader();
            });
        });
        $('body').on('click', '.close-add-more', function(e){
            var clearid = $(this).data('clearid');
            $('#myModal').modal('hide');
            e.preventDefault();
            $(clearid).html('');
        });

        $('.close-form').click(function(){

            $($(this).data('form')).css('display', 'none');
        });
        function initialize() {

            // autocomplete = new google.maps.places.Autocomplete(
            // /** @type  {HTMLInputElement} */ (document.getElementById('autocomplete')), {
            //     types: ['geocode']
            // });

        }

        $(window).load(function() {

            $.validate();
            initialize();
            // initialize2();

            @if (count($errors) > 0)

                var msg = '';
                @foreach ($errors->all() as $error)
                    msg += '{{ $error }} <br />';
                @endforeach

                errorAlert(msg);
            @endif

            @if(\Session::has('success'))
                var msg1 = '{{ \Session::get('success') }}';
                successAlert(msg1);
            @endif

            $('body').on('click', '.deleteItem', function (e) {

                var that = this;
                e.preventDefault();

                swal({
                    title: "Are you sure?",
                    text: "You will not be able to recover this imaginary",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, delete it!",
                    closeOnConfirm: false
                },function(result) {
                    if(result) window.location.href = $(that).closest('a').attr('href');
                });

            });
            $('body').on('click', '.removeItem', function (e) {

                var that = this;
                e.preventDefault();

                swal({
                    title: "Are you sure?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, delete it!",
                    closeOnConfirm: true
                },function(result) {
                    $(that).closest('tr').remove();

                });

            });
            $('body').on('click', '.approvedItem', function (e) {

                var that = this;
                e.preventDefault();

                swal({
                    title: "Are you sure?",
                    text: "You will not be able to recover this imaginary",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, approve it!",
                    closeOnConfirm: false
                },function(result) {
                    if(result) window.location.href = $(that).closest('a').attr('href');
                });

            });
                
        });

        // pagination
        $('body').on('click', '.ajax-collection .pagination a', function (e) {

            e.preventDefault();
            alert('ds');
            var url = $(this).attr('href');
            var table = $(this).closest('.ajax-collection');
            pageLoader();
            $.get(url, function(data){

                //create jquery object from the response html
                var $response=$(data);
                //query the jq object for the values
                var dataToday = $response.find('.ajax-collection').html();
                $(table).html(dataToday);
                // initFancyBox();
                $('[data-toggle="tooltip"]').tooltip();
                removePageLoader();

            });

        });
        // ./ pagination
        // $(document).ready( function () {
           
        // });
		
		$('table').DataTable({
			dom: 'Bfrtip',
            aaSorting: [[0, 'desc']],
			buttons: [
				{
					extend: 'excelHtml5',
					exportOptions: {
					    orthogonal: 'export',
                        columns: 'th:not(:last-child)'
					}
				},

			]
		});

        function setLibToFields(){
            initialize();
            $.validate();
            // $('table').DataTable();
			
			 
			
            $('.select2-select').select2();

            $('[data-toggle="tooltip"]').tooltip();
            $('[data-toggle="popover"]').popover();

            initFancyBox();

            $('.editor').summernote({
                height: 70
            });

            //$(".datepicker").datepicker("destroy");
            $(".datepicker").attr('readonly', true);

            $('.datepicker').datetimepicker({
                weekStart: 1,
                todayBtn:  1,
                autoclose: 1,
                todayHighlight: 1,
                startView: 2,
                minView: 2,
                forceParse: 0,
                format: 'dd-mm-yyyy',
                startDate : new Date()
            });

            $('.datepicker2').datetimepicker({
                weekStart: 1,
                todayBtn:  1,
                autoclose: 1,
                todayHighlight: 1,
                startView: 2,
                minView: 2,
                forceParse: 0,
                format: 'dd-mm-yyyy'
            });

            $(".datepickerMonth").attr('readonly', true);
            $('.datepickerMonth').datetimepicker({
                autoclose: 1,
                format: 'mm',
                startView: 3,
                minView: 3,
            });

            $(".datepickerYear").attr('readonly', true);
            $('.datepickerYear').datetimepicker({
                autoclose: 1,
                format: 'yyyy',
                startView: 4,
                minView: 4,
            });

            
            // $("#repeater").createRepeater();
            


        }

        $(window).load(function () {
            $('body').on('click', '#hello', function(e){
                e.preventDefault();

                var contentClass = $(this).data('content');
                var containerId = $(this).data('container');
                $(containerId).append($(contentClass).html());
            });
            setLibToFields();
        });

        (function() {
            // hold onto the drop down menu
            var dropdownMenu;

            // and when you show it, move it to the body
            $(window).on('show.bs.dropdown', function(e) {

                // grab the menu
                dropdownMenu = $(e.target).find('.dropdown-menu');

                // detach it and append it to the body
                $('body').append(dropdownMenu.detach());

                // grab the new offset position
                var eOffset = $(e.target).offset();

                // make sure to place it where it would normally go (this could be improved)
                dropdownMenu.css({
                    'display': 'block',
                    'top': eOffset.top + $(e.target).outerHeight(),
                    'left': eOffset.left,
                    'z-index': 9999999
                });
            });

            // and when you hide it, reattach the drop down, and hide it normally
            $(window).on('hide.bs.dropdown', function(e) {
                $(e.target).append(dropdownMenu.detach());
                dropdownMenu.hide();
            });
        })();

    </script>
    @yield('script')
    
</body>
</html>