<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Blank Page</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?= base_url("/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css") ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url("/adminlte/bower_components/font-awesome/css/font-awesome.min.css") ?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?= base_url("/adminlte/bower_components/Ionicons/css/ionicons.min.css") ?>">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url("adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css") ?>">
    <link rel="stylesheet" href="<?= base_url("adminlte/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css") ?>">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="<?= base_url("adminlte/plugins/iCheck/all.css") ?>">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?= base_url("adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.css") ?>">
    <!-- Morris chart -->
    <link rel="stylesheet" href="<?= base_url("adminlte/bower_components/morris.js/morris.css") ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url("/adminlte/dist/css/AdminLTE.css") ?>">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?= base_url("/adminlte/dist/css/skins/_all-skins.min.css") ?>">

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
    <!-- Site wrapper -->
    <div class="wrapper">

        <!-- =============================================== -->

        <!-- Navbar -->
        <?= $this->include('project/layouts/includes/header.php') ?>
        <!-- /.navbar -->

        <!-- =============================================== -->

        <!-- Main Sidebar Container -->
        <?= $this->include('project/layouts/includes/sidebar.php') ?>
        <!-- /.sidebar -->

        <!-- =============================================== -->

        <!-- Content Wrapper. Contains page content -->
        <?= $this->renderSection('content') ?>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 2.4.0
            </div>
            <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
            reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Create the tabs -->
            <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
                <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>

                <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <!-- Home tab content -->
                <div class="tab-pane" id="control-sidebar-home-tab">
                    <h3 class="control-sidebar-heading">Recent Activity</h3>
                    <ul class="control-sidebar-menu">
                        <li>
                            <a href="javascript:void(0)">
                                <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                                    <p>Will be 23 on April 24th</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <i class="menu-icon fa fa-user bg-yellow"></i>

                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                                    <p>New phone +1(800)555-1234</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                                    <p>nora@example.com</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <i class="menu-icon fa fa-file-code-o bg-green"></i>

                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                                    <p>Execution time 5 seconds</p>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <!-- /.control-sidebar-menu -->

                    <h3 class="control-sidebar-heading">Tasks Progress</h3>
                    <ul class="control-sidebar-menu">
                        <li>
                            <a href="javascript:void(0)">
                                <h4 class="control-sidebar-subheading">
                                    Custom Template Design
                                    <span class="label label-danger pull-right">70%</span>
                                </h4>

                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <h4 class="control-sidebar-subheading">
                                    Update Resume
                                    <span class="label label-success pull-right">95%</span>
                                </h4>

                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <h4 class="control-sidebar-subheading">
                                    Laravel Integration
                                    <span class="label label-warning pull-right">50%</span>
                                </h4>

                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <h4 class="control-sidebar-subheading">
                                    Back End Framework
                                    <span class="label label-primary pull-right">68%</span>
                                </h4>

                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <!-- /.control-sidebar-menu -->

                </div>
                <!-- /.tab-pane -->
                <!-- Stats tab content -->
                <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
                <!-- /.tab-pane -->
                <!-- Settings tab content -->
                <div class="tab-pane" id="control-sidebar-settings-tab">
                    <form method="post">
                        <h3 class="control-sidebar-heading">General Settings</h3>

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Report panel usage
                                <input type="checkbox" class="pull-right" checked>
                            </label>

                            <p>
                                Some information about this general settings option
                            </p>
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Allow mail redirect
                                <input type="checkbox" class="pull-right" checked>
                            </label>

                            <p>
                                Other sets of options are available
                            </p>
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Expose author name in posts
                                <input type="checkbox" class="pull-right" checked>
                            </label>

                            <p>
                                Allow the user to show his name in blog posts
                            </p>
                        </div>
                        <!-- /.form-group -->

                        <h3 class="control-sidebar-heading">Chat Settings</h3>

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Show me as online
                                <input type="checkbox" class="pull-right" checked>
                            </label>
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Turn off notifications
                                <input type="checkbox" class="pull-right">
                            </label>
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Delete chat history
                                <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                            </label>
                        </div>
                        <!-- /.form-group -->
                    </form>
                </div>
                <!-- /.tab-pane -->
            </div>
        </aside>
        <!-- /.control-sidebar -->
        <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->


    <!-- jQuery 3 -->
    <script src="<?= base_url("/adminlte/bower_components/jquery/dist/jquery.min.js") ?>"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?= base_url("/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js") ?>"></script>
    <!-- DataTables -->
    <script src="<?= base_url("adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js") ?>"></script>
    <script src="<?= base_url("adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js") ?>"></script>
    <script src="<?= base_url("adminlte/bower_components/datatables.net-bs/js/dataTables.responsive.min.js") ?>"></script>
    <script src="<?= base_url("adminlte/bower_components/datatables.net-bs/js/responsive.bootstrap.min.js") ?>"></script>
    <!-- SweetAlert 2 -->
    <script src="<?= base_url("adminlte/plugins/sweetalert2/sweetalert2.all.js") ?>"></script>
    <!-- By default SweetAlert2 doesn't support IE. To enable IE 11 support, include Promise polyfill:-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
    <!-- iCheck 1.0.1 -->
    <script src="<?= base_url("adminlte/plugins/iCheck/icheck.min.js") ?>"></script>
    <!-- InputMask -->
    <script src="<?= base_url("adminlte/plugins/input-mask/jquery.inputmask.js") ?>"></script>
    <script src="<?= base_url("adminlte/plugins/input-mask/jquery.inputmask.date.extensions.js") ?>"></script>
    <script src="<?= base_url("adminlte/plugins/input-mask/jquery.inputmask.extensions.js") ?>"></script>
    <!-- jQuery Number -->
    <script src="<?= base_url("adminlte/plugins/jqueryNumber/jquerynumber.min.js") ?>"></script>
    <!-- daterangepicker http://www.daterangepicker.com/-->
    <script src="<?= base_url("adminlte/bower_components/moment/min/moment.min.js") ?>"></script>
    <script src="<?= base_url("adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.js") ?>"></script>
    <!-- Morris.js charts http://morrisjs.github.io/morris.js/-->
    <script src="<?= base_url("adminlte/bower_components/raphael/raphael.min.js") ?>"></script>
    <script src="<?= base_url("adminlte/bower_components/morris.js/morris.min.js") ?>"></script>
    <!-- ChartJS http://www.chartjs.org/-->
    <script src="<?= base_url("adminlte/bower_components/Chart.js/Chart.js") ?>"></script>
    <!-- SlimScroll -->
    <script src="<?= base_url("/adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js") ?>"></script>
    <!-- FastClick -->
    <script src="<?= base_url("/adminlte/bower_components/fastclick/lib/fastclick.js") ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url("/adminlte/dist/js/adminlte.min.js") ?>"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= base_url("/adminlte/dist/js/demo.js") ?>"></script>
    <!-- App script -->
    <script src="<?= base_url("/app/js/app.js") ?>"></script>
    <!-- page script -->
    <?= $this->renderSection('scripts') ?>

</body>

</html>