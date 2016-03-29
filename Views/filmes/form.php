<?php require_once ABSPATH . 'Views/includes/cabecalho.inc.php'; ?>

<div class="page-header">
  <h4>Cadastro de Filmes</h4>
</div>

<form action="<?php echo HOME_URL . 'filmes/salvar' ?>" class="form-horizontal" method="post">
    <input type="hidden" name="id" id="filme-id" value="<?php echo $filme->id ?>">
    <div class="form-group">
        <label for="filme-categoria-id" class="col-sm-2 control-label">Categoria:</label>
        <div class="col-sm-10">
            <select class="form-control" name="categoria_id" id="filme-categoria-id">
                <option value=""></option>
                <?php while ( $categoria = $categorias->fetch_object() ) : ?>
                    <option value="<?php echo $categoria->id ?>"<?php echo $categoria->id == $filme->categoria_id ? ' selected="selected"' : '' ?>><?php echo $categoria->descricao ?></option>
                <?php endwhile; ?>
            </select>
        </div>
    </div> 
   <div class="form-group">
        <label for="filme-titulo" class="col-sm-2 control-label">Título:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="titulo" id="filme-titulo" value="<?php echo $filme->titulo ?>">
        </div>
    </div>
    <div class="form-actions">
        <button class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Salvar</button>
        <a href="<?php echo HOME_URL . 'filmes' ?>" class="btn btn-default"><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span> Voltar</a>
    </div>
</form>

<?php require_once ABSPATH . 'Views/includes/rodape.inc.php'; ?>