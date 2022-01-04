<!DOCTYPE HTML>
<html>
    <meta charset="utf-8">
    <title></title>
    <head></head>
    <style type="text/css">

.move{
  margin-left: 200px;
  
  margin: 0 auto;
  width:750px;
  margin-top: 70px;
  border-radius: 10px;
  padding:10px;
  background-color:#CDB79E;
 margin-bottom:105px; 
 
}
body{
  background-color: #F5F5DC;
}
.i{
	margin-left: 320px;
}
.catalogo{
  margin-left:200px;
}



    </style>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css"  media="screen,projection"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <body>
    <?php
 
 include_once 'materialize/conexao.php';

 if (!isset($_SESSION['usuario'])) {
  // quando não tem um usuario logado, ele vai para o login.php
  header('Location: materialize/login.php');
}
$acao = $_GET['acao']??'';
$codigo = $_GET['codigo']??'';


$_SESSION['chave'] = $codigo;

if($acao == 'cadastra'){
$_SESSION['acao'] = $acao;
header("Location:./img/cadastra.php");
exit();
}if($acao == 'altera'){
$_SESSION['acao'] = $acao;
header("Location:materialize/altera.php");
exit();
}if($acao == 'excluir'){
$_SESSION['acao'] = $acao;
header("Location:materialize/excluir.php");
exit();
}if($acao =='entrada'){
$_SESSION['acao'] = $acao;
header("Location:materialize/entrada.php");
exit();
}if($acao =='saida'){
$_SESSION['acao'] = $acao;
header("Location:materialize/saida.php");
exit();
}

?>
    <nav>   
    <div class="nav-wrapper">
  <a href="#!" class="brand-logo"><i class="material-icons">cloud</i>SCV</a>
  <i class="i"> Sistema de Controle de Veiculos</i>
  <ul class="right hide-on-med-and-down" style="float:right; margin-top:-63px;">
  <li><a href="materialize/catalogo.php"><i class="material-icons">search</i></a></li>
  <li><i> Usuário: <?php echo $_SESSION['usuario']; ?></i></li>
  
  <li><a href="fechar.php">Sair</i></a></li>
      </ul>
    </div>
  </nav>
  
<div class="move">
<form action="index.php" method="GET">

<button  style="margin-left:55px;"class="waves-effect waves-light btn " name="acao" value='cadastra' >Cadastrar</button>
<button	class="waves-effect waves-light btn" name="acao" value='altera'>Alterar</button>
<button class="waves-effect waves-light btn" name="acao" value='excluir'>Excluir</button>
<button class="waves-effect waves-light btn" name="acao" value='entrada'>Entrada</button>
<button class="waves-effect waves-light btn" name="acao" value='saida'>Saída</button>

<p >Codigo do Veiculo:
<input id="input_text" data-length="7" type="text"  name="codigo" maxlength="7" size="7" required style="width:400px;"></p>
<p class="catalogo"> * Clique no <i class="material-icons">search</i> para ver nosso Catalogo de Veiculos</p>
</div>

</form>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="materialize/js/materialize.min.js"></script>
    

                     
    </body>
    <?php
include_once 'img/rodapehome.php';


?>
    </html>