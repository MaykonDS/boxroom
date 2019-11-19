<!DOCTYPE html>
<html>
<head>
  <?php
  require('verify_session.php');
  require('./php/verify_session_admin.php');
  include("config.php");

  $acao = $_GET['acao'];
  IF($acao=="editar"){ $uid = $_GET['pos'];}

  if (@$_REQUEST['submit']=="CADASTRAR")
  {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = md5($_POST['senha']);
    $sexo = $_POST['sexo'];
    $perm = $_POST['perm'];
    $setor = $_POST['setor'];

    $query = "INSERT INTO usuario (nome, email, senha, sexo, is_admin, setor_id) VALUES ('$nome', '$email', '$senha', '$sexo','$perm', $setor)";
    if (mysqli_query($con, $query)){
      header("Location: usuarios.php");
    } else {
      $error = "Não foi possível cadastrar o usuário!";
      $locale = "usuarios.php";
      header("Location: error.php?error_msg=$error&locale=$locale");
    }
  }
  if (@$_REQUEST['submit']=="SALVAR")
  {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = md5($_POST['senha']);
    $sexo = $_POST['sexo'];
    $perm = $_POST['perm'];
    $setor = $_POST['setor'];

    $query = "UPDATE usuario SET nome='$nome', email='$email', senha='$senha', sexo='$sexo', is_admin='$perm', setor_id='$setor' WHERE uid='$uid'";
    if (mysqli_query($con, $query)){
      header("Location: usuarios.php");
    } else {
      $error = "Não foi possível salvar o usuário!";
      $locale = "usuarios.php";
      header("Location: error.php?error_msg=$error&locale=$locale");
    }
  }
  ?>

  <meta charset='utf-8'>
  <title>Cadastro de usuario</title>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel='stylesheet' type='text/css' media='screen' href='style/geral.css'>
  <link rel='stylesheet' type='text/css' media='screen' href='style/formulario.css'>
</head>
<body>
  <?php include "./php/menu-lateral.php"; ?>
  <div class="body-content vertical">
    <form target="#" method="post" class="container-formulario">
      <div class="campos">
        <div class="header-formulario"><a href="usuarios.php" class="previous-button2"></a><div class="title"><?php IF($acao=="adicionar"){ echo 'Cadastro';} else {echo 'Editar';}?></div></div>
        <?php
        @$query = "SELECT nome, email, sexo, is_admin, setor_id FROM usuario WHERE uid = '$uid'";
        $select = mysqli_query($con, $query);
        $row = mysqli_fetch_array($select);
        ?>
        <input type="text" maxlength="45" name="nome" placeholder="Nome:" class="input" value="<?=$row['nome'];?>"></input>
        <input type="text" maxlength="45" name="email" placeholder="E-mail:" class="input" value="<?=$row['email'];?>"></input>
        <input type="password" maxlength="45" name="senha" placeholder="Senha" class="input"></input>
        <div class="radio-toolbar" style="margin-bottom: 0; margin-top: 20px"> Sexo:
          <label><input type="radio" name="sexo" value="m" <?php IF($row['sexo']=='m'){echo 'checked';}?>><span>Masculino</span></input></label>
          <label><input type="radio" name="sexo" value="f" <?php IF($row['sexo']=='f'){echo 'checked';}?>><span>Feminino</span></input></label>
        </div>
        <div class="radio-toolbar" style="margin-bottom: 0; margin-top: 20px">Permissão:
          <label><input type="radio" name="perm" value="1" <?php IF($row['is_admin']){echo 'checked';}?>><span>Admin</span></input></label>
          <label><input type="radio" name="perm" value="0" <?php IF(!$row['is_admin']){echo 'checked';}?>><span>Usuário</span></input></label>
        </div>
        Setor: <select name="setor" class="select-style1" style="margin-top: 15px;">
          <?php
          $query = "SELECT sid, nome FROM setor";
          $select = mysqli_query($con,$query);
          while ($result = mysqli_fetch_array($select)) { ?>
            <option value="<?=$result['sid'];?>" <?php IF($row['setor_id']==$result['sid']){echo 'selected="selected"';}?>><?=$result['nome'];?></option>
          <?php } ?>

        </select>
        <input type="submit" name="submit" value="<?php IF($acao=="adicionar"){ echo 'CADASTRAR';} else {echo 'SALVAR';}?>" class="submit"></input>
      </div>
    </form>
  </div>
  <?php include "./php/data-table.php";?>
</body>
</html>
