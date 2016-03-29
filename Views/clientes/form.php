<?php require_once ABSPATH . 'Views/includes/cabecalho.inc.php'; ?>

<div class="page-header">
  <h4>Cadastro de Clientes</h4>
</div>

<form action="<?php echo HOME_URL . 'clientes/salvar' ?>" class="form-horizontal" method="post">
    <input type="hidden" name="id" id="cliente-id" value="<?php echo $cliente->id ?>">
    <div class="form-group">
        <label for="cliente-cpf" class="col-sm-2 control-label">CPF:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="cpf" id="cliente-cpf" maxlength="11" value="<?php echo $cliente->cpf ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="cliente-nome" class="col-sm-2 control-label">Nome:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="nome" id="cliente-nome" value="<?php echo $cliente->nome ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="cliente-cep" class="col-sm-2 control-label">CEP:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="cep" id="cliente-cep" maxlength="9" value="<?php echo $cliente->cep ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="cliente-endereco" class="col-sm-2 control-label">Endereço:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="endereco" id="cliente-endereco" value="<?php echo $cliente->endereco ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="cliente-numero" class="col-sm-2 control-label">Número:</label>
        <div class="col-sm-3">
            <input type="text" class="form-control" name="numero" id="cliente-numero" maxlength="10" value="<?php echo $cliente->numero ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="cliente-bairro" class="col-sm-2 control-label">Bairro:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="bairro" id="cliente-bairro" value="<?php echo $cliente->bairro ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="cliente-cidade" class="col-sm-2 control-label">Cidade:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="cidade" id="cliente-cidade" value="<?php echo $cliente->cidade ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="cliente-uf" class="col-sm-2 control-label">UF:</label>
        <div class="col-sm-3">
            <input type="text" class="form-control" name="uf" id="cliente-uf" maxlength="2" value="<?php echo $cliente->uf ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="cliente-telefone" class="col-sm-2 control-label">Telefone:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="telefone" id="cliente-telefone" value="<?php echo $cliente->telefone ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="cliente-email" class="col-sm-2 control-label">E-mail:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="email" id="cliente-email" value="<?php echo $cliente->email ?>">
        </div>
    </div>
    <div class="form-actions">
        <button class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Salvar</button>
        <a href="<?php echo HOME_URL . 'clientes' ?>" class="btn btn-default"><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span> Voltar</a>
    </div>
</form>

<?php require_once ABSPATH . 'Views/includes/rodape.inc.php'; ?>