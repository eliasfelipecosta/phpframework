<?php require_once ABSPATH . 'Views/includes/cabecalho.inc.php'; ?>

<div class="page-header">
  <h4>Cadastro de Locações</h4>
</div>

<a href="<?php echo HOME_URL . 'locacoes/form' ?>" class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Novo</a>
<hr>

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Cliente</th>
            <th>Data de empréstimo</th>
            <th>Data de devolução</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php if ( $locacoes->num_rows > 0 ) : ?>
            <?php while ( $locacao = $locacoes->fetch_object() ) : ?>
                <tr>
                    <td><?php echo $locacao->id ?></td>
                    <td><?php echo $locacao->cliente ?></td>
                    <td><?php echo date('d/m/Y', strtotime($locacao->data_emprestimo)) ?></td>
                    <td><?php echo date('d/m/Y', strtotime($locacao->data_devolucao)) ?></td>
                    <td class="text-right">
                        <a href="<?php echo HOME_URL . "locacoes/form?id={$locacao->id}" ?>" class="btn btn-primary"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                        <a href="<?php echo HOME_URL . "locacoes/excluir?id={$locacao->id}" ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else : ?>
            <tr>
                <td colspan="5">Nenhum registro encontrado!</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<?php require_once ABSPATH . 'Views/includes/rodape.inc.php'; ?>