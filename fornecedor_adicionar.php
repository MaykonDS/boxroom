<!DOCTYPE html>
<html>
<head>
  <?php
  require('verify_session.php');
  include("config.php");

  if (@$_REQUEST['submit']=="ADICIONAR")
  {
    $nome = $_POST['nome'];
    $nome_fant = $_POST['nome_fant'];
    $document = $_POST['document'];
    $type = $_POST['type'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $resp = $_SESSION['nome_usuario'];

    $query = "INSERT INTO contato (email, telefone, responsavel) VALUES ('$email', '$tel', '$resp')";
    if (mysqli_query($con, $query)){
      $query = "INSERT INTO fornecedor (nome, nome_fant, `cnpj-cpf`, tipo_pessoa, contato_id) VALUES ('$nome','$nome_fant','$document','$type', (SELECT cid FROM contato WHERE email='$email' AND telefone='$tel' AND responsavel='$resp'))";
      if (mysqli_query($con, $query)){
        header("Location: fornecedor.php");
      } else {
        $query = "DELETE FROM contato WHERE email='$email' AND telefone='$tel' AND responsavel='$resp'";
        mysqli_query($con, $query);
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
  <div class="body-content vertical">
    <form target="#" method="post" class="container-formulario">
      <div class="campos">
        <div class="header-formulario"><a href="fornecedor.php" class="previous-button2"></a><div class="title">Adicionar</div></div>
        <input type="text" name="nome" placeholder="Nome:" class="input"></input>
        <input type="text" name="nome_fant" placeholder="Nome Fantasia:" class="input"></input>
        <input type="text" name="document" placeholder="CNP-J/CPF:" class="input"></input>
        <input type="text" name="type" placeholder="Tipo Pessoa:" class="input"></input>
        <input type="text" name="email" placeholder="E-mail:" class="input"></input>
        <input type="text" name="tel" placeholder="Telefone:" class="input"></input>
        <input type="submit" name="submit" value="ADICIONAR" class="submit"></input>
      </div>
    </form>
  </div>
  <?php include "./php/data-table.php";?>
</body>
</html>
