<!DOCTYPE html>
<html>   
    <title></title>
    <head></head>
    <style type="text/css">
.i{
	margin-left: 320px;
}

</style>
    <body>
<?php

if (!isset($_SESSION['usuario'])) {
  // quando não tem um usuario logado, ele vai para o login.php
  
}





?>
    <nav>   
    <div class="nav-wrapper">
      <a href="#!" class="brand-logo"><i class="material-icons">cloud</i>SCV</a>
      <i class="i"> Sistema de Controle de Veiculos</i>
      <ul class="right hide-on-med-and-down" style="margin-top:-63px;">
  
        <li><a href="catalogo.php"><i class="material-icons">search</i></a></li>
        <li><i> Usuário: <?php echo $_SESSION['usuario']; ?></i></li>
        <li><a href="../fechar.php">Sair</i></a></li>
      </ul>
    </div>
  </nav>
<?php


?>




    </body>
    </html>
