<?php 
include ('config.php');
session_start(); //inicia a sessão


if (@$_REQUEST['botao']=="ENTRAR")
{
  $email = $_POST['email'];
  $senha = md5($_POST['senha']);

  // COLOCAR EMAIL NO USUÁRIO E RETIRAR O CONTATO PQ É PARA FORNECEDOR
  $query = "SELECT usuario.nome, usuario.uid, priv.nome as perm FROM usuario
            INNER JOIN privilegios priv on usuario.setor_id = priv.prid
            WHERE usuario.email = '$email' AND usuario.senha = '$senha'";

  $result = mysqli_query($con,$query);

  if (mysqli_num_rows($result)==0){
    echo "ENTROU NO ERRO";
  }
  /*
  if (mysqli_num_rows($result)==0){
    // DO ANYTHING.. DONT FIND AN USER REGISTRED
    $error_msg = "Leo é viado";
    echo "ENTROU NO ERRO";
    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
      $(".error-msg").html("BLABLABLA"); console.log("LALA");
    </script>
    <?php
  }
  */
  while ($coluna=mysqli_fetch_array($result)) 
  {
    $_SESSION["id_usuario"]= $coluna["uid"]; 
    $_SESSION["nome_usuario"] = $coluna["nome"]; 
    $_SESSION["UsuarioNivel"] = $coluna["perm"];
    echo $coluna["perm"];
    
    // caso queira direcionar para páginas diferentes
    $niv = $coluna['perm'];
    if($niv == "user"){ 
      header("Location: home.php"); 
      exit; 
    }
    
    if($niv == "admin"){ 
      header("Location: relatorio_usuario.php");     
      exit; 
    }
    // ----------------------------------------------
  }
  
}


?>

<style type="text/css">
  .error-msg {

  }
</style>

<html>
<head>
  <title>BoxRoom - Sign In</title>
  <link rel="stylesheet" type="text/css" href="style/signin.css">
  <link rel="shortcut icon" href="imagens/icons/favicon196x196.png" type="image/png">
</head>
<body>
<a href="index.php"><div class="previous-button"></div></a>
<div id="content-box">
  <div class="login">
  <div class="login-triangulo"></div>
  <div class="gradient-border">
  <h2 class="login-header">Login</h2>

  <!--<form class="login-container" action="#" method="post">-->
    <form action="#" method="post">
    <p><input type="text" placeholder="Email" name="email"></p>
    <p><input type="password" placeholder="Senha" name="senha"></p>
    <p><div class="error-msg"></div></p>
    <p><input type="submit" name="botao" value="ENTRAR"></p>
  </form>
</div>
</div>
</div>
</body>
</html>