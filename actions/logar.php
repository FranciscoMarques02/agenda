<?php

// Verificar se a pag está sendo carregada por POST:
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // Receber valores dos inputs do form:
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Importar a classe:
    require_once('../classes/Usuario.class.php');

    // Instanciar o obj:
    $usr = new Usuario();
    $usr->email = $email;
    $usr->senha = $senha;

    // Salvar o resultado do SELECT em um array:
    $resultado = $usr->Logar();

    // Verificar a qtd de linhas do array:
    if(count($resultado) == 1){
        // Criar a sessão do usuário:
        session_start();
        // Guardar as infos do usuário na sessão:
        $_SESSION['dados_usuario'] = $resultado[0];
        // Redirecionar:
        header('Location: ../index.php');
    }else{
        echo 'Usuário ou senha inválidos';
    }
}

?>