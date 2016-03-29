<?php require_once ABSPATH . 'Views/includes/cabecalho.inc.php'; ?>

<div class="page-header">
  <h4>Cadastro de Clientes</h4>
</div>

<a href="<?php echo HOME_URL . 'clientes/form' ?>" class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Novo</a>
<hr>

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>E-mail</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php if ( $clientes ) : ?>
            <?php while ( $cliente = $clientes->fetch_object() ) : ?>
                <tr>
                    <td><?php echo $cliente->id ?></td>
                    <td><?php echo $cliente->nome ?></td>
                    <td><?php echo $cliente->cpf ?></td>
                    <td><?php echo $cliente->email ?></td>
                    <td class="text-right">
                        <a href="<?php echo HOME_URL . "clientes/form?id={$cliente->id}" ?>" class="btn btn-primary"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                        <a href="<?php echo HOME_URL . "clientes/excluir?id={$cliente->id}" ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
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