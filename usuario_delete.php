<?php
require "verify_session.php";
require('./php/verify_session_admin.php');
include "config.php";

$uid = $_GET['pos'];
$query = "DELETE FROM usuario WHERE uid = '$uid'";
if (mysqli_query($con, $query)){
  header("Location: usuarios.php");
} else {
  $error = "Não foi possível excluir o usuário!";
  $locale = "usuarios.php";
  header("Location: error.php?error_msg=$error&locale=$locale");
}
?>
