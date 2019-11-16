<?php

// Verifica o usuário logado é admin
if($_SESSION['is_admin']=='user')
{
// Usuário não é admin! Redireciona para a página de erro.
header("Location: error.php?error_msg=Você não tem permissão para acessar essa página!&locale=home.php");
exit;
}
?>
