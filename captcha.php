
<style type="text/css">
    @keyframes blink {
    50% { opacity: 1; }
    100% { opacity: 0; }
}

body {
    user-select: none;
    font-family: 'Calibri';
    font-weight: 100;
    color: #c6c6c6;
    height: 100%;
}
.info {
    position: relative;
    top: 50px;
    text-align: center;
    font-size: 20px;
}
.button {
    padding: 6px;
    font-size: 26px;
    letter-spacing: 2px;
    cursor: pointer;
    width: 100px;
    border-radius: 10px;
    display: inline;
    border: 1px solid white;
    font-size: 19px;
}
.button:hover {
    opacity: .5;
    cursor: pointer;
}
.space {
    height: 100px;
}
.start {
    top: 36%;
    left: 40%;
    transform: translate(-50%, -50%);
}
span {
    color: #c6c6c6;
    font-weight: bold;
}
.ouvir-text {
    margin: auto;
    width: 65px;
    height: auto;
}
.ouvir-text:hover {
    color: #7E0000;
}
.box-captcha {
    border-radius: 10px;
    box-shadow: 0px 0px 10px 1px black;
}
.input-resposta {
    width: 80%;
    height: 40px;
    background-color: transparent;
    border: 0.5px solid white;
    text-align: center;
    margin-top: 15px;
    margin-bottom: 12px;
    color: white;
    border-radius: 5px;
    text-transform: uppercase;
    margin-left: calc(50% - 169px);
}
.luna {
    animation: walk-cycle 1.6s steps(12) infinite;
    background: url(http://stash.rachelnabors.com/img/codepen/tuna_sprite.png) 0 0 no-repeat;
    height: 200px;
    width: 400px;
    margin-bottom: 10px;
}
@keyframes walk-cycle {
    0% {background-position: 0 0; }
    100% {background-position: 0 -2391px; }
}

</style>

<?php
    include "config.php";
    $select =   "SELECT cid, source FROM capcha ORDER BY RAND() limit 1";
    $result_select = mysqli_query($con, $select);

    if (@$_SESSION['id_usuario']!=null){
      header("Location: logout.php");
    }
?>

<html>
    <head>
        <link rel="shortcut icon" href="imagens/icons/favicon196x196.png" type="image/png">
        <link rel="stylesheet" type="text/css" href="style/geral.css">
        <title>BoxRoom - Captcha</title>
        </head>
    <body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <?php
            if (isset($_POST['enviar'])) {
                $cid = $_POST['audio_id'];
                $resp = strtoupper($_POST['resposta']);
                $query = "SELECT resposta FROM capcha WHERE cid = $cid AND resposta like '$resp'";
                echo $query;
                $result = mysqli_query($con, $query);
                if (@mysqli_num_rows($result)>0){
                    echo "TEM RESULTADOOOOO";
                } else {
                    echo "ERRROU";
                }
            }
        ?>

    <form action="#" method="post">
    <audio id="audio">
  <?php   while ($coluna=mysqli_fetch_array($result_select)) {?>
    <source src="<?= $coluna['source'] ?>" type="audio/mpeg">
    <input type="hidden" value="<?=$coluna['cid']?>" name="audio_id">
    Seu navegador não possui suporte ao elemento audio
  <?php } ?>
    </audio>
        <a href="signin.php"><div class="previous-button"></div></a>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <div class="info">
        <span>BoxRoom:</span> Para concluir o seu login basta escutar o captcha e inserir o que foi pedido.
        </div>

       <div class="space"></div>

        <div class="gradient-border" style="width: 410px; height: auto; margin: auto; margin-bottom: 50">
        <div class="luna"></div>
        <div class="ouvir-text"><i style="font-size:24px;color: crimson; cursor: pointer; margin-right: 25px" class="fa fa-play" onclick="play()"></i><i class="fa fa-pause" style="font-size:24px;color: crimson; cursor: pointer" aria-hidden="true"  onclick="pause()"></i></div><br>
        <input type="text" name="resposta" placeholder="RESPOSTA" class="input-resposta">
        </div>
        <input type="submit" value="ENVIAR" name="enviar" class="button" style="margin-left: calc(50% - 55px);" />
        </form>
    </body>
</html>

<script>

    audio = document.getElementById('audio');

    function play(){
        audio.play();
    }

    function pause(){
        audio.pause();
    }

    function stop(){
        audio.pause();
        audio.currentTime = 0;
    }

    function aumentar_volume(){
        if( audio.volume < 1)  audio.volume += 0.1;
    }

    function diminuir_volume(){
        if( audio.volume > 0)  audio.volume -= 0.1;
    }

    function mute(){
        if( audio.muted ){
            audio.muted = false;
        }else{
            audio.muted = true;
        }
    }

</script>
