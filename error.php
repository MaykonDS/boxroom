
<style>
  body {
    align-content: center;
    justify-content: center;
  }
  .box-error {
    width: 30%;
    height: 30%;
    background-color: transparent;
    margin: auto;
    border-radius: 10px;
    display: block;
    position: absolute;
    left: 35%;
    right: auto;
    top: 25%;
    bottom: auto;
    font-family: "Calibri";
    font-weight: 100;
    color: white;
  }
  .box-error h3 {
    font-weight: bold;
    font-size: 35px;
    text-align: center;
    width: 100%;
  }
  .box-error .content {
    width: auto;
    text-align: center;
    font-size: 18px;
  }
  .box-error .bottom {
    width: auto;
    margin-top: 80px;
    text-align: center;
    font-size: 20px;
  }
  .box-error a {
    text-decoration: none;
    color: crimson;
  }
  .box-error a:hover {
    color: #ff6181;
  }
</style>

<!DOCTYPE html>
<html>
<head>
    <?php
    require('verify_session.php');
    include("config.php");
    ?>
    <meta charset='utf-8'>
    <title>Error</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='style/geral.css'>
</head>
<body>
  <div class="box-error">
    <h3>Ops! Não foi possível prosseguir.</h3>
    <div class="content">Mensagem: <?=$_GET['error_msg'];?>, entre em contato com o nosso suporte.</div>
    <div class="bottom"><a href="<?=$_GET['locale'];?>">Voltar</a></div>
  </div>
</body>
</html>
