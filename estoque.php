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
<div class="menu"><div class="menu-option"><h3>BoxRoom</h3></div>
	<div class="menu-content" style="margin-left: -38px">
	<ul>
		<li class="navBar"><img class="menu-ico" title="Produtos" src="imagens/icons/shopping-cart.png"><div class="menu-option">Produtos</div></li>
		<li class="navBar"><img class="menu-ico" title="Estoque" src="imagens/icons/box.png"><div class="menu-option">Estoque</div></li>
		<li class="navBar"><img class="menu-ico" title="Vendas" src="imagens/icons/sales.png"><div class="menu-option">Vendas</div></li>
		<li class="navBar"><img class="menu-ico" title="Fornecedor" src="imagens/icons/fornecedor.png"><div class="menu-option">Fornecedor</div></li>
	</ul>
	</div>
</div>
<!--End Menu-->
<div class="body-content vertical">
    <div class="container-top">
        <h3 class="title">Estoque(s)</h3>
        <div class="options">Adicionar</div>
    </div>
    <div class="relatorio-container">
        <?php $query = "SELECT nome,`desc`,endereco,`status` FROM `estoque` WHERE eid>0 ";
            $result = mysqli_query($con,$query);
           ?>
            <table class="tabela" id="tabela">
                <thead>
                    <th>Nome</th>
                    <th>Endereço</th>
                    <th>Descrição</th>
                    <th>Alterar / Excluir</th>
                </thead>
                <tbody>
               <?php while(@$linha = mysqli_fetch_array($result)){?>
                <tr>
                    <td><?=$linha["nome"]?></td>
                    <td><?=$linha["endereco"]?></td>
                    <td><?=$linha["desc"]?></td>
                </tr>
               <?php } ?>
                </tbody>
            </table>
    </div>
</div>
<?php include "./php/data-table.php";?>
</body>
</html>   