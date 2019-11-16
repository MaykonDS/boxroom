<!DOCTYPE html>
<html>
<head>
    <?php
    require('verify_session.php');
    include("config.php");

    if(@$_REQUEST['submit']=="ADICIONAR")
    {
      $nome = $_POST['nome'];
      $desc = $_POST['desc'];
      $local = $_POST['local'];

      $query = "INSERT INTO estoque (`nome`, `desc`, `endereco`, `ativo`) VALUES ('$nome', '$desc', '$local', 1)";
      if (mysqli_query($con, $query)){
        header('Location: estoque.php');
      }
    }

    ?>
    <meta charset='utf-8'>
    <title>Estoque - Adicionar</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='style/geral.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='style/formulario.css'>
</head>
<body>
<?php include "./php/menu-lateral.php"; ?>
<div class="body-content vertical">
    <form target="#" method="post" class="container-formulario">
      <div class="campos">
      <div class="header-formulario"><a href="estoque.php" class="previous-button2" style="margin-right: 20%"></a> Adicionar Estoque</div>
      <input type="text" maxlength="45" name="nome" placeholder="Nome:" class="input"></input>
      <input type="text" maxlength="45" name="desc" placeholder="Descrição:" class="input"></input>
      <input type="text" name="local" placeholder="Localização:" class="input"></input>
      <input type="submit" name="submit" value="ADICIONAR" class="submit"></input>
    </div>
    </form>
</div>
<?php include "./php/data-table.php";?>
</body>
</html>
