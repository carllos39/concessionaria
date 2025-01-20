<?php
require "funcao-veiculo.php"; 
$id=$_GET['id'];
excluirVeiculo($conexao,$id);
header("location:formulario-cadastra-veiculo.php");
?>