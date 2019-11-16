<!DOCTYPE html>
<html>
<head>
    <?php
    require('verify_session.php');
    include("config.php");
    $pos = $_GET['pos'];
    $query = "SELECT nome, nome_fant,`cnpj-cpf`, tipo_pessoa, contato.email, contato.telefone, contato.responsavel FROM fornecedor
              INNER JOIN contato ON contato_id=contato.cid
              WHERE fid=$pos";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_array($result);

    ?>
    <meta charset='utf-8'>
    <title>Estoque - Visualizando <?=$row['nome'];?></title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='style/geral.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='style/formulario.css'>
</head>
<body>
<?php include "./php/menu-lateral.php"; ?>
<div class="body-content vertical">
    <form target="#" method="post" class="container-formulario">
      <div class="campos">
      <div class="header-formulario"><a href="fornecedor.php" class="previous-button2"></a><div class="title"><?=$row['nome'];?></div></div>
      <div class="info">
        <div class="info title">Nome:</div>
        <div class="info content"><?=$row['nome'];?></div>
        <div class="info separetor"></div>
        <div class="info title">Nome Fantasia:</div>
        <div class="info content"><?=$row['nome_fant'];?></div>
        <div class="info separetor"></div>
        <div class="info title">CPF/CNP-J:</div>
        <div class="info content"><?=$row['cnpj-cpf'];?></div>
        <div class="info separetor"></div>
        <div class="info title">Tipo Pessoa:</div>
        <div class="info content"><?=$row['tipo_pessoa'];?></div>
        <div class="info separetor"></div>
        <div class="info title">E-mail:</div>
        <div class="info content"><?=$row['email'];?></div>
        <div class="info separetor"></div>
        <div class="info title">Telefone:</div>
        <div class="info content"><?=$row['telefone'];?></div>
        <div class="info separetor"></div>
        <div class="info title">Responsável:</div>
        <div class="info content"><?=$row['responsavel'];?></div>
      </div>
    </div>
    </form>
</div>
<?php include "./php/data-table.php";?>
</body>
</html>
