<!DOCTYPE html>
<html>
<head>
    <?php
    require('verify_session.php');
    require('./php/verify_session_admin.php');
    include("config.php");
    include("./php/functions.php");

    IF(@$_REQUEST['submit']=="ALTERAR"){
      $msg = $_POST['msg'];
      $query = "UPDATE `comunicados` SET `descricao`='$msg' WHERE 1";
      IF (mysqli_query($con, $query)){
        header("Location: home.php");
      }

    }

    ?>
    <meta charset='utf-8'>
    <title>Comunicados</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='style/geral.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='style/formulario.css'>
</head>
<body>

<?php include "./php/menu-lateral.php"; ?>

<div class="body-content vertical">
    <div class="container-top">
        <h3 class="title">Comunicados</h3>
        <!--<a class="options" href="fornecedor_adicionar.php"></a>-->
    </div>
    <div class="relatorio-container">
        <?php $query = "SELECT fid, nome, nome_fant,`cnpj-cpf` FROM fornecedor
                        order by nome asc";
            $result = mysqli_query($con,$query);
           ?>

           <form target="#" method="post" class="container-formulario">
             <div class="campos">
             <div class="header-formulario"><a href="home.php" class="previous-button2"></a><div class="title">Comunicado</div></div>
             <?php
               @$query = "SELECT descricao FROM comunicados WHERE comunicado_id = 1";
               $select = mysqli_query($con, $query);
               $row = mysqli_fetch_array($select);
             ?>
             <input type="text" maxlength="100" name="msg" placeholder="Menssagem:" class="input" value="<?=$row['descricao'];?>"></input>

             <input type="submit" name="submit" value="ALTERAR" class="submit"></input>
           </div>
           </form>
</div>
<?php include "./php/data-table.php";?>
</body>
</html>
