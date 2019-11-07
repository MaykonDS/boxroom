
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
    padding: 8px 66px;
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
span{
    color: #c6c6c6;
    font-weight: bold;
}
.ouvir-text {
    margin-left: calc(50% - 86px);
    font-size:23px;
    color: #c8c8c8;
    font-style: default;
    height: 40px;
    padding: 6px;
    border-radius: 5px;
}
.ouvir-text:hover {
    text-decoration: underline;
    cursor: pointer;
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
}
@keyframes walk-cycle {  
    0% {background-position: 0 0; } 
    100% {background-position: 0 -2391px; } 
}

</style>

<html>
    <head>
        <link rel="shortcut icon" href="imagens/icons/favicon196x196.png" type="image/png">
        <link rel="stylesheet" type="text/css" href="style/geral.css">
        <title>BoxRoom - Captcha</title>
        </head>
    <body>
        <a href="signin.php"><div class="previous-button"></div></a>
        <div class="info">
        <span>BoxRoom:</span> Para concluir o seu login basta escutar o captcha e inserir o que foi pedido.
        </div>

       <div class="space"></div>     
       
        <div class="gradient-border" style="width: 410px; height: auto; margin: auto; margin-bottom: 50">
        <div class="luna"></div>
        <div class="ouvir-text">OUVIR CAPTCHA</div><br>
        <input type="text" name="" placeholder="RESPOSTA" class="input-resposta">
        </div>
        
        
        <div class="button" style="margin-left: calc(50% - 105px);">ENVIAR</div>

        
    </body>
</html>
