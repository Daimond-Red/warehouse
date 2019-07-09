    </div>
    <footer id="footer" class="app-footer" role="footer">
        <div class="wrapper b-t bg-light">
            <span class="pull-right"><a class="m-l-sm text-muted"><i class="fa fa-long-arrow-up"></i></a></span>
            &copy; 2019 Copyright.
        </div>
    </footer>
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
    <!-- <script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyDC6FU6iM6b6JyG_gHPWjGPfZXWoc1rlLc&callback=initMap"></script> -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.4/jquery.fancybox.min.js"></script>
    <script src="{{ getMediaUrl('assets/global/plugins/bootstrap-summernote/summernote.min.js') }}"></script>
    <script src="{{ getMediaUrl('assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script type="text/javascript" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

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

                
        });

        // pagination
        $('body').on('click', '.ajax-collection .pagination a', function (e) {

            e.preventDefault();
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
        $(document).ready( function () {
            $('table').DataTable();
        } );
        function setLibToFields(){
            initialize();
            $.validate();
            $('.select2-select').select2();

            $('[data-toggle="tooltip"]').tooltip();
            $('[data-toggle="popover"]').popover();

            initFancyBox();

            $('.editor').summernote({
                height: 70
            });

            //$(".datepicker").datepicker("destroy");
            // $(".datepicker").attr('readonly', true);

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

        }



        setLibToFields();
    </script>
    @yield('script')
    
</body>
</html>