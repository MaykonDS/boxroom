
<style type="text/css">
    @keyframes blink {
  50% { opacity: 1; }
  100% { opacity: 0; }
}

body {
    background-color: #151515;
    color: #eee;
    font-family: 'Share Tech Mono', monospace;
    user-select: none;
}
.input-capacha {
     position: absolute;
    top: 60%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-size: 40px;
    letter-spacing: 5px;
    text-transform: uppercase;
    color: #fff;
    background: #151515;
}


.info {
    position: absolute;
    top: 0;
    left: 0;
    p { margin: 10px; }
}

.button {
    background-color: #111;
    border: solid 1px #888;
    padding: 8px 25px;
    font-size: 26px;
    letter-spacing: 2px;
    cursor: pointer;
}
.rerun {
    position: absolute;
    bottom: 15px;
    right: 15px;
}
.start {
    position: absolute;
    top: 36%;
    left: 50%;
    transform: translate(-50%, -50%);
}


span{
color: #ff522b;
}
.luna {
  animation: walk-cycle 1.6s steps(12) infinite;
  background: url(http://stash.rachelnabors.com/img/codepen/tuna_sprite.png) 0 0 no-repeat; 
  height: 200px;
  width: 400px;
}


@keyframes walk-cycle {  
  0% {background-position: 0 0; } 
  100% {background-position: 0 -2391px; } 
}

</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="info">
    <p><span>BoxRoom:</span> Para concluir o seu login basta escutar o captcha e inserir o que foi pedido</p>
</div>


<div class="button start" style="border: none;">
    <div class="luna"></div>
    <i style="font-size:24px;color: #ff522b;" class="fa fa-play"></i> Ouvir Captcha</div>

<input type="tet" name=""class="input-capacha" placeholder="resposta">
<div class=" button rerun hidden" style="
    right: 194px;
">Enviar</div><div class=" button rerun hidden">Voltar</div>
