<?php
session_start();
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['dados_usuario'])){
    // Receber informações do formulário:
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $tel = $_POST['telefone'];
    
    // Importar a classe Contato:
    require_once('../classes/Contato.class.php');
    
    // Instanciar um obj da classe contato:
    $contato = new Contato();
    
    // Armazenar os valores vindos por POST nos atributos do obj:
    $contato->id = $id;
    $contato->nome = $nome;
    $contato->email = $email;
    $contato->telefone = $tel;
    
    // Obter atd de linhas alteradas pelo UPDATE:
    $qtd_linhas = $contato->Editar();

    // Exibir msg de sucesso caso = 1 e de erro caso != 1:
    if($qtd_linhas == 1){
        header('Location: ../index.php?msg=2');
    }else{
        header('Location: ../index.php?err=4');
    }
    

    
}else{
    echo "<p>A página não foi carregada por POST, ou você não está logado!</p>";
}

?>