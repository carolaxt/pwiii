<?php
require 'Usuario.class.php';
session_start();
$usuario = new Usuario();
$msg = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnCad'])) {
    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';

    if ($usuario->chkUser($email)) {
        $msg = 'Email já cadastrado!';
    } else {
        if ($usuario->cadastrar($nome, $email, $senha)) {
            $msg = 'Usuário cadastrado com sucesso!';
        } else {
            $msg = 'Erro ao cadastrar usuário.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Cadastro - KitShop</title>
    <link rel="stylesheet" href="./css/estilo.css" />
</head>
<body>
    <div class="container">
        <h2>Cadastro</h2>
        <?php if($msg): ?>
            <p class="<?= strpos($msg, 'sucesso') !== false ? 'success' : 'error' ?>">
                <?= htmlspecialchars($msg) ?>
            </p>
        <?php endif; ?>
        <form method="POST" action="">
            <input type="text" name="nome" placeholder="Nome completo" required />
            <input type="email" name="email" placeholder="E-mail" required />
            <input type="password" name="senha" placeholder="Senha" required />
            <button type="submit" name="btnCad">Cadastrar</button>
        </form>
        <p>Já tem uma conta? <a href="login.php">Faça login aqui</a></p>
    </div>
</body>
</html>
