<?php
$servidor = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'projeto';
if($conexao = mysqli_connect($servidor,$usuario,$senha,$banco)){
//tudo ok
session_start();
}else{
    die("Não foi possivel se conectar ao banco ".$conexao->error);
session_destroy();
}


?>