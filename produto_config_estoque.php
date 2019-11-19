<!DOCTYPE html>
<html>
<head>
  <?php
  require('verify_session.php');
  include("config.php");
  date_default_timezone_set('America/Sao_Paulo');
  $data = date('Y-m-d H:i:s');
  $eid = $_GET['pos'];
  $query = "SELECT nome FROM estoque WHERE eid='$eid'";
  $select = mysqli_query($con, $query);
  $result = mysqli_fetch_array($select);

  IF(@$_REQUEST['botao']=="Abastecer"){
    $epid = $_POST['pos'];
    $qtd = $_POST[$epid.'qtd_abastecer'];
    //smid 1 = cancelado, 2 = aguardando, 3 = finalziado.

    $query = "INSERT INTO `movimentacao_estoque`(`quant`, `smid`, `estoque_produto_id`, `data_mov`, `tipo`)
    VALUES ('$qtd',2,'$epid','$data','Abastecimento')";
    if (mysqli_query($con, $query)){

    } else {
      $error = "Não foi possível abastecer o estoque!";
      $locale = "produtos.php";
      header("Location: error.php?error_msg=$error&locale=$locale");
    }

  }
  IF(@$_REQUEST['botao']=="Descartar"){
    $epid = $_POST['pos'];
    $qtd = $_POST[$epid.'qtd_descartar'];
    //smid 1 = cancelado, 2 = aguardando, 3 = finalziado.

    $query = "INSERT INTO `movimentacao_estoque`(`quant`, `smid`, `estoque_produto_id`, `data_mov`, `tipo`)
    VALUES ('$qtd',2,'$epid','$data','Descarte')";
    if (mysqli_query($con, $query)){

    } else {
      $error = "Não foi possível descartar o estoque!";
      $locale = "produtos.php";
      header("Location: error.php?error_msg=$error&locale=$locale");
    }
  }

  ?>
  <meta charset='utf-8'>
  <title>Configurar <?=$result['nome'];?></title>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel='stylesheet' type='text/css' media='screen' href='style/geral.css'>
  <link rel='stylesheet' type='text/css' media='screen' href='style/formulario.css'>
