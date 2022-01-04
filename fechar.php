<?php
include_once 'materialize/conexao.php';
// fecha o banco de dados
$conexao->close();
// mata as variaveis da sessao
session_destroy();
// sai
header('Location: materialize/login.php');
?>