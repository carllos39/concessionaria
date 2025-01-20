<?php 
require "funcao-veiculo.php";

if(isset($_POST['cadastrar'])){
$nome=$_POST['nome'];
$marca=$_POST['marca'];
$ano=$_POST['ano'];
$valor=$_POST['valor'];
$combustivel=$_POST['combustivel'];


switch ($combustivel) {
    case "alcool":
        if($ano >=2010){
        $desconto = 0.15 * $valor;
        $total= $valor - $desconto;  
        }else{
        $desconto = 0.25 * $valor;
        $total= $valor - $desconto;    
        }
        break;
    case "gasolina":
        if($ano >=2010){
            $desconto = 0.12 * $valor;
            $total= $valor - $desconto;  
            }else{
            $desconto = 0.10 * $valor; 
            $total= $valor-$desconto;   
            }
        break;
    case "disiel":
        if($ano >=2010){
            $desconto = 0.07 * $valor;
            $total= $valor - $desconto;  
            }else{
            $desconto = 0.05 * $valor; 
            $total = $valor-$desconto;  
            }
        break;
        return $total;   
}


 echo"Nome :$nome";
 echo"Ano :$ano";
 echo"Combustivel :$combustivel";
 echo"Valor :$valor";
 echo"Desconto :$desconto";
 echo"Valor a pagar :$total";

cadastrarVeiculo($conexao,$nome,$marca,$ano,$valor,$combustivel,$desconto,$total);

}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concessionária Carango Velho</title>
<style>
    *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
.container{
display: grid;
grid-template-columns: repeat(6,2fr);
grid-template-rows: repeat(6,2fr);
}
.header{
grid-column: span 6;
background-color: black;  
color: whitesmoke;
}


  .menu{
    grid-column: span 6;
    display:flex;
    justify-content: space-around;
    list-style: none;
     
 
}
a{
    text-decoration: none;
    color: whitesmoke;
}

h1{
    text-align: center;
}
.section{
    grid-column: span 2;
    grid-row: span 4;
    text-align: center;

    margin:10px ;
    padding-top:20px ;
    border-radius: 4px;
    background-color: black;  
    color: whitesmoke;
}
.section1{
    grid-column: span 2;
    grid-row:span 4;
      
}
.section2{
    grid-column: span 2;
    grid-row:span 4;
  
}
img{
  
  height:100%;
  width:100%;
}
.footer{
    grid-column: span 6 ;
    grid-row: span 1; 
    background-color: black;  
    color: whitesmoke;

   display: flex;
   align-items: center;
   text-align: center;
}
body{
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    margin: auto;
}
input{
    margin: 5px;
    padding: 5px;
    border-radius: 4px;
}
.excluir{
    color: red;
}
</style>
</head>

<body>

    <div class="container">

    <header class="header">
    <h1>Concessionária Carango Velho</h1>
        <nav class="navegacao">
            <ul class="menu">
                <li><a href="index.php">Home</a></li>
                <li><a href="formulario-cadastro-veiculo.php">Cadastrar</a></li>
                <li><a href="formulario-alterar-veiculo.php">Alterar</a></li>
                <li><a href="index.php">Sair</a></li>
            </ul>
        </nav>
    </header>
    <section class="section2">
    <img src="imagem/pagina-para-colorir-de-carros-antigos_495135-896.avif" alt="">
    </section>

        <section class="section">
    
         <h2>Cadastro de Veiculo</h2>
    <form action="" method="post">
        <div>
            <label for="nome"> Nome do veiculo :</label>
            <input type="text" name="nome" id="nome">
        </div>
        <div>
            <label for="marca"> Marca  do veiculo :</label>
            <input type="text" name="marca" id="marca">
        </div>
        <div>
            <label for="ano"> Ano do veiculo :</label>
            <input type="number" name="ano" id="ano">
        </div>
        <div>
            <label for="valor"> Valor do veiculo :</label>
            <input type="number" name="valor" id="valor">
        </div>
        <div>
            <label for="combustivel"> Tipo de combustível :</label>
            <select name="combustivel">
                <option value=""></option>
                <option value="alcool">Alcool</option>
                <option value="gasolina">Gasolina</option>
                <option value="disiel">Disiel</option>
            </select>
        </div>
        <input type="submit" name="cadastrar" value="Cadastrar veiculo">
        <input type="reset" name="cadastrar" value="Limpar">
    </form>
    </section>
        <section class="section1">
            <?php
           $veiculos=buscarTodosVeiculo($conexao); 
       
            ?>
            <h2>Lista de veiculo</h2>
           <table border="1">
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Marca</th>
                <th>Ano</th>
                <th>Valor</th>
                <th>Desconto</th>
                <th>Valor a pagar</th>
                <th>Gerenciar</th>
            </tr>
            <?php foreach($veiculos as $veiculo){?>
                <tr>
                    <td><?=$veiculo['id']?></td>
                    <td><?=$veiculo['nome']?></td>
                    <td><?=$veiculo['marca']?></td>
                    <td><?=$veiculo['ano']?></td>
                    <td><?=$veiculo['valor']?></td>
                    <td><?=$veiculo['desconto']?></td>
                    <td><?=$veiculo['total']?></td>
                    <td><a class="excluir" href="excluir-veiculo.php?id=<?=$veiculo['id']?>">Excluir</a></td>
                </tr>
                <?php } ?>
           </table> 
            </section>
    <footer class="footer">
    <p>    © Copyright 2025 - Concessionária Carango Velho a sua destribuidora de veiculos semi novos</p>
</footer>
</div> 
<script src="js/confirm.js"></script>
</body>
</html>