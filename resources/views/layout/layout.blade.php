<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>AdminLTE 2 | Dashboard</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="{{url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{url('assets/bower_components/font-awesome/css/font-awesome.min.css')}}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="{{url('assets/bower_components/Ionicons/css/ionicons.min.css')}}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{url('assets/dist/css/AdminLTE.min.css')}}">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
        folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="{{url('assets/dist/css/skins/_all-skins.min.css')}}">
        <!-- Morris chart -->
        <link rel="stylesheet" href="{{url('assets/bower_components/morris.js/morris.css')}}">
        <!-- jvectormap -->
        <link rel="stylesheet" href="{{url('assets/bower_components/jvectormap/jquery-jvectormap.css')}}">
        <!-- Date Picker -->
        <link rel="stylesheet" href="{{url('assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="{{url('assets/bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">
        <!-- bootstrap wysihtml5 - text editor -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.3.4/leaflet.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">

            <header class="main-header">
                <!-- Logo -->
                <a href="index2.html" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>A</b>LT</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>Admin</b>LTE</span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>

                    <div class="navbar-custom-menu"> </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu" data-widget="tree">
                        <li class="header">MAIN NAVIGATION</li>
                        <li class="active treeview">
                            <a href="#">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                        </li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <div class="content-wrapper">

                <section class="content-header">
                    <h1>
                        Dashboard
                    </h1>
                </section>

                <section class="content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div id="map" style="height: 550px;"></div>
                        </div>
                    </div>

                    <form id="form_id" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                        <div class="form-group">
                            <label for="fileinput">File input</label>
                            <input type="file" id="fileinput" name="fileinput">
                        </div>
                        <div class="">
                            <button type="button" name="simpan" id="simpan">Submit</button>
                        </div>
                    </form>

                    <div class="row">
                        <section class="col-lg-7 connectedSortable">
                            <section class="col-lg-5 connectedSortable"> </section>
                        </section>
                    </div>
                </section>

            </div>

            <footer class="main-footer">
                <strong>Copyright &copy; 2018 </strong> All rights
                reserved.
            </footer>

        </div>

        <!-- jQuery 3 -->
        <script src="{{url('assets/bower_components/jquery/dist/jquery.min.js')}}"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="{{url('assets/bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
        $.widget.bridge('uibutton', $.ui.button);
        </script>
        <!-- Bootstrap 3.3.7 -->
        <script src="{{url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
        <!-- Morris.js charts -->
        <script src="{{url('assets/bower_components/raphael/raphael.min.js')}}"></script>
        <script src="{{url('assets/bower_components/morris.js/morris.min.js')}}"></script>
        <!-- Sparkline -->
        <script src="{{url('assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>

        <!-- daterangepicker -->
        <script src="{{url('assets/bower_components/moment/min/moment.min.js')}}"></script>
        <script src="{{url('assets/bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
        <!-- datepicker -->
        <script src="{{url('assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
        <!-- sweetalert -->
        <script src="{{url('assets/bower_components/sweet_alert/sweetalert.min.js')}}"></script>

        <!-- Slimscroll -->
        <script src="{{url('assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
        <!-- FastClick -->
        <script src="{{url('assets/bower_components/fastclick/lib/fastclick.js')}}"></script>
        <!-- AdminLTE App -->
        <script src="{{url('assets/dist/js/adminlte.min.js')}}"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="{{url('assets/dist/js/demo.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.3.4/leaflet.js"></script>
        <script>
        const radius = 20;
        var map = L.map('map').setView([0.12108564376831, 117.47071266174], 13);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        $.get("{{url('data')}}", function( data ) {
            data.data.forEach(function(val){
                if (val.coordinate) {
                    let coordinate = [parseFloat(val.coordinate.split(', ')[0]), parseFloat(val.coordinate.split(', ')[1])];
                    let option = {};
                    if (parseFloat(val.signal) < -100) {
                        option = {
                            color: '#ff0015',
                            fillColor: '#ff0015',
                            fillOpacity: 0.5
                        };
                    } else if (between(parseFloat(val.signal), -90, -100)) {
                        option = {
                            color: '#ff9000',
                            fillColor: '#ff9000',
                            fillOpacity: 0.5
                        };
                    } else if (between(parseFloat(val.signal), -80, -90)) {
                        option = {
                            color: '#fff200',
                            fillColor: '#fff200',
                            fillOpacity: 0.5
                        };
                    } else if (parseFloat(val.signal) > -80) {
                        option = {
                            color: '#00ff04',
                            fillColor: '#00ff04',
                            fillOpacity: 0.5
                        };
                    }
                    new L.circle(coordinate, {radius: radius})
                    .setStyle(option)
                    .bindTooltip(`signal: ${val.signal} id: ${val.id_pr}`)
                    .addTo(map);
                }
            });
        });
        function between(x, max, min) {
            return x >= min && x <= max;
        }
        </script>
        <script type="text/javascript">

            $('#simpan').click(function(){
                var uploadfile = new FormData($("#form_id")[0]);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: '{{url("file")}}',
                    data: uploadfile,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        if(data.responses == 'OK'){
                            swal({
                                title: "Sukses",
                                text: "Data telah disimpan",
                                type: "success",
                                timer: 3000,
                                showConfirmButton: true
                            },
                            function(){
                                location.reload();
                            });

                        }
                    }
                });

            });

        </script>
    </body>
</html>
