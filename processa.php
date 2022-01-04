<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>processar</title>
</head>
<body>

<?php


include_once '../materialize/conexao.php';

$acao = $_SESSION['acao'];
$chave = $_SESSION['chave'];



if ($acao == 'cadastra') {
	// cadastra na tabela de veiculos (insert)
	$veiculo = $_POST['veiculo'];
	$marca = $_POST['marca'];
	$modelo = $_POST['modelo'];
	$fabricacao = $_POST['fabricacao'];
	$quantidade = $_POST['quantidade'];
	$foto = $_FILES['foto']['name'];
	$diretorio = "../img/";
	$_UP['pasta'] = $diretorio;

	$sql = "INSERT INTO veiculo (codigo, veiculo, marca, modelo, fabricacao, quantidade, foto)
	 VALUES ('$chave' ,'$veiculo' ,'$marca' ,'$modelo' ,'$fabricacao' ,'$quantidade' ,'$foto')";

	if (mysqli_query($conexao,$sql)) {
		if(move_uploaded_file($_FILES['foto']['tmp_name'],$_UP['pasta'].$foto)){
			
			}
			
		// deu certo
		echo "<script>alert('Registro incluido!!!');</script>";
		echo "<script> document.location.href='../index.php';</script>";
	}
	else
	{
		// deu errado
		echo "<script>alert('Erro: não consegui incluir');</script> " . $sql;
	}
}

if ($acao == 'altera') {
	// alterar na tabela de veiculos (update)
		
	$veiculo = $_POST['veiculo'];
	$marca = $_POST['marca'];
	$modelo = $_POST['modelo'];
	$fabricacao = $_POST['fabricacao'];
	$quantidade = $_POST['quantidade'];
	$foto = $_FILES['foto']['name'];
	$diretorio = "../img/";
	$_UP['pasta'] = $diretorio;
	
	if($_FILES['foto']['name'] == ''){
 $foto = $_POST['nomeantigo'];
	}else{
		$foto = $_FILES['foto']['name'];
	}
	$sql = "UPDATE veiculo SET veiculo='$veiculo',marca='$marca',modelo='$modelo',
	fabricacao='$fabricacao',quantidade='$quantidade',foto='$foto' WHERE codigo = $chave";
	
	
	if($resultado = mysqli_query($conexao,$sql)){
		if(move_uploaded_file($_FILES['foto']['tmp_name'],$_UP['pasta'].$foto)){
			
		}
		
		//veiculo alterado
		echo "<script>alert('Alterado com sucesso');</script>";
		echo "<script> document.location.href='../index.php';</script>";
		
		
		
	}else{
		echo "<script>alert('deu erro');</script>".$conexao->error;
	}
}

if ($acao == 'excluir') {
	// excluir na tabela de veiculos (delete)
	$sql = "DELETE FROM veiculo WHERE codigo = $chave";
	if($resultado = mysqli_query($conexao,$sql)){
		//confirmando exclusão
		echo "<script>alert('veiculo excluido com sucesso');</script>";
		echo "<script> document.location.href='../index.php';</script>";
	}else{
		// erro na exclusão
		echo "<script>alert('deu erro');</script>".$conexao->error;
	}
}

if ($acao == 'entrada') {
	// adicionar na quantidade da tabela de veiculos o valor de entrada (update)
	$entrada = $_POST['entrada'];
	$quantidade = $_POST['quantidade'];
	$sql = "UPDATE veiculo SET quantidade = $quantidade + $entrada WHERE codigo = $chave";
	if ($resultado=mysqli_query($conexao,$sql)) {
		// code...ok
		echo "<script>alert('deu certo!');</script>";
		echo "<script> document.location.href='../index.php';</script>";
	}
	else
	{
		// deu errado
		echo "<script>alert('não deu certo!');</script>";
	}
}

if ($acao == 'saida') {
	// subtrair na quantidade da tabela de veiculos o valor de saida (update)
	$saida = $_POST['saida'];
	$sql = "UPDATE veiculo SET quantidade = quantidade - $saida WHERE codigo = $chave";
	if ($resultado=mysqli_query($conexao,$sql)) {
		// code...ok
		echo "<script>alert('deu certo!');</script>";
		echo "<script> document.location.href='../index.php';</script>";
	}
	else
	{
		// deu errado
		echo "<script>alert('não deu certo!');</script>".$conexao->error;
	}
}

$conexao->close();

?>

<br>
<br>


</body>
</html