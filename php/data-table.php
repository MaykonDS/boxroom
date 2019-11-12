<!--Todas tabelas tem que possuir o ID = "tabela" -->
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="style/datatable.css">

<style>
.relatorio-container {
  font-family: 'Calibri';
  font-weight: 100;
  line-height: 1.42em;
  color:rgb(151, 151, 151);
  background-color:#1D1F20;
  width: 90%;
  margin:auto;
  color: white;
}
input {
  border-radius: 5px;
  border: 0px;
  padding: 3px;
  color: #373737;
}
.dataTables_wrapper .dataTables_paginate .paginate_button.current, .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
  border: 0;
  border-radius: 40px;
}
select {
  border-radius: 5px;
  border: 0;
  padding: 2px;
  color: #373737;
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
  color: white;
}

.tabela td {
	  font-weight: normal;
	  font-size: 1em;
  -webkit-box-shadow: 0 2px 2px -2px #0E1119;
	   -moz-box-shadow: 0 2px 2px -2px #0E1119;
          box-shadow: 0 2px 2px -2px #0E1119;
    color: #d0d0d0;
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
	  background-color: rgb(28, 30, 31);
}

.tabela tr:nth-child(even) {
	  background-color: rgb(34, 36, 37);
}

.tabela th {
	  background-color: #1D1F20;
}

.tabela tr:hover {
  background-color: rgb(23, 25, 26);
  -webkit-box-shadow: 0 6px 6px -6px #0E1119;
	-moz-box-shadow: 0 6px 6px -6px #0E1119;
  box-shadow: 0 6px 6px -6px #0E1119;
}

.tabela td:hover {
  background-color: crimson;
  color: white;
  transition-duration: 0.4s;
  transition-property: all;
}
/* pensa em todas as resoluções de tela (deixar pro maykon) */
@media (max-width: 800px) {
.tabela td:nth-child(4),
.tabela th:nth-child(4) { display: none; }
}
</style>

<script type="text/javascript">
$(document).ready(function () {
$('#tabela').DataTable({
	  "language": {
            "lengthMenu": "Mostrar _MENU_ linhas",
            "zeroRecords": "Nada Encontrado ;-;",
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

