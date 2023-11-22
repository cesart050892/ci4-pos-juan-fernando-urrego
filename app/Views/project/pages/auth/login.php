<?= $this->extend('project/layouts/auth') ?>

<?= $this->section('content') ?>
<!-- Contenido de la página de inicio -->
<div id="back"></div>
<div class="login-box">
    <div class="login-logo">
        <img src="<?= base_url("app/img/template/logo-blanco-bloque.png") ?>" class="img-responsive" style="padding:30px 100px 0px 100px">
    </div>
    <div class="login-box-body">
        <p class="login-box-msg">Ingresar al sistema</p>
        <form id="login-form">
            <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="Usuario" name="user" required>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Contraseña" name="pass" required>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>


<?= $this->section('scripts') ?>
<script>
    $(document).ready(function() {
        $('#login-form').submit(function(event) {
            event.preventDefault();

            var formData = $(this).serialize();

            $.ajax({
                type: 'POST',
                url: 'api/auth/login',
                data: formData,
                success: function(response) {
                    // Hacer algo con la respuesta si es necesario
                    location.reload()
                },
                error: function(error) {
                    console.error('Error:', error);
                    // Manejar errores si es necesario
                }
            });
        });
    });
</script>
<?= $this->endSection() ?>