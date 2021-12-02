<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Starlight">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/starlight/img/starlight-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/starlight">
    <meta property="og:title" content="Starlight">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title>@yield('title')</title>

    <!-- vendor css -->
    <link href="{{ asset('admin') }}/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="{{ asset('admin') }}/lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="{{ asset('admin') }}/lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link href="{{ asset('admin') }}/lib/rickshaw/rickshaw.min.css" rel="stylesheet">

    <link href="{{ asset('admin') }}/lib/highlightjs/github.css" rel="stylesheet">
    <link href="{{ asset('admin') }}/lib/datatables/jquery.dataTables.css" rel="stylesheet">
    <link href="{{ asset('admin') }}/lib/select2/css/select2.min.css" rel="stylesheet">

    <link href="{{ asset('admin') }}/lib/medium-editor/medium-editor.css" rel="stylesheet">
    <link href="{{ asset('admin') }}/lib/medium-editor/default.css" rel="stylesheet">
    <link href="{{ asset('admin') }}/lib/summernote/summernote-bs4.css" rel="stylesheet">

    <link href="{{ asset('admin') }}/lib/spectrum/spectrum.css" rel="stylesheet">

    <!-- Starlight CSS -->
    <link rel="stylesheet" href="{{ asset('admin') }}/css/starlight.css">
    <link rel="stylesheet" href="{{ asset('common/toastr/toastr.css') }}">
</head>

<body>

    <!-- ########## START: LEFT PANEL ########## -->
    @include('admin.inc.sidebar')
    <!-- ########## END: LEFT PANEL ########## -->

    <!-- ########## START: HEAD PANEL ########## -->
    @include('admin.inc.header')
    <!-- ########## END: HEAD PANEL ########## -->

    <!-- ########## START: RIGHT PANEL ########## -->
    @include('admin.inc.notification')
    <!-- ########## END: RIGHT PANEL ########## --->

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        @yield('dashboard-content')
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

    <script src="{{ asset('admin') }}/lib/jquery/jquery.js"></script>
    <script src="{{ asset('admin') }}/lib/popper.js/popper.js"></script>
    <script src="{{ asset('admin') }}/lib/bootstrap/bootstrap.js"></script>
    <script src="{{ asset('admin') }}/lib/jquery-ui/jquery-ui.js"></script>
    <script src="{{ asset('admin') }}/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>

    <script>
        $(function () {

          'use strict';

          $('.select2').select2({
            minimumResultsForSearch: Infinity
          });

          // Select2 by showing the search
          $('.select2-show-search').select2({
            minimumResultsForSearch: ''
          });

          // Select2 with tagging support
          $('.select2-tag').select2({
            tags: true,
            tokenSeparators: [',', ' ']
          });

          // Datepicker
          $('.fc-datepicker').datepicker({
            showOtherMonths: true,
            selectOtherMonths: true
          });

          $('#datepickerNoOfMonths').datepicker({
            showOtherMonths: true,
            selectOtherMonths: true,
            numberOfMonths: 2
          });

          // Color picker
          $('#colorpicker').spectrum({
            color: '#17A2B8'
          });

          $('#showAlpha').spectrum({
            color: 'rgba(23,162,184,0.5)',
            showAlpha: true
          });

          $('#showPaletteOnly').spectrum({
            showPaletteOnly: true,
            showPalette: true,
            color: '#DC3545',
            palette: [
              ['#1D2939', '#fff', '#0866C6', '#23BF08', '#F49917'],
              ['#DC3545', '#17A2B8', '#6610F2', '#fa1e81', '#72e7a6']
            ]
          });

        });
      </script>

    <script src="{{ asset('admin') }}/lib/highlightjs/highlight.pack.js"></script>
    <script src="{{ asset('admin') }}/lib/datatables/jquery.dataTables.js"></script>
    <script src="{{ asset('admin') }}/lib/datatables-responsive/dataTables.responsive.js"></script>
    <script src="{{ asset('admin') }}/lib/select2/js/select2.min.js"></script>
    <script src="{{ asset('admin') }}/lib/spectrum/spectrum.js"></script>
    <script>
        $(function() {
            'use strict';

            $('#datatable1').DataTable({
                responsive: true,
                language: {
                    searchPlaceholder: 'Search...',
                    sSearch: '',
                    lengthMenu: '_MENU_ items/page',
                }
            });

            $('#datatable2').DataTable({
                bLengthChange: false,
                searching: false,
                responsive: true
            });

            // Select2
            $('.dataTables_length select').select2({
                minimumResultsForSearch: Infinity
            });

        });
    </script>


    <script src="{{ asset('admin') }}/lib/jquery.sparkline.bower/jquery.sparkline.min.js"></script>
    <script src="{{ asset('admin') }}/lib/d3/d3.js"></script>
    <script src="{{ asset('admin') }}/lib/rickshaw/rickshaw.min.js"></script>
    <script src="{{ asset('admin') }}/lib/chart.js/Chart.js"></script>
    <script src="{{ asset('admin') }}/lib/Flot/jquery.flot.js"></script>
    <script src="{{ asset('admin') }}/lib/Flot/jquery.flot.pie.js"></script>
    <script src="{{ asset('admin') }}/lib/Flot/jquery.flot.resize.js"></script>
    <script src="{{ asset('admin') }}/lib/flot-spline/jquery.flot.spline.js"></script>

    <script src="{{ asset('admin') }}/js/starlight.js"></script>
    <script src="{{ asset('admin') }}/js/ResizeSensor.js"></script>
    <script src="{{ asset('admin') }}/js/dashboard.js"></script>

    <script src="{{ asset('admin') }}/lib/medium-editor/medium-editor.js"></script>
    <script src="{{ asset('admin') }}/lib/summernote/summernote-bs4.min.js"></script>

    <script>
      $(function(){
        'use strict';

        // Inline editor
        var editor = new MediumEditor('.editable');

        // Summernote editor
        $('#summernote').summernote({
          height: 150,
          tooltip: false
        })
      });
    </script>

    <script src="{{ asset('common/toastr/toastr.min.js') }}"></script>
    {{-- toaster message start --}}
    <script>
        @if (Session::has('message'))
            var type ="{{ Session::get('alert-type', 'info') }}"
            switch(type){
            case 'info':
            toastr.info(" {{ Session::get('message') }} ");
            break;

            case 'success':
            toastr.success(" {{ Session::get('message') }} ");
            break;

            case 'warning':
            toastr.warning(" {{ Session::get('message') }} ");
            break;

            case 'error':
            toastr.error(" {{ Session::get('message') }} ");
            break;
            }
        @endif
    </script>
    {{-- toaster message end --}}

    {{-- sweetalert delete message start --}}
    <script src="{{ asset('common/sweetalert/sweetalert.min.js') }}"></script>
    <script>
        $(document).on("click", "#delete", function(e) {
            e.preventDefault();
            var link = $(this).attr("href");

            swal({
                    title: "Are you sure To Delete?",
                    text: "Once deleted, you will not be able to recover this imaginary file!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location.href = link;

                    }
                });
        });
    </script>
    {{-- sweetalert delete message end --}}


</body>

</html>
