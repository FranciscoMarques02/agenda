<?php
session_start();
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['dados_usuario'])){
    // Verificar se nome e email estão preenchidos:
    if($_POST['nome'] != "" && $_POST['email'] != ""){
        // Receber informações do formulário:
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $tel = $_POST['telefone'];

        // Importar a classe Contato:
        require_once('../classes/Contato.class.php');

        // Instanciar um obj da classe contato:
        $contato = new Contato();

        // Armazenar os valores vindos por POST nos atributos do obj:
        $contato->nome = $nome;
        $contato->email = $email;
        $contato->telefone = $tel;

        // Verificar se o email já foi cadastrado:
        try{
            // "Empurrar" as informações ao banco de dados:
            $contato->Cadastrar();
            // Redirecionar de volta  à listagem (index.php):
            header('Location: ../index.php?msg=1');
        }catch(PDOException $e){
            // Direcionar ao index com msg de erro:
            header('Location: ../index.php?err=2');
        }
        
    }else{
        header('Location: ../index.php?err=1');
    }
}else{
    echo "<p>A página não foi carregada por POST, ou você não está logado!</p>";
}


?>