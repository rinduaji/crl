<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/Logo-Infomedia-Nusantara.png">
    <title>TAMARA T2</title>

    <!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->



    <link href="../assets/libs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/twitter_bootstrap/bootstrap.css" rel="stylesheet">
    <link href="../assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../assets/extra-libs/c3/c3.min.css" rel="stylesheet">

    <link href="../assets/libs/morris.js/morris.css" rel="stylesheet">
    <link href="../assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="../assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="../dist/css/style.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css" />
    <style>
        tfoot input {
            width: 100%;
            padding: 3px;
            box-sizing: border-box;
        }

        .table {
            color:black;
        }

        .card {
            background-color: white;border-radius:10px;color: black;
        }
        
        .judul {
            color:black;font-weight:750;opacity: 1;
        }
        
        .dataTables_length select {
            background-color: #6c75e9;color: #ffffff;
        }

        .dataTables_filter input {
            background-color: #6c75e9;color: #ffffff;
        }
            
        
    </style>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    <script src="../../admin/dist/js/sweetalert.min.js"></script>
    <!--DateRangePicker -->
    <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

    <script type="text/javascript">
        function zoom() {
            document.body.style.zoom = "85%"
        }
    </script>
    <style>
        .thead-purple {
            background-color: #6c75e9;
            color: #ffffff;
        }
    </style>
</head>

