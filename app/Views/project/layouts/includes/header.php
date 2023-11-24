<header class="main-header">
    <!-- Logo -->
    <a href="<?= base_url("/") ?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">
            <img src="<?= base_url("app/img/template/icono-blanco.png") ?>" alt="logo_mini" class="img-responsive" style="padding: 10px;">
        </span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">
            <img src="<?= base_url("app/img/template/logo-blanco-lineal.png") ?>" alt="logo" class="img-responsive" style="padding:10px 0px">
        </span>

    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <?php
                        if (!empty(session("foto"))) {

                            echo '<img src="uploads/' . session("foto") . '" class="user-image">';
                        } else {
                            echo '<img src="' . base_url("app/img/template/user/anonymous.png") . '" class="user-image">';
                        }
                        ?>
                        <span class="hidden-xs"><?= session("nombre"); ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <!-- <li class="user-header">
                        </li> -->
                        <!-- Menu Body -->
                        <li class="user-body">
                            <div class="pull-right">
                                <button id="btn-logout" class="btn btn-default btn-flat">Salir</button>
                            </div>
                        </li>
                        <!-- Menu Footer-->
                        <!-- <li class="user-footer">
                        </li> -->
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                <!-- <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li> -->
            </ul>
        </div>
    </nav>
</header>