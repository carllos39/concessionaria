<?php
require "conectar.php";

function cadastrarVeiculo($conexao,$nome,$marca,$ano,$valor,$combustivel,$desconto,$total){
    $sql="INSERT INTO veiculo(nome,marca,ano,valor,combustivel,desconto,total) VALUES('$nome','$marca',$ano,$valor,'$combustivel',$desconto,$total)";
    mysqli_query($conexao,$sql)or die(mysqli_error($conexao));

}
function alterarVeiculo($conexao,$id,$nome,$marca,$ano,$valor,$combustivel,$desconto,$total){
    $sql="UPDATE veiculo SET nome='$nome',marca='$marca',ano=$ano,valor=$valor,combustivel='$combustivel',desconto=$desconto,total=$total WHERE id=$id";
    mysqli_query($conexao,$sql) or die(mysqli_error($conexao));

}
function excluirVeiculo($conexao,$id){
    $sql="DELETE FROM veiculo WHERE id=$id";
    mysqli_query($conexao,$sql) or die(mysqli_error($conexao));

}
function buscarTodosVeiculo($conexao){
    $sql="SELECT * FROM veiculo";
   $resultado= mysqli_query($conexao,$sql)or die(mysqli_error($conexao));
   return mysqli_fetch_all($resultado,MYSQLI_ASSOC);

}
function buscarUmVeiculo($conexao,$id){
    $sql="SELECT * FROM veiculo WHERE id=$id";
   $resultado= mysqli_query($conexao,$sql)or die(mysqli_error($conexao));
   return mysqli_fetch_assoc($resultado);

}
function buscarLogin($conexao,$email){
    $sql="SELECT * FROM login WHERE email='$email'";
   $resultado= mysqli_query($conexao,$sql)or die(mysqli_error($conexao));
   return mysqli_fetch_assoc($resultado);

}
