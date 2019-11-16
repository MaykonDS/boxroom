<!DOCTYPE html>
<html>
<head>
    <?php
    require('verify_session.php');
    include("config.php");
    include("./php/functions.php");
    ?>
    <meta charset='utf-8'>
    <title>Produtos</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='style/geral.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='style/formulario.css'>
</head>
<body>

<?php include "./php/menu-lateral.php"; ?>

<div class="body-content vertical">
    <div class="container-top">
        <h3 class="title">Produtos</h3>
        <a class="options" href="produto_acao.php?acao=adicionar">Cadastrar Produtos</a>
    </div>
    <div class="relatorio-container">
        <?php $query = "SELECT pid, produto.nome, desc_produto, quant, tipo.nome as tipo, ativo FROM produto
												INNER JOIN tipo ON tid = tipo_id
                        order by produto.nome asc";
            $result = mysqli_query($con,$query);
           ?>
            <table class="tabela" id="tabela">
                <thead>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Quantidade</th>
                    <th>Tipo</th>
                    <th>Alterar</th>
                    <th>Ação</th>
                </thead>
                <tbody>
              <!-- Realiza o Select de todos os fornecedores cadastrados -->
               <?php while(@$linha = mysqli_fetch_array($result)){?>
                <tr>
                    <td><?=$linha["nome"]?></td>
                    <td><?=$linha["desc_produto"]?></td>
                    <td><?=$linha["quant"]?></td>
                    <td><?=$linha['tipo'];?></td>
                    <td width="40px"><a href="produto_acao.php?pos=<?=$linha["pid"]?>&acao=editar"><img src="imagens/icons/edit.png" class="icon"></a></td>
                    <td width="40px"><a href="produto_inativar_ativar.php?pos=<?=$linha["pid"]?>&acao=<?php IF($linha['ativo']){ echo 'inativar';} else {echo 'ativar';}?>">
																		 <img src="imagens/icons/<?php IF($linha['ativo']){echo 'remove.png';} else {echo 'check.png';}?>" class="icon"></a></td>
                </tr>
               <?php } ?>
                </tbody>
            </table>
    </div> <!-- End relatorio -->
    <div class="background-boxroom">
      <?php $query = "SELECT eid, nome FROM estoque WHERE ativo=1 order by nome asc";
          $result = mysqli_query($con,$query);
          while(@$linha = mysqli_fetch_array($result)){
         ?>
      <div class="container-boxroom">
        <div class="container-boxroom top"><?=$linha['nome'];?> <a href="produto_config_estoque.php?pos=<?=$linha['eid'];?>"><img src="imagens/icons/settings.png"></a></div>
        <div class="contatiner-boxroom middle">
          <div class="title">Situação:</div>
          <div class="op">Disponiveis: </div>
					<div class="op">Acabando: </div>
					<div class="op">Crítico: </div>
        </div>
      </div>
      <?php } ?>

    </div>
</div>
<?php include "./php/data-table.php";?>
</body>
</html>
