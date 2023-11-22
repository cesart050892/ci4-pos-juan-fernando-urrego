<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="/adminlte/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <?php
            if (session("perfil") == "Administrador") {
                echo '<li class="active">
                <a href="' . base_url("dashboard") . '">
                    <i class="fa fa-home"></i>
                    <span>Inicio</span>
                </a>
            </li>
            <li>
                <a href="' . base_url("users") . '">
                    <i class="fa fa-user"></i>
                    <span>Usuarios</span>
                </a>
            </li>';
            }

            if (session("perfil") == "Administrador" || session("perfil") == "Especial") {
                echo '<li>
                <a href="' . base_url("categories") . '">
                    <i class="fa fa-th"></i>
                    <span>Categorías</span>
                </a>
            </li>
            <li>
                <a href="' . base_url("products") . '">
                    <i class="fa fa-product-hunt"></i>
                    <span>Productos</span>
                </a>
            </li>';
            }

            if (session("perfil") == "Administrador" || session("perfil") == "Vendedor") {
                echo '<li>
                <a href="' . base_url("clients") . '">
                    <i class="fa fa-users"></i>
                    <span>Clientes</span>
                </a>
            </li>';
            }

            if (session("perfil") == "Administrador" || session("perfil") == "Vendedor") {
                echo '<li class="treeview">
            <a href="#">
                <i class="fa fa-list-ul"></i>        
                <span>Ventas</span>        
                <span class="pull-right-container">        
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">            
            <li>
                <a href="' . base_url("sales") . '">                 
                    <i class="fa fa-circle-o"></i>
                    <span>Administrar ventas</span>
                </a>
            </li>
            <li>
                <a href="' . base_url("create-sale") . '">                
                    <i class="fa fa-circle-o"></i>
                    <span>Crear venta</span>
                </a>
            </li>';
                if (session("perfil") == "Administrador") {
                    echo '<li>
                    <a href="' . base_url("reports-sales") . '">                
                        <i class="fa fa-circle-o"></i>
                        <span>Reporte de ventas</span>
                    </a>
                </li>';
                }
                echo '</ul>
        </li>';
            }
            ?>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>