</head>
<body>

  <?php include "./php/menu-lateral.php"; ?>

  <div class="body-content vertical">
    <div class="container-top">
      <h3 class="title"><?=$result['nome'];?></h3>
      <a class="options" href="produto_vinculo.php?pos=<?=$eid?>">Vincular Produtos</a>
    </div>
    <div class="relatorio-container">
      <?php $query = "SELECT DISTINCT epid, produto_id, nome, estoque_produto.quant, quant_max, quant_min, quant_alert
      FROM estoque_produto
      INNER JOIN produto ON produto_id = pid
      WHERE estoque_id = '$eid' AND produto.ativo=1";
      $result = mysqli_query($con,$query);
      ?>
      <table class="tabela" id="tabela">
        <thead style="text-align:center">
          <th style="text-align:left">Nome</th>
          <th>Quantidade</th>
          <th>Abastecer</th>
          <th>Descartar</th>
          <th>Alterar</th>
        </thead>
        <tbody>
          <!-- Realiza o Select de todos os fornecedores cadastrados -->
          <?php while(@$linha = mysqli_fetch_array($result)){
            $pid = $linha['produto_id'];
            $quant = $linha['quant'];
            $quant_max = $linha["quant_max"];
            $quant_min = $linha["quant_min"];
            $quant_alert = $linha["quant_alert"];
            $result_un = mysqli_query($con, "SELECT unidade_comercial.nome FROM produto_unidade
                                             INNER JOIN unidade_comercial ON uid=unidade_id
                                             WHERE produto_id='$pid'");
            $select_un = mysqli_fetch_array($result_un);
            if(@$select_un['nome']=="CX"){
              $quant = $quant*20;
            } else if(@$select_un['nome']=="PL"){
              $quant = $quant*80;
            } else if(@$select_un['nome']=="CT"){
              $quant = $quant*400;
            }
            ?>
            <tr>
              <td width="400px"><?=$linha["nome"]?></td>
              <td><div class="progress" style="width: <?=($quant/$quant_max)*100?>%;background-color:<?php IF($quant<=$quant_alert){ echo '#ee6705';} else if ($quant<=$quant_alert){echo '#fd2828';} ?>"><?=$quant?>/<?=$quant_max?>UN</div></td>
              <form target="#" method="post">
                <input type="hidden" name="pos" value="<?=$linha['epid']?>"></input>
                <td width="200px"><input type="number" name="<?=$linha['epid']?>qtd_abastecer" min="0" class="form"></input><input type="submit" name="botao" class="submit" value="Abastecer" style="width: 80px; margin-left: 15px"></input></td>
                <td width="200px"><input type="number" name="<?=$linha['epid']?>qtd_descartar" min="0" class="form"></input><input type="submit" name="botao" class="submit" value="Descartar" style="width: 80px; margin-left: 15px"></input></td>
              </form>
              <td width="80px"><a href="produto_acao.php?pos=<?=$pid?>&acao=editar"><img src="imagens/icons/edit.png" class="icon"></a></td>

            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div> <!-- End relatorio Cancelado: #ff2e2e / Aguardando: #ff871c / Finalizado: #5f5 -->
    <div class="background-boxroom" style="display: inline-table">
      <h2 class="title">Lançamentos</h2>
      <div class="lancamentos" style="border-right: 2px solid #4f4f4f">Abastecimentos
        <?php $query = "SELECT movimentacao_estoque.meid FROM movimentacao_estoque
        INNER JOIN estoque_produto ON estoque_produto.estoque_id=1
        WHERE movimentacao_estoque.estoque_produto_id = estoque_produto.epid AND tipo='A'";
        $res = mysqli_query($con,$query);
        while(@$row = mysqli_fetch_array($res)){
          $meid=$row['meid'];
          $query = "SELECT movimentacao_estoque.quant, produto.nome, status_movimentacao.nome as stat, data_mov FROM movimentacao_estoque
          INNER JOIN status_movimentacao ON status_movimentacao.smid=movimentacao_estoque.smid
          INNER JOIN produto ON pid=(SELECT produto_id FROM estoque_produto WHERE epid=movimentacao_estoque.estoque_produto_id ) WHERE meid='$meid' ";
          $res2 = mysqli_query($con,$query);
          while(@$row2 = mysqli_fetch_array($res2)){ ?>
            <div class="content"><a><?=$row2['data_mov']?></a><?=$row2['nome']?><a>Quant.:</a><?=$row2['quant']?>UN<a>
              Status:</a><a style="color: <?php IF($row2['stat']=='Aguardando'){ echo '#ff871c'; } else if($row2['stat']=='Finalizado'){ echo '#5f5';} else { echo '#ff2e2e';} ?>"><?=$row2['stat']?></a>
              <?php IF($row2['stat']=='Aguardando'){ ?><a href="produto_lancamento_acao.php?pos=<?=$meid?>&acao=confirmar"><img src="imagens/icons/check.png" class="icon" style="margin-right:90px"></a><a href="produto_lancamento_acao.php?pos=<?=$meid?>&acao=cancelar"><img src="imagens/icons/remove.png" class="icon"></a> <?php } ?></div>
              <?php
            }
          }
          ?>

        </div>
        <div class="lancamentos" style="border-right: 2px solid #4f4f4f">Descartes
          <?php $query = "SELECT movimentacao_estoque.meid FROM movimentacao_estoque
          INNER JOIN estoque_produto ON estoque_produto.estoque_id=1
          WHERE movimentacao_estoque.estoque_produto_id = estoque_produto.epid AND tipo='D'";
          $res = mysqli_query($con,$query);
          while(@$row = mysqli_fetch_array($res)){
            $meid=$row['meid'];
            $query = "SELECT movimentacao_estoque.quant, produto.nome, status_movimentacao.nome as stat, data_mov FROM movimentacao_estoque
            INNER JOIN status_movimentacao ON status_movimentacao.smid=movimentacao_estoque.smid
            INNER JOIN produto ON pid=(SELECT produto_id FROM estoque_produto WHERE epid=movimentacao_estoque.estoque_produto_id ) WHERE meid='$meid'";
            $res2 = mysqli_query($con,$query);
            while(@$row2 = mysqli_fetch_array($res2)){ ?>
              <div class="content"><a><?=$row2['data_mov']?></a><?=$row2['nome']?><a>Quant.:</a><?=$row2['quant']?>UN<a>
                Status:</a><a style="color: <?php IF($row2['stat']=='Aguardando'){ echo '#ff871c'; } else if($row2['stat']=='Finalizado'){ echo '#5f5';} else { echo '#ff2e2e';} ?>"><?=$row2['stat']?></a>
                <?php IF($row2['stat']=='Aguardando'){ ?><a href="produto_lancamento_acao.php?pos=<?=$meid?>&acao=confirmar"><img src="imagens/icons/check.png" class="icon" style="margin-right:90px"></a><a href="produto_lancamento_acao.php?pos=<?=$meid?>&acao=cancelar"><img src="imagens/icons/remove.png" class="icon"></a> <?php } ?></div>
              <?php }
            }
            ?>

          </div>
        </div>
        <?php include "./php/data-table.php";?>
      </body>
      </html>
