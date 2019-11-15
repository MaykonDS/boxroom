<!DOCTYPE html>
<html>
<head>
    <?php
    require('verify_session.php');
    include "./php/menu-lateral.php";
    include("config.php");

    $id = $_GET['eid'];
    if (@$_REQUEST['submit']=="ALTERAR")
    {
      $nome = $_POST['nome'];
      $desc = $_POST['desc'];
      $local = $_POST['local'];

      $query = "UPDATE estoque SET nome='$nome', `desc`='$desc', endereco='$local' WHERE eid='$id'";
      if (mysqli_query($con, $query)){
          header("Location: estoque.php");
      }
    }
    ?>

    <meta charset='utf-8'>
    <title>Estoque - Editar</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='style/geral.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='style/formulario.css'>
</head>
<body>
  <!-- Menu Lateral-->
  <div class="menu-icon"></div>
  <div class="menu"><a href="home.php"><div class="menu-option"><h3>BoxRoom</h3></div></a>
  <div class="menu-content" style="margin-left: -38px">
  <ul>
  <a href="produtos.php"><li class="navBar"><img class="menu-ico" title="Produtos" src="imagens/icons/shopping-cart.png"><div class="menu-option">Produtos</div></li></a>
  <a href="estoque.php"><li class="navBar"><img class="menu-ico" title="Estoque" src="imagens/icons/box.png"><div class="menu-option">Estoque</div></li></a>
  <a href="vendas.php"><li class="navBar"><img class="menu-ico" title="Vendas" src="imagens/icons/sales.png"><div class="menu-option">Vendas</div></li></a>
  <a href="fornecedor.php"><li class="navBar"><img class="menu-ico" title="Fornecedor" src="imagens/icons/fornecedor.png"><div class="menu-option">Fornecedor</div></li></a>
  <a href="logout.php"><li class="navBar logout"><img class="menu-ico" title="Sair" src="imagens/icons/logout.png"><div class="menu-option">Sair</div></li></a>
  </ul>
  </div>
  </div>
  <!--End Menu-->
<div class="body-content vertical">
    <form target="#" method="post" class="container-formulario">
      <div class="campos">
      <div class="header-formulario"><a href="estoque.php" class="previous-button2" style="margin-right: 20%"></a> Editar Estoque</div>
      <?php
      $query = "SELECT nome, `desc`, endereco FROM estoque WHERE eid=$id";
      $result = mysqli_query($con, $query);
      $row = mysqli_fetch_array($result);
      ?>
      <input type="text" name="nome" placeholder="Nome:" value="<?=$row['nome'];?>" class="input"></input>
      <input type="text" name="desc" placeholder="Descrição:" value="<?=$row['desc'];?>" class="input"></input>
      <input type="text" name="local" placeholder="Localização:" value="<?=$row['endereco'];?>" class="input"></input>
      <input type="submit" name="submit" value="ALTERAR" class="submit"></input>
    </div>
    </form>
</div>
<?php include "./php/data-table.php";?>
</body>
</html>
