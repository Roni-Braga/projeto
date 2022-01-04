<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>saida</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
</head>
<style type="text/css">
.cor{
    border: solid 1px;
    width: 800px;
    border-radius: 10px;
    margin-left:120px;
    background-color:#CDB79E;
    color:#FAEBD7;
    margin-bottom:30px;
   margin-top:20px;
}
h2{
    text-align:center;
    color:white;
}
body{
  background-color: #F5F5DC;
}
   
   </style>
<body>
<?php 
include_once 'conexao.php';
include_once '../nav.bar.php';
$chave = $_SESSION['chave'];
$sql = "SELECT * FROM veiculo   WHERE codigo = $chave";
if($resultado = mysqli_query($conexao,$sql)){
    // tem o item
    if($campo = mysqli_fetch_array($resultado)){
// se achar um registro
$veiculo = $campo['veiculo'] ??'';
$marca = $campo['marca'] ??'';
$modelo= $campo['modelo'] ??'';
$fabricacao = $campo['fabricacao'] ??'';
$quantidade = $campo['quantidade'] ??'';
$foto = $campo['foto'] ??'';
    }

}
 
	
		
?>
<div class="cor">
<h2>Saída de Veículos</h2>
<form action="processa.php" method="POST">

<div class="row" style="width:600px; margin-left:-1px; ">
    <div class="col">
Código do Veículo:
<input type="text" name="codigo" disabled value="<?php echo $chave; ?>" style="width:100px;">

Nome do Veículo:
<input type="text" name="veiculo" disabled value="<?php echo $veiculo; ?>" style="width:100px;">
</div>
</div>
<div class="row" style="float:right; border: solid 1px; margin-right:5px; background-color:white;">
<?php
$diretorio = "../img/";
$resultado = mysqli_query($conexao,$sql);
$dados = mysqli_fetch_object($resultado);
$foto = $diretorio . $dados->foto;
?>    
<div class="col">
  <?php 

echo "<img src='$foto' alt='' width='200px' height='200px'/>";

?>
</div>
</div>
<div class="row" style="float:left;">
    <div class="col">
Marca do Veículo:
<input type="text" name="marca" disabled value="<?php echo $marca; ?>" style="width:100px;">

Modelo do Veículo:
<input type="text" name="modelo" disabled value="<?php echo $modelo; ?>" style="width:100px;">
</div>
</div>
<div class="row" style="float:left;">
    <div class="col">
Data de Fabricação:
<input type="date" name="fabricacao" disabled value="<?php echo $fabricacao; ?>" style="width:130px;">

Quantidade em Estoque:
<input type="number" name="quantidade" disabled value="<?php echo $quantidade; ?>" style="width:100px;">
<input type="hidden" name="quantidade" value="<?php echo $quantidade; ?>">
</div>
</div>


	
<div class="row" style="float:left;">
    <div class="col">
Quantidade de Saída:
<input type="number" name="saida" required style="width:100px;">
</div>
</div>
<button class="waves-effect waves-light btn" style=" margin:10px;margin-left:100px; ">Saída</button>
</form>
</div>


<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
    <?php
include_once '../img/rodape.php';

?>
    </body>
    </html>