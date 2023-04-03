<?php
// Sempre que for trabalhar com a sessão usar o session_start()
session_start();

// Verificar se o id está setado na URL e o user está logado:
if(isset($_GET['id']) && isset($_SESSION['dados_usuario'])){
    // Importar a classe Contato:
    require_once('../classes/Contato.class.php');

    // Instanciar um obj da classe contato:
    $contato = new Contato();

    // Pegar o id pela url:
    $contato->id = $_GET['id'];

    // Executar o comando:
    $qtd_linhas_apagadas = $contato->Apagar();

    // Verificar se o registro foi removido:
    if($qtd_linhas_apagadas >= 1){
        // Direcionar ao index:
        header('Location: ../index.php');

    }else{
        echo "Falha ao remover o registro.";
    }
}else{
    echo "O ID a ser removido não foi definido 
    ou você não está logado!";
}



?>