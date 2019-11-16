<!DOCTYPE html>
<html>
<head>
    <?php
    require('verify_session.php');
    include("config.php");

    $acao = $_GET['acao'];
    IF($acao=="editar"){ $pid = $_GET['pos'];}

    if (@$_REQUEST['submit']=="CADASTRAR")
    {
      $nome = $_POST['nome'];
      $dat_entrega = $_POST['dat_entrega'];
      $dat_venc = $_POST['dat_venc'];
      $qtd = $_POST['qtd'];
      $desc = $_POST['desc'];
      $tipo = $_POST['tipo'];

      $query = "INSERT INTO `produto` (`nome`, `data_entrega`, `data_validade`, `ingredientes_id`, `desc_produto`, `quant`, `ativo`, `tipo_id`)
                VALUES ('$nome', '$dat_entrega', '$dat_venc', NULL, '$desc', '$qtd', 1, '$tipo')";
      if (mysqli_query($con, $query)){
        header("Location: produtos.php");
      } else {
        $error = "Não foi possível cadastrar o produto!";
        $locale = "produtos.php";
        header("Location: error.php?error_msg=$error&locale=$locale");
      }
    }
    if (@$_REQUEST['submit']=="SALVAR")
    {
      $nome = $_POST['nome'];
      $dat_entrega = $_POST['dat_entrega'];
      $dat_venc = $_POST['dat_venc'];
      $qtd = $_POST['qtd'];
      $desc = $_POST['desc'];
      $tipo = $_POST['tipo'];

      $query = "UPDATE produto SET nome='$nome', data_entrega='$dat_entrega', data_validade='$dat_venc', desc_produto='$desc', quant='$qtd' , tipo_id='$tipo' WHERE pid='$pid'";
      if (mysqli_query($con, $query)){
        header("Location: produtos.php");
      } else {
        $error = "Não foi possível salvar o produto!";
        $locale = "produtos.php";
        header("Location: error.php?error_msg=$error&locale=$locale");
      }
    }
    ?>

    <meta charset='utf-8'>
    <title>Cadastro de Produtos</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='style/geral.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='style/formulario.css'>
</head>
<body>
<?php include "./php/menu-lateral.php"; ?>
<div class="body-content vertical">
    <form target="#" method="post" class="container-formulario">
      <div class="campos">
      <div class="header-formulario"><a href="produtos.php" class="previous-button2"></a><div class="title"><?php IF($acao=="adicionar"){ echo 'Cadastro - Produto';} else {echo 'Editar';}?></div></div>
      <?php
        @$query = "SELECT nome, data_entrega, data_validade, desc_produto, quant , tipo_id FROM produto WHERE pid = '$pid'";
        $select = mysqli_query($con, $query);
        $row = mysqli_fetch_array($select);
      ?>
      <h2 class="info">Atenção <a class="obg">*</a> Campos obrigatórios</h2>
      <div class="obg">*</div><input type="text" maxlength="45" name="nome" placeholder="Nome:" class="input" value="<?=$row['nome'];?>"></input>
      Data de Entrega: <input type="date" name="dat_entrega" class="input" value="<?=$row['data_entrega'];?>"></input>
      Vencimento: <input type="date" name="dat_venc" class="input" value="<?=$row['data_validade'];?>"></input>
      <input type="number" max="999" name="qtd" placeholder="Quantidade:" class="input" value="<?=$row['quant'];?>">
      <input type="text" max="45" name="desc" placeholder="Descrição:" class="input" value="<?=$row['desc_produto'];?>">
      Tipo: <select name="tipo" class="select-style1" style="margin-top: 15px;">

        <?php
        $query = "SELECT tid, nome FROM tipo";
        $select = mysqli_query($con,$query);
        while ($result = mysqli_fetch_array($select)) { ?>
          <option value="<?=$result['tid'];?>" <?php IF($row['tipo_id']==$result['tid']){echo 'selected="selected"';}?>><?=$result['nome'];?></option>
      <?php } ?>

      </select>
      <input type="submit" name="submit" value="<?php IF($acao=="adicionar"){ echo 'CADASTRAR';} else {echo 'SALVAR';}?>" class="submit"></input>
    </div>
    </form>
</div>
<?php include "./php/data-table.php";?>
</body>
</html>
