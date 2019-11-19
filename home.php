<?php
require('verify_session.php');
include "config.php";
header('Content-type: text/html; charset=iso-8859-1');

  $perm = $_SESSION['is_admin'];
  $display = "none";
  IF ($perm=='admin') {
    $display = "";
  }

?>
<html>
    <head>
    <link rel="stylesheet" type="text/css" href="style/home.css">
    <link rel="stylesheet" type="text/css" href="style/geral.css">
    <title>BoxRoom - Bem Vindo <?php $_SESSION["nome_usuario"]?></title>
    </head>
<body>
<?php include "./php/menu-lateral.php"; ?>
<div class="body-content">
<?php
      $id_user = $_SESSION['id_usuario'];
      $query = "SELECT comunicado_id FROM usuario
                INNER JOIN comunicados ON setor_sid = setor_id AND CURRENT_DATE <= data_finalizacao
                WHERE $id_user = uid";
      $result = mysqli_query($con, $query);
      $coluna = mysqli_fetch_array($result);

      if (mysqli_num_rows($result)>0){
          $id_comunicado = $coluna['comunicado_id'];
          $query = "SELECT descricao FROM comunicados
                    WHERE $id_comunicado = comunicado_id";
          $result = mysqli_query($con, $query);
          $coluna = mysqli_fetch_array($result);
          ?>
          <div class="box-alert" style="<?php echo('display:block');?>"><?php echo $coluna['descricao'];?></div>
    <?php } ?>
<!--QUICK ACCESS MENU-->
<div class="home-menu-quickacess">
    <!--Produtos-->
    <a href="produtos.php">
        <div class="card">
            <div class="card card1">
                <div class="content">
                    <img src="imagens/icons/shopping-cart.png">
                    <h3>Produtos</h3>
                </div>
            </div>
        </div>
    </a>
        <!--Estoque-->
      <a href="estoque.php">
        <div class="card">
            <div class="card card1">
                <div class="content">
                    <img src="imagens/icons/box.png">
                    <h3>Estoque</h3>
                </div>
            </div>
        </div>
      </a>
        <!--Vendas-->
      <a href="vendas.php">
        <div class="card">
            <div class="card card1">
                <div class="content">
                    <img src="imagens/icons/sales.png">
                    <h3>Vendas</h3>
                </div>
            </div>
        </div>
      </a>
        <!--Fornecedor-->
      <a href="fornecedor.php">
        <div class="card">
            <div class="card card1">
                <div class="content">
                    <img src="imagens/icons/fornecedor.png">
                    <h3>Fornecedor</h3>
                </div>
            </div>
        </div>
      </a>
      <!--Comunicados-->
    <a href="comunicados.php">
      <div class="card" style="display: <?=$display?>">
          <div class="card card1">
              <div class="content">
                  <img src="imagens/icons/alarm.png" style="margin-left:17px">
                  <h3>Comunicados</h3>
              </div>
          </div>
      </div>
    </a>
    <a href="usuarios.php">
      <div class="card" style="display: <?=$display?>">
          <div class="card card1">
              <div class="content">
                  <img src="imagens/icons/usuarios.png">
                  <h3>Usuarios</h3>
              </div>
          </div>
      </div>
    </a>
</div> <!--end home-menu-quickaccess-->
</div> <!--end home-content-->

</body>
</html>
