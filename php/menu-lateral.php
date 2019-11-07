<!--Script com o evento ao clicar no menu ou no icone-->
<link rel="shortcut icon" href="imagens/icons/favicon196x196.png" type="image/png">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

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