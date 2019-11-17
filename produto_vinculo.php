<!DOCTYPE html>
<html>
<head>
    <?php
    require('verify_session.php');
    include("config.php");
    $eid = $_GET['pos'];
    $query = "SELECT nome FROM estoque WHERE eid='$eid'";
    $select = mysqli_query($con, $query);
    $row = mysqli_fetch_array($select);

    if(@$_REQUEST['botao']=="VINCULAR"){
      $pid = $_POST['pid'];
      $qtd = $_POST['qtd'];
      $min = $_POST[$pid.'min'];
      $max = $_POST[$pid.'max'];
      $alert = $_POST[$pid.'alert'];
      $uid = $_SESSION['id_usuario'];
      $query = "INSERT INTO estoque_produto(produto_id, estoque_id, quant, quant_max,quant_min, quant_alert, usuario_id) VALUES ('$pid','$eid','$qtd','$max','$min','$alert','$uid')";
      mysqli_query($con, $query);
    }

    ?>
    <meta charset='utf-8'>
    <title>Vinculo - <?=$row['nome'];?></title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='style/geral.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='style/formulario.css'>
</head>
<body>
<?php include "./php/menu-lateral.php"; ?>
<div class="body-content vertical">
    <div class="container-top">
        <h3 class="title"><?=$row['nome']?></h3>
        <a class="options" href="produtos.php">Voltar</a>
    </div>
    <div class="relatorio-container">
        <?php $query = "SELECT pid, nome, quant FROM produto WHERE ativo=1 AND pid NOT IN
                        (SELECT produto_id FROM estoque_produto
                        WHERE produto_id=pid AND estoque_id='$eid')";

            $result = mysqli_query($con,$query);
           ?>
            <table class="tabela" id="tabela" style="text-align:center">
                <thead>
                    <th style="text-align:left">Nome</th>
                    <th>Quant.</th>
                    <th>Quant. Mín.</th>
                    <th>Quant. Máx.</th>
                    <th>Quant. de Alerta</th>
                    <th>Vincular</th>
                </thead>
                <tbody>
               <?php while(@$linha = mysqli_fetch_array($result)){
                 $pid = $linha['pid'];
                  $query = "SELECT unidade_comercial.nome FROM produto_unidade
                            INNER JOIN unidade_comercial ON uid = unidade_id
                            WHERE produto_unidade.produto_id = '$pid'";
                  $result2 = mysqli_query($con, $query);
                  $coluna = mysqli_fetch_array($result2);
                 ?>
                <tr>
                  <form target="#" method="post">
                    <td style="text-align:left"><?=$linha["nome"]?></td>
                    <td><?=$linha['quant']?><?=$coluna['nome']?></td>
                    <input name="qtd" type="hidden" value="<?=$linha['quant']?>"></input>
                    <input name="pid" type="hidden" value="<?=$pid?>"></input>
                    <td><input name="<?=$pid?>min" type="number" min="0" value="0" class="form"></input></td>
                    <td><input name="<?=$pid?>max" type="number" min="0" value="0" class="form"></input></td>
                    <td><input name="<?=$pid?>alert" type="number" min="0" value="0" class="form"></input></td>
                    <td width="40px" style="text-align:left"><input name="botao" type="submit" class="submit" value="VINCULAR" style="margin-top: 0"></input></td>
                  </form>
                </tr>
               <?php } ?>
                </tbody>
            </table>
    </div>
</div>
<?php include "./php/data-table.php";?>
</body>
</html>
