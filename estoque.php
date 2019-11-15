<!DOCTYPE html>
<html>
<head>
    <?php
    require('verify_session.php');
    include "./php/menu-lateral.php";
    include("config.php");
    ?>
    <meta charset='utf-8'>
    <title>Estoque</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='style/geral.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='style/formulario.css'>
</head>
<body>
  <!-- Menu Lateral-->
  <div class="menu-icon"></div>
  <div class="menu"><a href="home.php"><div class="menu-option"><h3>BoxRoom</h3></div></a>
  <div class="menu-content" style="margin-left: -38px">
  <ul>
  <a href="produtos.php"><li class="navBar"><img class="menu-ico" title="Produtos" src="imagens/icons/shopping-cart.png"><div class="menu-option">Produtos</div></li></a>
  <a href="estoque.php"><li class="navBar"><img class="menu-ico" title="Estoque" src="imagens/icons/box.png"><div class="menu-option">Estoque</div></li></a>
  <a href="vendas.php"><li class="navBar"><img class="menu-ico" title="Vendas" src="imagens/icons/sales.png"><div class="menu-option">Vendas</div></li></a>
  <a href="fornecedor.php"><li class="navBar"><img class="menu-ico" title="Fornecedor" src="imagens/icons/fornecedor.png"><div class="menu-option">Fornecedor</div></li></a>
  <a href="logout.php"><li class="navBar logout"><img class="menu-ico" title="Sair" src="imagens/icons/logout.png"><div class="menu-option">Sair</div></li></a>
  </ul>
  </div>
  </div>
  <!--End Menu-->
<div class="body-content vertical">
    <div class="container-top">
        <h3 class="title">Estoque(s)</h3>
        <a class="options" href="estoque_adicionar.php">Adicionar</a>
    </div>
    <div class="relatorio-container">
        <?php $query = "SELECT eid, nome,`desc`,endereco,
                        IF (`ativo`=1,'Ativado','Desativado') as status
                        FROM `estoque` order by ativo desc, nome";
            $result = mysqli_query($con,$query);
           ?>
            <table class="tabela" id="tabela">
                <thead>
                    <th>Nome</th>
                    <th>Localização</th>
                    <th>Descrição</th>
                    <th width="50px">Situação</th>
                    <th>Alterar</th>
                    <th>Ação</th>
                </thead>
                <tbody>
               <?php while(@$linha = mysqli_fetch_array($result)){?>
                <tr>
                    <td><?=$linha["nome"]?></td>
                    <td><?=$linha["endereco"]?></td>
                    <td><?=$linha["desc"]?></td>
                    <td><?=$linha["status"]?></td>
                    <td width="40px"><a href="estoque_editar.php?eid=<?=$linha["eid"]?>"><img src="imagens/icons/edit.png" class="icon"></a></td>
                    <td width="40px"><a href="estoque_acao.php?eid=<?=$linha["eid"]?>&acao=<?php if($linha['status']=="Ativado"){echo 'inativar';} else {echo 'ativar';}?>"><img src="imagens/icons/<?php if($linha['status']=="Ativado"){echo "remove.png";} else {echo "check.png";}?>" class="icon"></a></td>
                </tr>
               <?php } ?>
                </tbody>
            </table>
    </div>
</div>
<?php include "./php/data-table.php";?>
</body>
</html>
