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
            $perfil = session("perfil");

            $menu = [
                'Administrador' => [
                    [
                        'url' => 'inicio',
                        'icon' => 'fa fa-home',
                        'label' => 'Inicio'
                    ],
                    [
                        'url' => 'usuarios',
                        'icon' => 'fa fa-user',
                        'label' => 'Usuarios'
                    ],
                    [
                        'url' => 'categorias',
                        'icon' => 'fa fa-th',
                        'label' => 'Categorías'
                    ],
                    [
                        'url' => 'productos',
                        'icon' => 'fa fa-product-hunt',
                        'label' => 'Productos'
                    ],
                    [
                        'url' => 'clientes',
                        'icon' => 'fa fa-users',
                        'label' => 'Clientes'
                    ],
                    [
                        'url' => 'ventas',
                        'icon' => 'fa fa-list-ul',
                        'label' => 'Ventas',
                        'children' => [
                            [
                                'url' => 'ventas',
                                'label' => 'Administrar ventas'
                            ],
                            [
                                'url' => 'crear-venta',
                                'label' => 'Crear venta'
                            ],
                            [
                                'url' => 'reportes',
                                'label' => 'Reporte de ventas'
                            ]
                        ]
                    ]
                ],
                'Especial' => [
                    [
                        'url' => 'categorias',
                        'icon' => 'fa fa-th',
                        'label' => 'Categorías'
                    ],
                    [
                        'url' => 'productos',
                        'icon' => 'fa fa-product-hunt',
                        'label' => 'Productos'
                    ],
                    // Otros elementos de menú para el perfil Especial, si los hay
                ],
                'Vendedor' => [
                    [
                        'url' => 'clientes',
                        'icon' => 'fa fa-users',
                        'label' => 'Clientes'
                    ],
                    [
                        'url' => 'ventas',
                        'icon' => 'fa fa-list-ul',
                        'label' => 'Ventas',
                        'children' => [
                            [
                                'url' => 'ventas',
                                'label' => 'Administrar ventas'
                            ],
                            [
                                'url' => 'crear-venta',
                                'label' => 'Crear venta'
                            ]
                        ]
                    ]
                    // Otros elementos de menú para el perfil Vendedor, si los hay
                ],
                // Otros perfiles y sus elementos de menú
            ];


            if (isset($menu[$perfil])) {
                foreach ($menu[$perfil] as $item) {
                    echo '<li>';
                    if (isset($item['children'])) {
                        echo '<li class="treeview">
                    <a href="#">
                        <i class="' . $item['icon'] . '"></i>        
                        <span>' . $item['label'] . '</span>        
                        <span class="pull-right-container">        
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">';
                        foreach ($item['children'] as $child) {
                            echo '<li>
                        <a href="' . $child['url'] . '">
                            <i class="fa fa-circle-o"></i>
                            <span>' . $child['label'] . '</span>
                        </a>
                    </li>';
                        }
                        echo '</ul>
                </li>';
                    } else {
                        echo '<a href="' . $item['url'] . '">
                    <i class="' . $item['icon'] . '"></i>
                    <span>' . $item['label'] . '</span>
                </a>';
                    }
                    echo '</li>';
                }
            }
            ?>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>