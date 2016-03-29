<?php require_once ABSPATH . 'Views/includes/cabecalho.inc.php'; ?>

<div class="page-header">
  <h4>Cadastro de Categorias</h4>
</div>

<form action="<?php echo HOME_URL . 'categorias/salvar' ?>" class="form-horizontal" method="post">
    <input type="hidden" name="id" id="categoria-id" value="<?php echo $categoria->id ?>">
    <div class="form-group">
        <label for="categoria-descricao" class="col-sm-2 control-label">Descrição:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="descricao" id="categoria-descricao" value="<?php echo $categoria->descricao ?>">
        </div>
    </div>
    <div class="form-actions">
        <button class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Salvar</button>
        <a href="<?php echo HOME_URL . 'categorias' ?>" class="btn btn-default"><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span> Voltar</a>
    </div>
</form>

<?php require_once ABSPATH . 'Views/includes/rodape.inc.php'; ?>