<?php
require "verify_session.php";
include "config.php";
//acao = confirmar ou cancelar
$meid = $_GET['pos'];
$acao = $_GET['acao'];
$query = "SELECT quant, smid, tipo, estoque_produto_id from movimentacao_estoque WHERE meid = $meid";
$select = mysqli_query($con, $query);
$result = mysqli_fetch_array($select);

$smid = $result['smid'];
$qtd = $result['quant'];
$tipo = $result['tipo'];
$epid = $result['estoque_produto_id'];

IF ($acao=="confirmar"){
  //ABASTECIMENTO
  IF ($tipo=='A'){
    $query = "UPDATE estoque_produto SET quant=quant+'$qtd' WHERE epid='$epid'";
    if (mysqli_query($con, $query)){
      $query = "UPDATE movimentacao_estoque SET quant=quant+'$qtd', smid=3 WHERE meid='$meid'";
      if (mysqli_query($con, $query)){
        header("Location: produtos.php");
      }
    }
    //DESCARTE
  } else {
    $query = "UPDATE estoque_produto SET quant=quant-'$qtd' WHERE epid='$epid'";
    if (mysqli_query($con, $query)){
      $query = "UPDATE movimentacao_estoque SET quant=quant-'$qtd', smid=3 WHERE meid='$meid'";
      if (mysqli_query($con, $query)){
        header("Location: produtos.php");
      }
    }
  }
  //CANCELAR
} else {
  $query = "UPDATE movimentacao_estoque SET smid=1 WHERE meid='$meid'";
    if (mysqli_query($con, $query)){
      header("Location: produtos.php");
    }
}
?>
