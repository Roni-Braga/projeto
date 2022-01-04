<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>excluir</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<style type="text/css">
h2{
    text-align:center;
    color: white;
    margin-top:-5px;
}
.cor{
    border: solid 1px;
    width: 800px;
    border-radius: 10px;    
    background-color:#CDB79E;
    color:#FAEBD7;
    margin-left:100px;
    margin-top:20px;
    margin-bottom:30px;
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

// pesquisar na tabela de veiculos para saber se tem um veiculo com o codigo igual a $chave

// se achar, mostrar os dados achados

// se não achar, dizer que não achou
$sql = "SELECT * FROM veiculo WHERE codigo = $chave";

$resultado = mysqli_query($conexao,$sql);

$campos = mysqli_fetch_array($resultado);

$veiculo = $campos['veiculo'] ??'';
$marca = $campos['marca'] ?? '';
$modelo = $campos['modelo'] ?? '';
$fabricacao = $campos['fabricacao'] ?? '';
$quantidade = $campos['quantidade']??'';
$foto = $campos['foto'] ?? '';
?>

<div class="cor">
<h2>Excluir Veículos</h2>

<form action="processa.php" method="POST" enctype="multipart/form-data">
<div class="row" style="width:600px; margin-left:-1px; ">
    <div class="col">
Código do Veículo:
<input type="text" name="codigo" disabled value="<?php echo $chave; ?>" style="width: 100px;">
Nome do Veículo:
<input type="text" name="veiculo" disabled value="<?php echo $veiculo; ?>" style="width: 100px;  ">
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
<input type="text" name="marca" disabled value="<?php echo $marca; ?>" style="width: 100px;">
Modelo do Veículo:
<input type="text" name="modelo" disabled value="<?php echo $modelo; ?>" style="width: 100px;">
</div>
</div>
<div class="row">
    <div class="col">
Data de Fabricação:
<input type="date" name="fabricacao" disabled value="<?php echo $fabricacao; ?>" style="width: 130px;">
Quantidade em Estoque:
<input type="number" name="quantidade" disabled value="<?php echo $quantidade; ?>" style="width: 100px;">
</div>
<button class="waves-effect waves-light btn" style=" margin:10px;margin-left:250px;">Excluir</button>
</div>





	
</form>

</div>






<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
<?php
include_once '../img/rodape.php';

?>
</body>
</html>