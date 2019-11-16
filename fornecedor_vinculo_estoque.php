<!DOCTYPE html>
<html>
<head>
    <?php
    require('verify_session.php');
    include("config.php");
    $fid = $_GET['pos'];
    if (@$_REQUEST['submit']=="VINCULAR")
    {
        $eid = $_POST['estoque'];
        $query = "INSERT INTO estoque_fornecedor (estoque_id, fornecedor_id) VALUES ('$eid','$fid')";
        if (mysqli_query($con, $query)) {
          header("Location: fornecedor.php");
        }
    }
    ?>
    <meta charset='utf-8'>
    <title>Fornecedor - Vinculo</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='style/geral.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='style/formulario.css'>
</head>
<body>
<?php include "./php/menu-lateral.php"; ?>
<div class="body-content vertical">
    <form target="#" method="post" class="container-formulario">
      <div class="campos">
      <div class="header-formulario"><a href="fornecedor.php" class="previous-button2"></a><div class="title"><?php $result = mysqli_query($con, "SELECT nome FROM fornecedor WHERE fid=$fid"); $nome = mysqli_fetch_array($result); echo "Fornecedor: ".$nome['nome'];?></div></div>
      <h2 class="title"> Estoques disponíveis: </h2>
      <div class="radio-toolbar">
        <?php $query = "SELECT eid, nome FROM estoque WHERE eid NOT IN (SELECT estoque_id FROM estoque_fornecedor WHERE fornecedor_id = $fid)";
        $result = mysqli_query($con, $query);
        while ($row = mysqli_fetch_array($result)) { ?>
          <label><input type="radio" name="estoque" value="<?=$row['eid'];?>"><span><?=$row['nome'];?> </span></input></label>
        <?php } ?>
    </div>
      <input type="submit" name="submit" value="VINCULAR" class="submit"></input>
    </div>
    </form>
</div>
<?php include "./php/data-table.php";?>
</body>
</html>
