<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>alterar</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <style type="text/css">
.cor{
    border: solid 1px;
    width: 800px;
    border-radius: 10px;
    margin-left:120px;
    background-color:#CDB79E;
    color:#FAEBD7;
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
</head>
<body>

<?php 

include_once 'conexao.php';
include_once '../nav.bar.php';
$chave = $_SESSION['chave'];

$sql = "SELECT * FROM veiculo WHERE codigo = $chave";

$resultado = mysqli_query($conexao,$sql);

$campos = mysqli_fetch_array($resultado);

$veiculo = $campos['veiculo'] ??'';
$marca = $campos['marca'] ?? '';
$modelo = $campos['modelo'] ?? '';
$fabricacao = $campos['fabricacao'] ?? '';
$quantidade = $campos['quantidade']??'';
$foto = $campos['foto'] ?? '';

	


// buscar na tabela de veiculos, o veiculo que o codigo seja igual a minha $chave

// mostrar o veiculo se existir

// se nao, dizer que não tem esse veiculo

?>

<div class="cor">
<h2>Alterar Veículos</h2>


<form action="processa.php" method="POST" enctype="multipart/form-data">

<div class="row" style="width:600px; margin-left:-1px;">
    <div class="col">
    Código do Veículo:		
	<input type="text" name="codigo" disabled value="<?php echo $chave; ?>" style="width:100px;">
	Nome do Veículo:
    <input id="input_text" type="text" name="veiculo"  value="<?php echo $veiculo;?>" style="width:100px;"></td></tr>
</div>
</div>
<div class="row" style="float:right; border: solid 1px; margin-right:5px; background-color:white;">
<div class="col">
<?php

$diretorio = "../img/";
$resultado = mysqli_query($conexao,$sql);
$dados = mysqli_fetch_object($resultado);
$foto = $diretorio . $dados->foto;

?>
<?php
echo "<img src='$foto' alt='' width='200px' height='200px'/>";

?>

</div>
</div>
<div class="row" style="float:left;">
    <div class="col">
Marca do Veículo:
<input type="text" name="marca"   value="<?php echo $marca;?>" style="width:100px;">
Modelo do Veículo:
<input type="text" name="modelo"  value="<?php echo $modelo;?>" style="width:100px;">
</div>
</div>
<div class="row" style="float:left;">
    <div class="col">
Data de Fabricação:
<input type="date" name="fabricacao"  value="<?php echo $fabricacao;?>"style="width:130px;">
Quantidade em Estoque:
<input type="number" name="quantidade"  value="<?php echo $quantidade;?>" style="width:100px;">
</div>
</div>

<div class="row">
    <div class="col">

<div class="file-field input-field">
      <div class="btn">
     
		
			
			
        <span>Imagem</span>
        <input type="file" name="foto" value="<?php echo $foto; ?>" >       
        <input type="hidden" name="nomeantigo" value="<?php echo $foto; ?>">
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text" placeholder="Selecione um arquivo" value="<?php echo $foto;?>">
      </div>
    </div>
</div>
<button class="waves-effect waves-light btn" style=" margin:10px;margin-left:100px; ">Alterar</button>
</div>


	
</form>
</div>
<br>
<br>




<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>

<?php

include_once '../img/rodape.php';

?>
</body>
</html>