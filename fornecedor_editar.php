<!DOCTYPE html>
<html>
<head>
    <?php
    require('verify_session.php');
    include("config.php");

    $pos = $_GET['pos'];
    if (@$_REQUEST['submit']=="SALVAR")
    {
      $nome = $_POST['nome'];
      $nome_fant = $_POST['nome_fant'];
      $document = $_POST['document'];
      $type = $_POST['type'];
      $email = $_POST['email'];
      $tel = $_POST['tel'];
      $resp = $_POST['resp'];

      $query = "UPDATE contato SET email='$email', telefone='$tel', responsavel='$resp' WHERE cid=(SELECT contato_id FROM fornecedor WHERE fid=$pos)";
      if (mysqli_query($con, $query)){
        $query = "UPDATE fornecedor SET nome='$nome', nome_fant='$nome_fant',`cnpj-cpf`='$document',tipo_pessoa='$type' WHERE fid=$pos";
        if (mysqli_query($con, $query)){
          header("Location: fornecedor.php");
        }
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
<?php include "./php/menu-lateral.php"; ?>
  <!--End Menu-->
<div class="body-content vertical">
    <form target="#" method="post" class="container-formulario">
      <div class="campos">
        <!--SELECT DOS DADOS-->
        <?php
        $query = "SELECT nome, nome_fant,`cnpj-cpf`, tipo_pessoa, contato.email, contato.telefone, contato.responsavel FROM fornecedor
                  INNER JOIN contato ON contato_id=contato.cid
                  WHERE fid=$pos";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_array($result);
        ?>
      <div class="header-formulario"><a href="fornecedor.php" class="previous-button2"></a><div class="title">Editar <?=$row['nome'];?></div></div>
      <input type="text" name="nome" placeholder="Nome:" value="<?=$row['nome'];?>" class="input"></input>
      <input type="text" name="nome_fant" placeholder="Nome Fantasia:" value="<?=$row['nome_fant'];?>" class="input"></input>
      <input type="text" name="document" placeholder="CNP-J/CPF:" value="<?=$row['cnpj-cpf'];?>" class="input"></input>
      <input type="text" name="type" placeholder="Tipo Pessoa:" value="<?=$row['tipo_pessoa'];?>" class="input"></input>
      <input type="text" name="email" placeholder="E-mail:" value="<?=$row['email'];?>" class="input"></input>
      <input type="text" name="tel" placeholder="Telefone:" value="<?=$row['telefone'];?>" class="input"></input>
      <input type="text" name="resp" placeholder="Responsável:" value="<?=$row['responsavel'];?>" class="input"></input>
      <input type="submit" name="submit" value="SALVAR" class="submit"></input>
    </div>
    </form>
</div>
<?php include "./php/data-table.php";?>
</body>
</html>
