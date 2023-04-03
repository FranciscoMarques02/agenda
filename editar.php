<?php

// Verificar se o usuário está logado:
session_start();
if(!isset($_SESSION['dados_usuario'])){
    header('Location: login.php');
    exit;
}

// Verificar se existe o id na URL:
if (isset($_GET['id'])) {

    // Importar a classe Contato:
    require_once('classes/Contato.class.php');

    // Instanciar um obj da classe contato:
    $contato = new Contato();

    $contato->id = $_GET['id'];
    $resultado = $contato->BuscarPorID();
    
}else{
    $resultado = [];
}

?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulário de Edição</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body class="bg-dark text-white">
    <div class="container">
        <!-- Só mostra o form de edição caso o id selecionado exista -->
        <?php if (count($resultado) == 1) { ?>

            <h1>Formulário de Edição</h1>
            <form action="actions/editar_contato.php" method="POST">
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" class="form-control" id="nome" name="nome" value="<?= $resultado[0]['nome'] ?>">
                </div>
                <div class="form-group">
                    <label for="email">E-mail:</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?= $resultado[0]['email'] ?>">
                </div>
                <div class="form-group">
                    <label for="telefone">Telefone:</label>
                    <input type="tel" class="form-control" id="telefone" name="telefone" value="<?= $resultado[0]['telefone'] ?>">
                </div>
                <!-- Input invisível com o id do usuário editado -->
                <input type="hidden" value="<?= $resultado[0]['id'] ?>" name="id">
                <button type="submit" class="btn btn-primary">Editar</button>
            </form>

        <?php } else { ?>

            <h1>Usuário não encontrado.</h1>
            <a href="index.php" class="btn btn-primary">Voltar</a>

        <?php } ?>

    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>