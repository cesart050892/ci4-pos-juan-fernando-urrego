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
                <div class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">
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
<!-- =================================== -->

<div id="modalAgregarUsuario" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <form id="form-new" action="" autocomplete="off">
            <div class="modal-content">
                <div class="modal-header" style="background: #3c8dbc; color:white;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Agregar Usuario</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </span>
                                <input type="text" class="form-control input-lg" name="nombre" placeholder="Ingresar nombre" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-key"></i>
                                </span>
                                <input type="text" class="form-control input-lg" name="usuario" placeholder="Ingresar usuario" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-lock"></i>
                                </span>
                                <input type="password" class="form-control input-lg" name="password" placeholder="Ingresar contraseña" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                                <select class="form-control input-lg" name="perfil">
                                    <option value="">Selecionar perfil</option>
                                    <option value="Administrador">Administrador</option>
                                    <option value="Especial">Especial</option>
                                    <option value="Vendedor">Vendedor</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="panel">SUBIR FOTO</div>
                            <input type="file" class="user-photo" name="foto">
                            <p class="help-block">Peso máximo de la foto 2MB</p>
                            <img src="<?= base_url("app/img/template/user/anonymous.png") ?>" class="img-thumbnail previsualizar" width="100px">
                        </div>
                    </div>
                </div>
                <!-- ./body -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
                <!-- ./footer -->
            </div>
            <!-- ./content -->
        </form>
    </div>
    <!-- ./dialog -->
</div>

<?= $this->endSection() ?>