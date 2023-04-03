<?php

if(isset($_GET['id'])){
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
    echo "O ID a ser removido não foi definido!";
}



?>