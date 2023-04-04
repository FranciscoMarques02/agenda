<?php
// Arrays com msgs de sucesso ou erro:
$msg = ['Cadastro realizado com sucesso!', 
        'Contato cadastrado!', 
        'Contato modificado!', 
        'Contato excluído!'];

$err = ['Email e/ou senha incorretos!', 
        'Verifique as informações digitadas.', 
        'Este e-mail já está cadastrado.', 
        'Falha ao remover usuário.', 
        'Falha ao modificar o usuário.']
?>

<!-- Sweet alerts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script>
    // Mensagens de sucesso:
    <?php if(isset($_GET['msg'])){ ?>
    swal("Sucesso!", "<?=$msg[$_GET['msg']];?>", "success");
    // Remover os parâmetros da URL:
    window.history.replaceState(null, null, window.location.pathname);
    <?php } ?>

    // Mensagens de erro:
    <?php if(isset($_GET['err'])){ ?>
    swal("Erro!", "<?=$err[$_GET['err']];?>", "error");
    // Remover os parâmetros da URL:
    window.history.replaceState(null, null, window.location.pathname);
    <?php } ?>
</script>