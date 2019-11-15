<?php
func ativarEstoque($estoque_id){
  $didSuccess = 0;
  $query = "UPDATE estoque SET ativo=1 WHERE eid=$estoque_id"
  if (mysqli_query($con, $query)){
    $didSuccess = 1;
  }
  return $didSuccess;
}
 ?>
