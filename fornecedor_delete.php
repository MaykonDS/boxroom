<?php
require "verify_session.php";
include "config.php";

$pos=$_GET['pos'];
$result = mysqli_query($con, "SELECT contato_id FROM fornecedor WHERE fid='$pos'");
$row = mysqli_fetch_array($result);
$contato_id = $row['contato_id'];


$query = "DELETE FROM fornecedor WHERE fid=$pos";
if (mysqli_query($con, $query)){
  $query = "DELETE FROM contato WHERE cid=$contato_id";
  if (mysqli_query($con, $query)){
    header("Location: fornecedor.php");
  } else {
    $error = "Não foi possível deletar o fornecedor!";
    $locale = "fornecedor.php";
    header("Location: error.php?error_msg=$error&locale=$locale");
  }
} else {
  $error = "Não foi possível deletar o fornecedor!";
  $locale = "fornecedor.php";
  header("Location: error.php?error_msg=$error&locale=$locale");
}

?>
