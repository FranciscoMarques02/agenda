<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
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

    // "Empurrar" as informações ao banco de dados:
    $contato->Cadastrar();

    // Redirecionar de volta  à listagem (index.php):
    header('Location: ../index.php');
}else{
    echo "A página deve ser carregada por POST.";
}


?>