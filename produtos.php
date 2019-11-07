<?php require('verify_session.php');?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>Produtos</title>
    <?php include "./php/menu-lateral.php";?>
    <link rel='stylesheet' type='text/css' href='style/geral.css'>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style/datatable.css">
</head>
<body>
<!-- Menu Lateral-->
<div class="menu-icon"></div>
<div class="menu"><div class="menu-option" ><h3>Produtos</h3></div>
	<div class="menu-content" style="margin-left: -38px">
	<ul>
		<li class="navBar"><img class="menu-ico" title="Produtos" src="imagens/icons/shopping-cart.png"><div class="menu-option">Produtos</div></li>
		<li class="navBar"><img class="menu-ico" src="imagens/icons/box.png"><div class="menu-option">Estoque</div></li>
		<li class="navBar"><img class="menu-ico" src="imagens/icons/sales.png"><div class="menu-option">Vendas</div></li>
		<li class="navBar"><img class="menu-ico" src="imagens/icons/fornecedor.png"><div class="menu-option">Fornecedor</div></li>
	</ul>
	</div>
</div><!--End Menu-->
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
<script type="text/javascript">
$(document).ready(function () {
$('#tabela').DataTable({
	  "language": {
            "lengthMenu": "Mostrar _MENU_ linhas",
            "zeroRecords": "Nada Encontrado ;(",
            "info": "Pagina _PAGE_ de _PAGES_",
            "search": "Pesquisa:",
            "infoEmpty": "Nenhum resultado encontrado",
            "infoFiltered": "(use o filtro novamente)",
             "paginate": {
        "first":      "Primeiro",
        "last":       "Ultimo",
        "next":       "Proximo",
        "previous":   "Antes"
    }
        }
});
});
</script>



</div>
</body>
</html>