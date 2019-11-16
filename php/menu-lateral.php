<!--Script com o evento ao clicar no menu ou no icone-->
<link rel="shortcut icon" href="imagens/icons/favicon196x196.png" type="image/png">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Menu Lateral-->
<div class="menu-icon"></div>
<div class="menu"><a href="home.php"><div class="menu-option h3"><h3>BoxRoom</h3></div></a>
<div class="menu-content" style="margin-left: -38px">
<ul>
  <?php
    $perm = $_SESSION['is_admin'];
    $display = "none";
    IF ($perm=='admin') {
      $display = "";
    }
   ?>
<a href="produtos.php"><li class="navBar"><div class="menu-ico produtos" title="Produtos"><div class="menu-option">Produtos</div></div></li></a>
<a href="estoque.php"><li class="navBar"><div class="menu-ico estoque" title="Estoque"><div class="menu-option">Estoque</div></div></li></a>
<a href="vendas.php"><li class="navBar"><div class="menu-ico vendas" title="Vendas"><div class="menu-option">Vendas</div></div></li></a>
<a href="fornecedor.php"><li class="navBar"><div class="menu-ico fornecedor" title="Fornecedor"><div class="menu-option">Fornecedor</div></div></li></a>
<a href="usuarios.php"><li class="navBar" style="display: <?=$display?>"><div class="menu-ico usuarios" title="Usuários"><div class="menu-option">Usuários</div></div></li></a>
<a href="comunicados.php"><li class="navBar" style="display: <?=$display?>"><div class="menu-ico comunicados" title="Comunicados"><div class="menu-option">Comunicados</div></div></li></a>
<a href="logout.php"><li class="navBar logout"><div class="menu-ico logout" title="Sair"><div class="menu-option">Sair</div></div></li></a>
</ul>
</div>
</div>
<!--End Menu-->

<script type="text/javascript">
$(document).ready(function(){
  $('.menu-icon,.menu').click(function(){
  	$('.menu').toggleClass('menu-open');
  	$('.navBar').toggleClass('navBar-open');
  	if($('.menu-option').is(':hidden')){
  	$('.menu-option').delay(50).fadeToggle(10);
  } else {
  	$('.menu-option').toggle();
  }
  	$('.menu-icon').toggleClass('menu-icon-rotated');
  });

  $('.body-content').click(function(){
	if($('.menu-option').is(':visible')){
		$('.menu').toggleClass('menu-open');
		$('.navBar').toggleClass('navBar-open');
		$('.menu-icon').toggleClass('menu-icon-rotated');
		$('.menu-option').toggle();
	}
  });
});
</script>
