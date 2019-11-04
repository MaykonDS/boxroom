<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="style/datatable.css">
<style type="text/css">
@import url(https://fonts.googleapis.com/css?family=Open+Sans:300,400,700);

body {
  font-family: 'Open Sans', sans-serif;
  font-weight: 300;
  line-height: 1.42em;
  color:#A7A1AE;
  background-color:#1D1F20;
}

h1 {
  font-size:3em; 
  font-weight: 300;
  line-height:1em;
  text-align: center;
}

.orange { 
	color: #e85c0a; 
}

.tabela th h1 {
	  font-weight: bold;
	  font-size: 1em;
  text-align: left;
  color: #e85c0a;
}

.tabela td {
	  font-weight: normal;
	  font-size: 1em;
  -webkit-box-shadow: 0 2px 2px -2px #0E1119;
	   -moz-box-shadow: 0 2px 2px -2px #0E1119;
	        box-shadow: 0 2px 2px -2px #0E1119;
}

.tabela {
	  text-align: left;
	  overflow: hidden;
	  width: 80%;
	  margin: 0 auto;
  display: table;
  padding: 0 0 8em 0;
}

.tabela td, .tabela th {
	  padding-bottom: 2%;
	  padding-top: 2%;
  padding-left:2%;  
}

.tabela tr:nth-child(odd) {
	  background-color: #323C50;
}

.tabela tr:nth-child(even) {
	  background-color: #2C3446;
}

.tabela th {
	  background-color: #1d1f20;
}

.tabela tr:hover {
   background-color: #464A52;
-webkit-box-shadow: 0 6px 6px -6px #0E1119;
	   -moz-box-shadow: 0 6px 6px -6px #0E1119;
	        box-shadow: 0 6px 6px -6px #0E1119;
}

.tabela td:hover {
background-color: rgb(44, 52, 70);
    color: #bdbdb1;
    transition-duration: 0.4s;
    transition-property: all;
}
/* pensa em todas as resoluções de tela (deixar pro maykon) */
@media (max-width: 800px) {
.tabela td:nth-child(4),
.tabela th:nth-child(4) { display: none; }
}
</style>

<body>
<h1>&lsaquo; Relatorio &rsaquo; <span class="orange">Usuarios</pan></h1>
<div class="container">

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
</body>
