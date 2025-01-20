<?php 
require "funcao-veiculo.php";

if(isset($_GET['acesso-negado'])){
    $mensagem="Você deve se logar primeiro!";
}elseif(isset($_GET['dados-incorreto'])){
    $mensagem="Dados incorreto,verifique!";
}elseif(isset($_GET['sair'])){
    $mensagem="Você sai do sistema!";
}elseif(isset($_GET['campo-obrigatorio'])){
    $mensagem="Preencha o email e a senha corretamente!";
}

if(isset($_POST['logar'])){
    if(empty($_POST['email']) || empty($_POST['senha'])){
        header("location:index.php?campo-obrigatorio");
        exit;
    }else{

    $email=$_POST['email'];
    $senha=$_POST['senha'];

    $login=buscarLogin($conexao,$email);
  
    if($login != null && password_verify($senha,$login['senha'])){
        header("location:formulario-cadastra-veiculo.php");
    }else{
        header("location:index.php?dados-incorreto"); 
        exit;  
    }
}
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concessíonaria Carango Velho</title>
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
</style>
</head>
<body>

    <div class="container">

    <header class="header">
        <h1>Concessionária Carango Velho</h1>
        <nav>
            <ul class="menu">
            <li><a href="index.php">Home</a></li>
            <li><a href="formulario-cadastro-veiculo.php">Cadastrar</a></li>
            <li><a href="">Alterar</a></li>
            <li><a href="index.php">Sair</a></li>
            </ul>
        </nav>
    </header>

    <section class="section2">
    <img src="imagem/pagina-para-colorir-de-carros-antigos_495135-896.avif" alt="">
    </section>

        <section class="section">
            <h2>Login de Usuários</h2>

            <form action="" method="post">
               <div>
                   <label for="email">Email :</label>
                   <input type="email" name="email" id="email">
               </div>
               <div>
                   <label for="senha">Senha :</label>
                   <input type="password" name="senha" id="senha">
               </div>
            <input type="submit" name="logar" value="Logar">
            </form>
            <?php if(isset($mensagem)){?>
   <p class="mensagem"><?=$mensagem?></p>
       <?php }?>
        </section>
        <section class="section1">
            <img src="imagem/QUI-Carro-2.jpg" alt="">
            </section>
<footer class="footer">
 <p>    © Copyright 2025 - Concessionária Carango Velho a sua destribuidora de veiculos semi novos</p>
</footer>
</div> 
</body>
</html>