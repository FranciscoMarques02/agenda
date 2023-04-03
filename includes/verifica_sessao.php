<?php
session_start();

if(!isset($_SESSION['dados_usuario'])){
    header('Location: ../login.php');
    // Interromper a continuação da execução do código:
    exit();
}

?>