<?php require_once ABSPATH . 'Views/includes/cabecalho.inc.php'; ?>

<div class="page-header">
  <h4>Cadastro de Categorias</h4>
</div>

<a href="<?php echo HOME_URL . 'categorias/form' ?>" class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Novo</a>
<hr>

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Descrição</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php if ( $categorias ) : ?>
            <?php while ( $categoria = $categorias->fetch_object() ) : ?>
                <tr>
                    <td><?php echo $categoria->id ?></td>
                    <td><?php echo $categoria->descricao ?></td>
                    <td class="text-right">
                        <a href="<?php echo HOME_URL . "categorias/form?id={$categoria->id}" ?>" class="btn btn-primary"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                        <a href="<?php echo HOME_URL . "categorias/excluir?id={$categoria->id}" ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else : ?>
            <tr>
                <td colspan="3">Nenhum registro encontrado!</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<?php require_once ABSPATH . 'Views/includes/rodape.inc.php'; ?>