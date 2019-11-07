<?php

session_start(); //iniciamos a sess�o que foi aberta
session_unset(); //limpamos as variaveis globais das sess�es
session_destroy(); //pei!!! destruimos a sess�o ;)

header("Location: signin.php");
?>