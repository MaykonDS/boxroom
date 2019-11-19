<!DOCTYPE html>
<html>
<head>
  <?php
  require('verify_session.php');
  include("config.php");
  include("./php/functions.php");
  ?>
  <meta charset='utf-8'>
  <title>Fornecedor</title>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel='stylesheet' type='text/css' media='screen' href='style/geral.css'>
  <link rel='stylesheet' type='text/css' media='screen' href='style/formulario.css'>
</head>
<body>

  <?php include "./php/menu-lateral.php"; ?>

  <div class="body-content vertical">
    <div class="container-top">
      <h3 class="title">Fornecedor(es)</h3>
      <a class="options" href="fornecedor_adicionar.php">Adicionar</a>
    </div>
    <div class="relatorio-container">
      <?php $query = "SELECT fid, nome, nome_fant,`cnpj-cpf` FROM fornecedor
      order by nome asc";
      $result = mysqli_query($con,$query);
      ?>
      <table class="tabela" id="tabela">
        <thead>
          <th>Nome</th>
          <th>Nome Fantasia</th>
          <th>CPF/CNP-J</th>
          <th>Estoque(s) Vinculado(s)</th>
          <th width="50px">Visualizar</th>
          <th>Alterar</th>
          <th>Excluir</th>
        </thead>
        <tbody>
          <!-- Realiza o Select de todos os fornecedores cadastrados -->
          <?php while(@$linha = mysqli_fetch_array($result)){?>
            <tr>
              <td><?=$linha["nome"]?></td>
              <td><?=$linha["nome_fant"]?></td>
              <td><?=$linha["cnpj-cpf"]?></td>
              <td>
                <?php
                $id = $linha['fid'];
                $query = "SELECT estoque_id FROM estoque_fornecedor WHERE estoque_fornecedor.fornecedor_id=$id";
                $result2 = mysqli_query($con, $query);
                if (mysqli_num_rows($result2)==0){
                  echo "Nenhum Estoque Vinculado!";
                } else {?>
                  <select class="select-style1">
                    <?php
                    // Verifica se possui estoques vinculados a esse fornecedor
                    while(@$row = mysqli_fetch_array($result2)){
                      $estoque_id = $row['estoque_id'];
                      $query = "SELECT nome FROM estoque WHERE eid=$estoque_id AND ativo=1";
                      $result3 = mysqli_query($con, $query);
                      // Se tiver irá ficar no while até adicionar todos os estoques vinculados
                      @$nomes = mysqli_fetch_array($result3);
                      if(!empty($nomes['nome'])){
                        ?>

                        <option><?=$nomes['nome'];?></option>
                      <?php }
                    }
                    ?></select><?php } ?></td>
                    <td width="40px"><a href="fornecedor_visualizar.php?pos=<?=$linha["fid"]?>"><img src="imagens/icons/eye.png" style="width:20px ;height:20px ;" class="icon"></a></td>
                    <td width="40px"><a href="fornecedor_editar.php?pos=<?=$linha["fid"]?>"><img src="imagens/icons/edit.png" class="icon"></a></td>
                    <td width="40px"><a href="fornecedor_delete.php?pos=<?=$linha["fid"]?>"><img src="imagens/icons/remove.png" class="icon"></a></td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div> <!-- End relatorio -->
          <div class="background-boxroom">
            <?php $query = "SELECT fid, nome FROM fornecedor
            order by nome asc";
            $result = mysqli_query($con,$query);
            while(@$linha = mysqli_fetch_array($result)){
              ?>
              <div class="container-boxroom">
                <div class="container-boxroom top"><?=$linha['nome'];?> <a href="fornecedor_vinculo_estoque.php?pos=<?=$linha['fid'];?>"><img src="imagens/icons/add.png"></a></div>
                <div class="contatiner-boxroom middle">
                  <div class="title">Estoques:</div>
                  <?php
                  $id = $linha['fid'];
                  $query = "SELECT estoque_id FROM estoque_fornecedor WHERE estoque_fornecedor.fornecedor_id=$id";
                  $result2 = mysqli_query($con, $query);
                  if (mysqli_num_rows($result2)==0){
                    ?><div class="op"><?="Sem estoque vinculado ;-;";?></div><?php
                  } else {
                    while(@$row = mysqli_fetch_array($result2)){
                      $estoque_id = $row['estoque_id'];
                      $query = "SELECT nome FROM estoque WHERE eid=$estoque_id AND ativo=1";
                      $result3 = mysqli_query($con, $query);
                      // Se tiver irá ficar no while até adicionar todos os estoques vinculados
                      @$nomes = mysqli_fetch_array($result3);
                      ?>
                      <div class="op"><?=$nomes['nome'];?></div>
                      <?php
                    }
                  }
                  ?>
                </div>
              </div>
            <?php } ?>

          </div>
        </div>
        <?php include "./php/data-table.php";?>
      </body>
      </html>
