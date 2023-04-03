<?php

// Verificar se a pág está sendo carregada por POST:
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // Obter as informações vindas por POST:
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Importar a classe Usuario:
    require_once('../classes/Usuario.class.php');

    // Instanciar o obj:
    $usr = new Usuario();

    // Armazenar os valores dos inputs nos atributos do obj:
    $usr->nome = $nome;
    $usr->email = $email;
    $usr->senha = $senha;

    // Verificar se o email já foi cadastrado:
    try{
        $usr->Cadastrar();
        // Redirecionar à tela de login:
        header('Location: ../login.php?msg=0');
    }catch(PDOException $e){
        header('Location: ../login.php?err=2');
    }
    
}


?>