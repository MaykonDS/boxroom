<!DOCTYPE html>
<html>
<head>
    <?php
    require('verify_session.php');
    require('./php/verify_session_admin.php');
    include("config.php");
    ?>
    <meta charset='utf-8'>
    <title>Estoque</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='style/geral.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='style/formulario.css'>
</head>
<body>
<?php include "./php/menu-lateral.php"; ?>
<div class="body-content vertical">
  <div class="container-top" style="border-radius: 0; width: auto; margin-left: 0">
      <h3 class="title">Usuários</h3>
      <a class="options" href="usuario_acao.php?acao=adicionar">Cadastrar Novo Usuário</a>
  </div>
    <div class="relatorio-container">
        <?php $query = "SELECT uid, usuario.nome, email, IF (is_admin,'Admin','Usuário') as perm, setor.nome as setor_nome FROM `usuario`
                        INNER JOIN setor ON sid = setor_id order by nome desc";
            $result = mysqli_query($con,$query);
           ?>
            <table class="tabela" id="tabela">
                <thead>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Setor</th>
                    <th>Permissão</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </thead>
                <tbody>
               <?php while(@$linha = mysqli_fetch_array($result)){?>
                <tr>
                    <td><?=$linha["nome"]?></td>
                    <td><?=$linha["email"]?></td>
                    <td><?=$linha["setor_nome"]?></td>
                    <td><?=$linha["perm"]?></td>
                    <td width="40px"><a href="usuario_acao.php?pos=<?=$linha["uid"]?>&acao=editar"><img src="imagens/icons/edit.png" class="icon"></a></td>
                    <td width="40px"><a href="usuario_delete.php?pos=<?=$linha["uid"]?>"><img src="imagens/icons/remove.png" class="icon"></a></td>
                </tr>
               <?php } ?>
                </tbody>
            </table>
    </div>
</div>
<?php include "./php/data-table.php";?>
</body>
</html>
