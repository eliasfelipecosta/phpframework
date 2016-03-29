<?php require_once ABSPATH . 'Views/includes/cabecalho.inc.php'; ?>

<?php if ( isset( $mensagem ) ) : ?>
    <div class="alert alert-danger"><?php echo $mensagem ?></div>
<?php endif; ?>

<form action="<?php echo HOME_URL . 'login' ?>" method="post">
    <div class="panel panel-default panel-login">
        <div class="panel-heading">
            <h3 style="margin: 3px;">Autenticação</h3>
        </div>
        <div class="panel-body">
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="text" class="form-control" name="email" id="email">
            </div>
            <div class="form-group">
                <label for="senha">Senha:</label>
                <input type="password" class="form-control" name="senha" id="senha">
            </div>
        </div>
        <div class="panel-footer text-center">
            <button class="btn btn-primary">
                <em class="glyphicon glyphicon-ok"></em> Login
            </button>
        </div>
    </div>
</form>

<?php require_once ABSPATH . 'Views/includes/rodape.inc.php'; ?>