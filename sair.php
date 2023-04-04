<?php
session_start();
// Setar variáveis da sessão
session_unset();
// Destruir a sessão
session_destroy();

session_write_close();
setcookie(session_name(),'',0,'/');
header('Location: login.php');
?>