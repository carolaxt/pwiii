<?php
require 'Usuario.class.php';
session_start();
$usuario = new Usuario();
$msg = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnLog'])) {
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';

    $user = $usuario->chkPass($email, $senha);
    if ($user) {
        $_SESSION['user'] = $user;
        header('Location: mostrar_registros.php');
        exit;
    } else {
        $msg = 'Usuário ou senha incorretos.';
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login - KitShop</title>
    <link rel="stylesheet" href="./css/estilo.css" />
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <?php if($msg): ?>
            <p class="error"><?= htmlspecialchars($msg) ?></p>
        <?php endif; ?>
        <form method="POST" action="">
            <input type="email" name="email" placeholder="E-mail" required />
            <input type="password" name="senha" placeholder="Senha" required />
            <button type="submit" name="btnLog">Entrar</button>
        </form>
        <p>Não tem uma conta? <a href="cadastro.php">Cadastre-se aqui</a></p>
    </div>
</body>
</html>
