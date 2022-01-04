<!DOCTYPE html>
<html>
    <title></title>
    <head>
    <meta charset="utf-8">
	<title>alterar</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <style type="text/css">

.formata{
 
 color: blue;
 width:500px;
 margin:10px;
 margin-left:250px;
 margin-bottom: 52px;
 margin-top: 60px;
 background-color:#CDB79E;
color:#FAEBD7;
border-radius:10px;

}
.i{
	margin-left: 320px;
}


</style>
    <body>
    <nav>   
    <div class="nav-wrapper">
      <a href="login.php" class="brand-logo"><i class="material-icons">cloud</i>SCV</a>
	  <i class="i"> Sistema de Controle de Veiculos</i>
    </div>
	
	

  </nav>

    <?php 

include_once 'conexao.php';

if (isset($_POST['usuario'])) {

	$chave = $_POST['usuario'] ?? '';

	// se o usuario existe na tabela de usuario 
	$sql = "SELECT * FROM usuario WHERE usuario = '$chave'";

	if ($resultado = mysqli_query($conexao,$sql)) {
		// rodou a query
		$campos = mysqli_fetch_array($resultado);

		// testar se tem um valor em campos['usuario']
		if (isset($campos['usuario'])) {
			// achei o usuario que bate com o que foi digita
			$senha = $campos['senha'] ?? '';
			if ($_POST['senha'] == $senha) {
				// usuario com a senha certa
				if ($campos['ativo'] == 'S') {
					// ok usuario com nome,senha e ativo certos

					$_SESSION['usuario'] = $_POST['usuario'];
					$_SESSION['senha'] = $_POST['senha'];
					$_SESSION['incluir'] = $campos['incluir'];
					$_SESSION['alterar'] = $campos['alterar'];
					$_SESSION['excluir'] = $campos['excluir'];
					$_SESSION['consultar'] = $campos['consultar'];
					$_SESSION['entrada'] = $campos['entrada'];
					$_SESSION['saida'] = $campos['saida'];
					$_SESSION['ativo'] = $campos['ativo'];

 					header('Location: ../index.php');
				}
				else
				{
					echo "<script>alert('Usuário não ativo');</script>";
					echo "<script> document.location.href='login.php';</script>";
				}
			}
			else
			{
				echo "<script>alert('Senha diferente');</script>";
				echo "<script> document.location.href='login.php';</script>";
			}
		}
		else
		{
			echo "<script>alert('Não achei o usuário digitado'); </script> ";
			echo "<script> document.location.href='login.php';</script>";
		}
	}
	else
	{
		echo "<script>alert('A query no rodou :');</script>" . $sql;
		echo "<script> document.location.href='login.php';</>";
	}
}
else
{

	// nao existe o name=usuario ,faz outra coisa
	//echo 'nao existe usuario no POST';
   

?>
	<fieldset class="formata">
		<form action="login.php" method="POST">

		<div class="row">
            <div class="col">
				Usuário:</div>
				<div class="col"><input type="text" name="usuario" style="width:200px;" >
</div></div>
<div class="row">
    <div class="col">
		

	Senha:</div><div class="col">
				<input type="password" name="senha" style="width:200px;">
			
		
</div>
</div>
<div class="row">
    <div class="col">
		<button class="waves-effect waves-light btn">Logar</button>
</div>
</div>
		</form>
	</fieldset>
<?php 
}



?>

    <?php

include_once '../img/rodapehome.php';

?>
    </body>
    </html>