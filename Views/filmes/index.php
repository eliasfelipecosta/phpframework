<?php require_once ABSPATH . 'Views/includes/cabecalho.inc.php'; ?>

<div class="page-header">
  <h4>Cadastro de Filmes</h4>
</div>

<a href="<?php echo HOME_URL . 'filmes/form' ?>" class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Novo</a>
<hr>

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Título</th>
            <th>Categoria</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php if ( $filmes ) : ?>
            <?php while ( $filme = $filmes->fetch_object() ) : ?>
                <tr>
                    <td><?php echo $filme->id ?></td>
                    <td><?php echo $filme->titulo ?></td>
                    <td><?php echo $filme->categoria ?></td>
                    <td class="text-right">
                        <a href="<?php echo HOME_URL . "filmes/form?id={$filme->id}" ?>" class="btn btn-primary"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                        <a href="<?php echo HOME_URL . "filmes/excluir?id={$filme->id}" ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else : ?>
            <tr>
                <td colspan="4">Nenhum registro encontrado!</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<?php require_once ABSPATH . 'Views/includes/rodape.inc.php'; ?>