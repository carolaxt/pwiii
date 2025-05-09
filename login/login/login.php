<?php
require 'Usuario.class.php';

$sucesso = $usuario = new Usuario();

if( $sucesso ){ 

}else{
    echo "<h1>Banco indisponivel. Tente mais tarde";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.4/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-DQvkBjpPgn7RC31MCQoOeC9TI2kdqa4+BSgNMNj8v77fdC77Kj5zpWFTJaaAoMbC" crossorigin="anonymous">
</head>
<body>
    <nav>
        <h1>logo</h1>
    </nav>

    <div class="wrapper">
        <form action = "teste.php" method = "post">
            <input type="text" name="nome" placeholder="Digite um Nome">
            <input type="text" name="email" placeholder="Digite um Email">
            <input type="text" name="senha" placeholder="Digite um Senha">

            <input type="submit" value = "Cadastrar">
        </form> 
    </div>





</body>
</html>