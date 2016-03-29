<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sistema de Cadastro de Filmes</title>

        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo HOME_URL; ?>Views/layout/css/estilos.css">
    </head>
    <body>
        <div class="container">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="<?php echo HOME_URL; ?>">Locadora</a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li><a href="<?php echo HOME_URL; ?>clientes">Clientes</a></li>
                            <li><a href="<?php echo HOME_URL; ?>filmes">Filmes</a></li>
                            <li><a href="<?php echo HOME_URL; ?>categorias">Categorias</a></li>
                            <li><a href="<?php echo HOME_URL; ?>locacoes">Locações</a></li>
                        </ul>
                    </div>
                </div>
            </nav>