<body onload="zoom()">
    <?php
    ini_get('session.gc_maxlifetime', 57600);
    ini_get('session.cookie_lifetime', 57600);
    ini_get('session.cache_expire', 57600);
    session_start();

    include("../../assets/conn.php");
    $no = 1;

    if ($_SESSION["username"] == NULL) {
        echo "<script>window.location.href = 'http://10.194.176.158/tier2/index.php'</script>";
    }

    if ($_GET['status'] == "succes") {
        echo "<script>swal('Data Telah Berhasil di simpan!', '', 'success').then(function() {
            history.go(-2);
        });</script>";
    } else if ($_GET['status'] == "gagal") {
        echo "<script>swal('Data Gagal di simpan!', '', 'error');</script>";
    } else if ($_GET['status'] == "pass_not_same") {
        echo "<script>swal('Password lama tidak sama!', '', 'warning');</script>";
    }
    ?>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md">
                <div class="navbar-header" data-logobg="skin6">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-brand">
                        <!-- Logo icon -->
                        <a href="index.html">
                            <img src="../assets/images/logo.png" alt="homepage" class="dark-logo" width="200px" height="150px" />

                            <!--End Logo icon -->
                        </a>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto ml-3 pl-1">

                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="../assets/images/Logo-Infomedia-Nusantara.png" height="40px" alt="user" class="rounded-circle" width="40">
                                <span class="ml-2 d-none d-lg-inline-block"><span class="text-dark">Hello,</span> <span class="text-dark"><?= ucfirst(strtolower($_SESSION['name'])); ?></span> <i data-feather="chevron-down" class="svg-icon"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <h4 style="color:red;padding:20px 25px 10px 25px"><strong>Detail</strong></h4>
                                <hr>
                                <a class="dropdown-item" href="profile.php"><i data-feather="user" class="svg-icon mr-2 ml-1"></i>
                                    My Profile</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php"><i data-feather="power" class="svg-icon mr-2 ml-1"></i>
                                    Logout</a>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar" data-sidebarbg="skin6">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item" > <a class="sidebar-link sidebar-link judul" href="index.php" aria-expanded="false"><i data-feather="home" class="feather-icon judul"></i><span class="hide-menu">Dashboard</span></a></li>
                        <?php
                        if ($_SESSION["jabatan"] == "Supervisor TAM DCS" or $_SESSION["jabatan"] == "Duktek") {
                        ?>
                            <li class="list-divider"></li>
                            <li class="nav-small-cap"><span class="hide-menu">Menu Supervisor</span></li>
                            <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false"><i data-feather="external-link" class="feather-icon"></i><span class="hide-menu">Form Supervisor </span></a>
                                <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                    <li class="sidebar-item"><a href="form_survey.php" class="sidebar-link judul"><span class="hide-menu">Survey PS dan Cabut
                                            </span></a>
                                    </li>
                                    <li class="sidebar-item"><a href="form_survey_tam.php" class="sidebar-link judul"><span class="hide-menu">Tapping Survey
                                            </span></a>
                                    </li>
                                    <li class="sidebar-item"><a href="form_caring_smooa.php" class="sidebar-link judul"><span class="hide-menu">Caring SMOOA
                                            </span></a>
                                    </li>
                                    <li class="sidebar-item"><a href="form_caring_paperless.php" class="sidebar-link judul"><span class="hide-menu">Caring Paperless
                                            </span></a>
                                    </li>
                                    
									
                                    <li class="sidebar-item"><a href="report_total.php" class="sidebar-link judul"><span class="hide-menu">Report Total Tapping
                                            </span></a>
                                    </li>
                                </ul>
                            </li>
                        <?php
                        }
                        if ($_SESSION["jabatan"] == "Agent T2" or $_SESSION["jabatan"] == "Duktek" or $_SESSION["jabatan"] == "Supervisor TAM DCS") {
                        ?>
                            <li class="list-divider"></li>
                            <li class="nav-small-cap"><span class="hide-menu">Menu Agent</span></li>
                            <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false"><i data-feather="credit-card" class="feather-icon"></i><span class="hide-menu">Form WO</span></a>
                                <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                    <li class="sidebar-item"><a href="form_wo.php" class="sidebar-link judul"><span class="hide-menu">Survey PS dan CABUT
                                            </span></a>
                                    </li>
                                    <li class="sidebar-item"><a href="form_wo_tappingsurvey.php" class="sidebar-link judul"><span class="hide-menu">Tapping Survey
                                            </span></a>
                                    </li>

                                    <li class="sidebar-item"><a href="form_wo_tappingtam_agree.php" class="sidebar-link judul"><span class="hide-menu">Tapping Approve
                                            </span></a>
                                    </li>
                                    <li class="sidebar-item"><a href="form_wo_tappingtam_decline.php" class="sidebar-link judul"><span class="hide-menu">Tapping Decline
                                            </span></a>
                                    </li>
                                    <li class="sidebar-item"><a href="form_wo_caring_smooa.php" class="sidebar-link judul"><span class="hide-menu">Caring SMOOA
                                            </span></a>
                                    </li>
                                    <li class="sidebar-item"><a href="form_wo_caring_paperless.php" class="sidebar-link judul"><span class="hide-menu">Caring Paperless
                                            </span></a>
                                    </li>
									<li class="sidebar-item"><a href="wo_caringcancel.php" class="sidebar-link judul"><span class="hide-menu">Caring Cancel
                                            </span></a>
                                    </li>
                                </ul>
                            </li>
                        <?php
                        }
                        if ($_SESSION["jabatan"] == "Supervisor TAM DCS" or $_SESSION["jabatan"] == "Duktek" or $_SESSION["jabatan"] == "Agent T2") {
                        ?>
                            <li class="list-divider"></li>
                            <li class="nav-small-cap"><span class="hide-menu">Report Agent</span></li>
                            <li class="sidebar-item"> <a class="sidebar-link judul has-arrow" href="javascript:void(0)" aria-expanded="false"><i data-feather="clipboard" class="feather-icon judul"></i><span class="hide-menu">Report</span></a>
                                <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                    <li class="sidebar-item"><a href="report_survey_cabut.php" class="sidebar-link judul"><span class="hide-menu">Survey Cabut 
                                            </span></a>
                                    </li>
                                    <li class="sidebar-item"><a href="report_survey_ps.php" class="sidebar-link judul"><span class="hide-menu">Survey PS 
                                            </span></a>
                                    </li>
                                    <li class="sidebar-item"><a href="report_tappingsurvey.php" class="sidebar-link judul"><span class="hide-menu">Tapping Survey 
                                            </span></a>
                                    </li>
                                    <li class="sidebar-item"><a href="report_agree.php" class="sidebar-link judul"><span class="hide-menu">Approve 
                                            </span></a>
                                    </li>
                                    <li class="sidebar-item"><a href="report_decline.php" class="sidebar-link judul"><span class="hide-menu">Decline 
                                            </span></a>
                                    </li>
                                    <li class="sidebar-item"><a href="report_caring_smooa.php" class="sidebar-link judul"><span class="hide-menu">Caring SMOOA 
                                            </span></a>
                                    </li>
                                    <li class="sidebar-item"><a href="report_caring_paperless.php" class="sidebar-link judul"><span class="hide-menu">Caring Paperless 
                                            </span></a>
                                    </li>
									<li class="sidebar-item"><a href="report_caringcancel.php" class="sidebar-link judul"><span class="hide-menu">Caring Cancel 
                                            </span></a>
                                    </li>
                                </ul>
                            </li>
                        <?php
                        }
                        if ($_SESSION["jabatan"] == "Duktek") {
                        ?>
                            <li class="list-divider"></li>
                            <li class="nav-small-cap"><span class="hide-menu">Menu IT</span></li>

                            <li class="sidebar-item"> <a class="sidebar-link sidebar-link judul" href="add_user.php" aria-expanded="false"><i data-feather="user" class="feather-icon judul"></i><span class="hide-menu">Form User</span></a>
                                <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                    <li class="sidebar-item"><a href="add_user.php" class="sidebar-link judul"><span class="hide-menu">New User
                                            </span></a>
                                    </li>
                                </ul>
                            </li>
                        <?php
                        }
                        ?>
                        <!-- 
                        <li class="list-divider"></li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false"><i data-feather="file-text" class="feather-icon"></i><span class="hide-menu">Forms </span></a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item"><a href="form_survey.php" class="sidebar-link"><span class="hide-menu"> Form Survey
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="form_wo.php" class="sidebar-link"><span class="hide-menu"> Form WO
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="form-inputs.html" class="sidebar-link"><span class="hide-menu"> Form Inputs
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="form-checkbox-radio.html" class="sidebar-link"><span class="hide-menu"> Checkboxes &
                                            Radios
                                        </span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-small-cap"><span class="hide-menu">Components</span></li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false"><i data-feather="file-text" class="feather-icon"></i><span class="hide-menu">Forms </span></a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item"><a href="form-inputs.html" class="sidebar-link"><span class="hide-menu"> Form Inputs
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="form-input-grid.html" class="sidebar-link"><span class="hide-menu"> Form Grids
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="form-checkbox-radio.html" class="sidebar-link"><span class="hide-menu"> Checkboxes &
                                            Radios
                                        </span></a>
                                </li>

                                <li class="sidebar-item"> <a class="sidebar-link" href="ticket-list.html" aria-expanded="false"><i data-feather="tag" class="feather-icon"></i><span class="hide-menu">Ticket List
                                        </span></a>
                                </li>
                                <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="app-calendar.html" aria-expanded="false"><i data-feather="calendar" class="feather-icon"></i><span class="hide-menu">Calendar</span></a></li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false"><i data-feather="grid" class="feather-icon"></i><span class="hide-menu">Tables </span></a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item"><a href="table-basic.html" class="sidebar-link"><span class="hide-menu"> Basic Table
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="table-dark-basic.html" class="sidebar-link"><span class="hide-menu"> Dark Basic Table
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="table-sizing.html" class="sidebar-link"><span class="hide-menu">
                                            Sizing Table
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="table-layout-coloured.html" class="sidebar-link"><span class="hide-menu">
                                            Coloured
                                            Table Layout
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="table-datatable-basic.html" class="sidebar-link"><span class="hide-menu">
                                            Basic
                                            Datatables
                                            Layout
                                        </span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false"><i data-feather="bar-chart" class="feather-icon"></i><span class="hide-menu">Charts </span></a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item"><a href="chart-morris.html" class="sidebar-link"><span class="hide-menu"> Morris Chart
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="chart-chart-js.html" class="sidebar-link"><span class="hide-menu"> ChartJs
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="chart-knob.html" class="sidebar-link"><span class="hide-menu">
                                            Knob Chart
                                        </span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false"><i data-feather="box" class="feather-icon"></i><span class="hide-menu">UI Elements </span></a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item"><a href="ui-buttons.html" class="sidebar-link"><span class="hide-menu"> Buttons
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="ui-modals.html" class="sidebar-link"><span class="hide-menu"> Modals </span></a>
                                </li>
                                <li class="sidebar-item"><a href="ui-tab.html" class="sidebar-link"><span class="hide-menu"> Tabs </span></a></li>
                                <li class="sidebar-item"><a href="ui-tooltip-popover.html" class="sidebar-link"><span class="hide-menu"> Tooltip &
                                            Popover</span></a></li>
                                <li class="sidebar-item"><a href="ui-notification.html" class="sidebar-link"><span class="hide-menu">Notification</span></a></li>
                                <li class="sidebar-item"><a href="ui-progressbar.html" class="sidebar-link"><span class="hide-menu">Progressbar</span></a></li>
                                <li class="sidebar-item"><a href="ui-typography.html" class="sidebar-link"><span class="hide-menu">Typography</span></a></li>
                                <li class="sidebar-item"><a href="ui-bootstrap.html" class="sidebar-link"><span class="hide-menu">Bootstrap
                                            UI</span></a></li>
                                <li class="sidebar-item"><a href="ui-breadcrumb.html" class="sidebar-link"><span class="hide-menu">Breadcrumb</span></a></li>
                                <li class="sidebar-item"><a href="ui-list-media.html" class="sidebar-link"><span class="hide-menu">List
                                            Media</span></a></li>
                                <li class="sidebar-item"><a href="ui-grid.html" class="sidebar-link"><span class="hide-menu"> Grid </span></a></li>
                                <li class="sidebar-item"><a href="ui-carousel.html" class="sidebar-link"><span class="hide-menu">
                                            Carousel</span></a></li>
                                <li class="sidebar-item"><a href="ui-scrollspy.html" class="sidebar-link"><span class="hide-menu">
                                            Scrollspy</span></a></li>
                                <li class="sidebar-item"><a href="ui-toasts.html" class="sidebar-link"><span class="hide-menu"> Toasts</span></a>
                                </li>
                                <li class="sidebar-item"><a href="ui-spinner.html" class="sidebar-link"><span class="hide-menu"> Spinner </span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="ui-cards.html" aria-expanded="false"><i data-feather="sidebar" class="feather-icon"></i><span class="hide-menu">Cards
                                </span></a>
                        </li>
                        <li class="list-divider"></li>
                        <li class="nav-small-cap"><span class="hide-menu">Authentication</span></li>

                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="authentication-login1.html" aria-expanded="false"><i data-feather="lock" class="feather-icon"></i><span class="hide-menu">Login
                                </span></a>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="authentication-register1.html" aria-expanded="false"><i data-feather="lock" class="feather-icon"></i><span class="hide-menu">Register
                                </span></a>
                        </li>

                        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false"><i data-feather="feather" class="feather-icon"></i><span class="hide-menu">Icons
                                </span></a>
                            <ul aria-expanded="false" class="collapse first-level base-level-line">
                                <li class="sidebar-item"><a href="icon-fontawesome.html" class="sidebar-link"><span class="hide-menu"> Fontawesome Icons </span></a></li>

                                <li class="sidebar-item"><a href="icon-simple-lineicon.html" class="sidebar-link"><span class="hide-menu"> Simple Line Icons </span></a></li>
                            </ul>
                        </li>

                        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false"><i data-feather="crosshair" class="feather-icon"></i><span class="hide-menu">Multi
                                    level
                                    dd</span></a>
                            <ul aria-expanded="false" class="collapse first-level base-level-line">
                                <li class="sidebar-item"><a href="javascript:void(0)" class="sidebar-link"><span class="hide-menu"> item 1.1</span></a>
                                </li>
                                <li class="sidebar-item"><a href="javascript:void(0)" class="sidebar-link"><span class="hide-menu"> item 1.2</span></a>
                                </li>
                                <li class="sidebar-item"> <a class="has-arrow sidebar-link" href="javascript:void(0)" aria-expanded="false"><span class="hide-menu">Menu 1.3</span></a>
                                    <ul aria-expanded="false" class="collapse second-level base-level-line">
                                        <li class="sidebar-item"><a href="javascript:void(0)" class="sidebar-link"><span class="hide-menu"> item
                                                    1.3.1</span></a></li>
                                        <li class="sidebar-item"><a href="javascript:void(0)" class="sidebar-link"><span class="hide-menu"> item
                                                    1.3.2</span></a></li>
                                        <li class="sidebar-item"><a href="javascript:void(0)" class="sidebar-link"><span class="hide-menu"> item
                                                    1.3.3</span></a></li>
                                        <li class="sidebar-item"><a href="javascript:void(0)" class="sidebar-link"><span class="hide-menu"> item
                                                    1.3.4</span></a></li>
                                    </ul>
                                </li>
                                <li class="sidebar-item"><a href="javascript:void(0)" class="sidebar-link"><span class="hide-menu"> item
                                            1.4</span></a></li>
                            </ul>
                        </li>
                        <li class="list-divider"></li>
                        <li class="nav-small-cap"><span class="hide-menu">Extra</span></li>
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="../../docs/docs.html" aria-expanded="false"><i data-feather="edit-3" class="feather-icon"></i><span class="hide-menu">Documentation</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="authentication-login1.html" aria-expanded="false"><i data-feather="log-out" class="feather-icon"></i><span class="hide-menu">Logout</span></a></li> -->
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>