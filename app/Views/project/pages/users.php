<?= $this->extend('project/layouts/app') ?>

<?= $this->section('content') ?>
<!-- Contenido de la página de inicio -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Administrar Usuarios
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url("/") ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Usuarios</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <div class="btn btn-primary" data-toggle="modal" data-target="modalUsuario">
                    Agregar Usuario
                </div>
            </div>
            <div class="box-body">
                <table id="usuarios" class="table table-bordered table-striped" style="width: 100%">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Usuario</th>
                            <th>Foto</th>
                            <th>Perfil</th>
                            <th>Estado</th>
                            <th>Último login</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Cesar Augusto</td>
                            <td>Administrador</td>
                            <td>
                                <img src="<?= base_url("app/img/template/user/anonymous.png") ?>" alt="" class="img-thumbnail" width="40px">
                            </td>
                            <td>Administrador</td>
                            <td>
                                <button class="btn btn-success btn-xs">Activado</button>
                            </td>
                            <td>2023-11-22 13:34:05</td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-warning">
                                        <i class="fa fa-pencil"></i>
                                    </button>
                                    <button class="btn btn-danger">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Cesar Augusto</td>
                            <td>Administrador</td>
                            <td>
                                <img src="<?= base_url("app/img/template/user/anonymous.png") ?>" alt="" class="img-thumbnail" width="40px">
                            </td>
                            <td>Administrador</td>
                            <td>
                                <button class="btn btn-success btn-xs">Activado</button>
                            </td>
                            <td>2023-11-22 13:34:05</td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-warning">
                                        <i class="fa fa-pencil"></i>
                                    </button>
                                    <button class="btn btn-danger">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<?= $this->endSection() ?>