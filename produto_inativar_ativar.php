<?php
require "verify_session.php";
include "config.php";

$pid = $_GET['pos'];
$stat = 0;
$acao = $_GET['acao'];
IF ($acao=='ativar') {
 $stat = 1;
}

$query = "UPDATE produto SET ativo='$stat' WHERE pid='$pid'";
if (mysqli_query($con, $query)){
  header("Location: produtos.php");
} else {

  $error = "Não foi possível $acao o produto!";
  $locale = "produtos.php";
  header("Location: error.php?error_msg=$error&locale=$locale");
}

 ?>
