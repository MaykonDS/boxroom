<!DOCTYPE html>
<html>
<head>
    <?php
    require('verify_session.php');
    include("config.php");
    ?>
    <meta charset='utf-8'>
    <title>Fornecedor</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='style/geral.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='style/formulario.css'>
</head>
<body>

<?php include "./php/menu-lateral.php"; ?>

<div class="body-content vertical">
    <div class="container-top">
        <h3 class="title">Fornecedor(es)</h3>
        <a class="options" href="fornecedor_adicionar.php">Adicionar</a>
    </div>
    <div class="relatorio-container">
        <?php $query = "SELECT fid, nome, nome_fant,`cnpj-cpf` FROM fornecedor order by nome desc";
            $result = mysqli_query($con,$query);
           ?>
            <table class="tabela" id="tabela">
                <thead>
                    <th>Nome</th>
                    <th>Nome Fantasia</th>
                    <th>CPF/CNP-J</th>
                    <th width="50px">Visualizar</th>
                    <th>Alterar</th>
                    <th>Excluir</th>
                </thead>
                <tbody>
               <?php while(@$linha = mysqli_fetch_array($result)){?>
                <tr>
                    <td><?=$linha["nome"]?></td>
                    <td><?=$linha["nome_fant"]?></td>
                    <td><?=$linha["cnpj-cpf"]?></td>
                    <td width="40px"><a href="fornecedor_visualizar.php?pos=<?=$linha["fid"]?>"><img src="imagens/icons/eye.png" style="width:20px ;height:20px ;" class="icon"></a></td>
                    <td width="40px"><a href="fornecedor_editar.php?pos=<?=$linha["fid"]?>"><img src="imagens/icons/edit.png" class="icon"></a></td>
                    <td width="40px"><a href="fornecedor_delete.php?pos=<?=$linha["fid"]?>"><img src="imagens/icons/remove.png" class="icon"></a></td>
                </tr>
               <?php } ?>
                </tbody>
            </table>
    </div>
</div>
<?php include "./php/data-table.php";?>
</body>
</html>
