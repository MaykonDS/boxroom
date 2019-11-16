<!DOCTYPE html>
<html>
<head>
    <?php
    require('verify_session.php');
    include("config.php");

    $eid = $_GET['pos'];
    $query = "SELECT nome FROM estoque WHERE eid='$eid'";
    $select = mysqli_query($con, $query);
    $result = mysqli_fetch_array($select);

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
        <a class="options" href="produto_acao.php?acao=adicionar">Cadastrar Produtos</a>
    </div>
    <div class="relatorio-container">
        <?php $query = "SELECT DISTINCT produto_id, nome, estoque_produto.quant, quant_max, quant_min, quant_alert FROM estoque_produto
                        INNER JOIN produto ON produto_id = pid
                        WHERE estoque_id = '$eid'";
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
                 $quant = $linha['quant'];
                 $quant_max = $linha["quant_max"];
                 $quant_min = $linha["quant_min"];
                 $quant_alert = $linha["quant_alert"];
                 ?>
                <tr>
                    <td width="400px"><?=$linha["nome"]?></td>
                    <td><div class="progress" style="width: <?=($quant/$quant_max)*100?>%"><?=$quant?>/<?=$quant_max?></div></td>
                    <td width="200px"></td>
                    <td width="200px"></td>
                    <td width="80px"><a href="produto_acao.php?pos=<?=$linha["pid"]?>&acao=editar"><img src="imagens/icons/edit.png" class="icon"></a></td>

                </tr>
               <?php } ?>
                </tbody>
            </table>
    </div> <!-- End relatorio -->

</div>
<?php include "./php/data-table.php";?>
</body>
</html>
