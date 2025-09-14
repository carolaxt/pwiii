<?php
require 'Usuario.class.php';
$usuario = new Usuario();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login / Cadastro</title>
</head>
<body>
    <div class="container">
        <img src="bratz.webp" alt="Logo">
        <form action="teste.php" method="post">
            <input type="text" name="nome" placeholder="Nome">
            <input type="text" name="email" placeholder="Email" required>
            <input type="password" name="senha" placeholder="Senha" required>
            <input type="submit" name="cadastrar" value="Cadastrar">
            <input type="submit" name="entrar" value="Entrar">
        </form>
    </div>
</body>
</html>
