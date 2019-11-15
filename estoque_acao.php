<?php
require "verify_session.php";
include "config.php";
$id = $_GET['eid'];
$acao = $_GET['acao'];
$bool = 0;

if ($acao=="ativar")
{
  $bool = 1;
}
$query = "UPDATE estoque SET ativo=$bool WHERE eid=$id";
if (mysqli_query($con, $query)){
  echo  "<script>alert('Alterado com sucesso!);</script>";
  header("Location: estoque.php");
}
 ?>
