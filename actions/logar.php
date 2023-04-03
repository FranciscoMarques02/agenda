<?php
// Receber valores dos inputs do form:
$email = $_POST['email'];
$senha = $_POST['senha'];

// Verificar se o email e senha esrtão corretos:
if($email == "r@gmail.com" && $senha == "123"){
    // Iniciar a utilização de sessão:
    session_start();
    // Criar a sessão:
    $_SESSION['logado'] = $email;
    // echo "Show! Você está logado.";
    // Redirecionar para o index:
    header('Location: ../index.php');
}else{
    echo "Email ou senha incorretos!";
}

?>