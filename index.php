<?php
session_start();

// Verificar se a sessão NÃO existe:
if(!isset($_SESSION['dados_usuario'])){
    // Devolver para tela de login:
    header('Location: login.php');
}

// Importar a classe Contato:
require_once('classes/Contato.class.php');

// Instancação:
$contato = new Contato;

$tabela = $contato->Listar();

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Cadastro de Contatos</title>
</head>

<body class="bg-dark text-white">
    <div class="container">
        <h1>Cadastro de contatos</h1>
        <p>Olá, <?=$_SESSION['dados_usuario']['nome'];?></p>
        <form class="form-group" action="actions/cadastrar_contato.php" method="POST">
            <label for="nome">Nome completo:</label>
            <input type="text" id="nome" name="nome" class="form-control" required>
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" class="form-control" required>
            <label for="telefone">Telefone:</label>
            <input type="tel" id="telefone" name="telefone" class="form-control">
            <br>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>

        <table class="table text-white">
            <thead class="thead-dark">
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Telefone</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>

                <!-- Listando linhas da tabela -->
                <?php foreach ($tabela as $linha) { ?>
                    <tr>
                        <td><?= $linha['id']; ?></td>
                        <td><?= $linha['nome']; ?></td>
                        <td><?= $linha['email']; ?></td>
                        <td><?= $linha['telefone']; ?></td>
                        <td><a href="editar.php?id=<?= $linha['id'] ?>
                                &nome=<?= $linha['nome'] ?>&email=<?= $linha['email'] ?>
                                &telefone=<?= $linha['telefone'] ?>">Editar</a>
                            | <a href="actions/apagar_contato.php?id=<?= $linha['id'] ?>">Excluir</a></td>
                    </tr>
                <?php } ?>

                <!-- Repita esse formato para cada contato cadastrado -->

            </tbody>
        </table>

    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <?php require_once('includes/notificacoes.incl.php'); ?>
</body>

</html>