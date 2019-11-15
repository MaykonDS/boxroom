<?php
require('verify_session.php');
include "./php/menu-lateral.php";
?>

<style>
	.box-content {
		height: 70px;
		width: auto;
		transition-duration: .3s;
		color: transparent;
		overflow-y: hidden;
	}
	.box-item {
		height: 70px;
		width: auto;
	}
	.box-description {
		height: 30px;
		width: 100%;
		text-align: center;
		background-color: black;
	}
	.box-content:hover {
		transition-duration: .3s;
		color: white;
		height: 100px;
		overflow-y: visible;
	}

</style>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>Produtos</title>
    <link rel='stylesheet' type='text/css' href='style/geral.css'>
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
<div class="body-content">
<!-- RELATORIO -->
<div class="relatorio-container">

<table class="tabela" id="tabela">
	<thead>
		<tr>
			<th><h1>User</h1></th>
			<th><h1>Email</h1></th>
			<th><h1>Setor</h1></th>
			<th><h1>Tipo</h1></th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>leo</td>
			<td>leo@leozin.com</td>
			<td>fuqhf3uh33734734t634g46bshbhdwgy</td>
			<td>192.123.0.123</td>
		</tr>
			<tr>
			<td>julin</td>
			<td>leo@leozin.com</td>
			<td>fuqhf3uh33734734t634g46bshbhdwgy</td>
			<td>192.123.0.123</td>
		</tr>
		</tr>
			<tr>
			<td>maykao</td>
			<td>leo@leozin.com</td>
			<td>fuqhf3uh33734734t634g46bshbhdwgy</td>
			<td>192.123.0.123</td>
		</tr>
			<tr>
			<td>leandro</td>
			<td>leo@leozin.com</td>
			<td>fuqhf3uh33734734t634g46bshbhdwgy</td>
			<td>192.123.0.123</td>
		</tr>
	</tbody>
</table>
</div>

<?php include "./php/data-table.php"; ?>

</div>
</body>
</html>
