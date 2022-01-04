<!DOCTYPE html>
<html>
    <title></title>
    <head>
    <meta charset="utf-8">
	<title>alterar</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <script type = "text/javascript" src = "https://code.jquery.com/jquery-2.1.1.min.js"></script>           
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <style type="text/css">


    </style>
    <body style=" background-color:#FAEBD7;">
   
        <?php
include_once 'conexao.php';
include_once '../nav.bar.php';




        ?>
      

<div class="container">
<h3 style="text-align:center; color:#778899">Catalogo de Veiculos</h3>
<div class="move" style="margin-top:-100px; margin-bottom:-46px;" >
<div class="carousel" id="demo-carousel" >
    <a class="carousel-item" href="#one!"><p style="text-align:center;">FORD FOCUS</p><img src="../img/focus.jpg"></a>
    <a class="carousel-item" href="#two!"><p style="text-align:center;">CHEVROLET CAPTIVA</p><img src="../img/captiva.jpg"></a>
    <a class="carousel-item" href="#three!"><p style="text-align:center;">HONDA CIVIC</p><img src="../img/civic.jpg"></a>
    <a class="carousel-item" href="#four!"><p style="text-align:center;">FIAT MOBI</p><img src="../img/mobi.jpg"></a>
    <a class="carousel-item" href="#five!"><p style="text-align:center;">FIAT PALIO</p><img src="../img/palio.jpg"></a>
    <a class="carousel-item" href="#five!"><p style="text-align:center;">NISSAN VERSA</p><img src="../img/nissan.jpg"></a>
  </div>
</div>
</div>
<script>
$(document).ready(function(){
      $('#demo-carousel').carousel();
    });
</script>
</body> 
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <script type="text/javascript" src="js/materialize.min.js"></script>
  
<?php

include_once '../img/rodape.php';
?>
</html>
