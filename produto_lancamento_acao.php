<?php
//acao = confirmar ou cancelar
$meid = $_GET['pos'];
$acao = $_GET['acao'];
$query = "SELECT quant, tipo, estoque_produto_id from movimentacao_estoque WHERE meid = $meid";
$select = mysqli_query($con, $query);
$result = mysqli_fetch_array($select);

$qtd = $result['quant'];
$tipo = $result['tipo'];
$epid = $result['estoque_produto_id'];

IF ($acao=="confirmar"){
  IF ($tipo=='A'){
    $query = "UPDATE estoque_produto SET estoque_produto.quant= WHERE epid='$epid'";
  } else {

  }
} else {

}

?>
