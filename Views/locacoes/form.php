<?php require_once ABSPATH . 'Views/includes/cabecalho.inc.php'; ?>

<div class="page-header">
  <h4>Cadastro de Locações</h4>
</div>

<form action="<?php echo HOME_URL . 'locacoes/salvar' ?>" class="form-horizontal" method="post">
    <input type="hidden" name="id" id="locacao-id" value="<?php echo $locacao->id ?>">
   <div class="form-group">
        <label for="locacao-cliente" class="col-sm-2 control-label">Cliente:</label>
        <div class="col-sm-10">
            <select class="form-control" name="cliente_id" id="locacao-cliente">
                <option></option>
                <?php while ( $cliente = $clientes->fetch_object() ) : ?>
                    <option value="<?php echo $cliente->id ?>"<?php echo $locacao->cliente_id == $cliente->id ? ' selected="selected"' : '' ?>><?php echo $cliente->nome ?></option>
                <?php endwhile; ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="locacao-data-emprestimo" class="col-sm-2 control-label">Data empréstimo:</label>
        <div class="col-sm-4">
            <div class="input-group">
                <span class="input-group-addon"><em class="glyphicon glyphicon-calendar"></em></span>
                <input type="text" name="data_emprestimo" id="locacao-data-emprestimo" class="form-control" value="<?php echo $locacao->data_emprestimo ? date('d/m/Y', strtotime($locacao->data_emprestimo)) : '' ?>">
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="locacao-data-devolucao" class="col-sm-2 control-label">Data devolução:</label>
        <div class="col-sm-4">
            <div class="input-group">
                <span class="input-group-addon"><em class="glyphicon glyphicon-calendar"></em></span>
                <input type="text" name="data_devolucao" id="locacao-data-devolucao" class="form-control" value="<?php echo $locacao->data_devolucao ? date('d/m/Y', strtotime($locacao->data_devolucao)) : '' ?>">
            </div>
        </div>
    </div>
    <?php if ($locacao->id) : ?>
        <hr>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#filmes-modal"><span class="glyphicon glyphicon-plus"></span> Novo</button>
        <hr>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Filme</th>
                    <th>Valor</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php if ( $filmes_alugados->num_rows > 0 ) : ?>
                    <?php while ( $filme_alugado = $filmes_alugados->fetch_object() ) : ?>
                        <tr>
                            <td><?php echo $filme_alugado->id ?></td>
                            <td><?php echo $filme_alugado->filme ?></td>
                            <td><?php echo 'R$ ' . number_format( $filme_alugado->valor, 2, ',', '.' ) ?></td>
                            <td class="text-right">
                                <a href="<?php echo HOME_URL . "locacoes/excluir_filme?id={$filme_alugado->id}&locacao_id={$locacao->id}" ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="4">Nenhum filme adicionado!</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    <?php endif; ?>
    <div class="form-actions">
        <button class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Salvar</button>
        <a href="<?php echo HOME_URL . 'locacoes' ?>" class="btn btn-default"><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span> Voltar</a>
    </div>
</form>

<!-- Modal -->
<form action="<?php echo HOME_URL . 'locacoes/adicionar_filme' ?>" method="post">
    <input type="hidden" name="locacao_id" value="<?php echo $locacao->id ?>">
    <div class="modal fade" id="filmes-modal" tabindex="-1" role="dialog" aria-labelledby="filmes-modal-label">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="filmes-modal-label">Filmes</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="filme-titulo">Filme:</label>
                        <select class="form-control" name="filme_id" id="filme-titulo">
                            <option></option>
                            <?php while ( $filme = $filmes->fetch_object() ) : ?>
                                <option value="<?php echo $filme->id ?>"><?php echo $filme->titulo ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="filme-valor">Valor:</label>
                        <input type="text" name="valor" id="filme-valor" class="form-control" value="<?php $locacao->valor?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Adicionar</button>
                </div>
            </div>
        </div>
    </div>
</form>

<?php require_once ABSPATH . 'Views/includes/rodape.inc.php'; ?>