<?php
require 'Usuario.class.php';
session_start();
$usuario = new Usuario();

if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit;
}

$userData = []; // Inicializa para evitar erros se 'id_alt' não estiver definido
if (isset($_GET['id_alt'])) {
    $id = intval($_GET['id_alt']);
    // buscar dados do usuário para preencher form
    // Código exemplo (supondo que tenha método getUsuarioById):
    $userData = $usuario->getID($id); // Certifique-se que getID retorna um array associativo
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnAlt'])) {
    $id = intval($_POST['id_alt']);
    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';

    // Adicione uma validação básica para garantir que $id não seja 0 ou vazio se não encontrar o usuário
    if (empty($id) && isset($userData['id'])) {
        $id = $userData['id']; // Garante que o ID do usuário original seja usado se o hidden field não estiver definido
    }

    if ($usuario->alterarUsuario($id, $nome, $email, $senha)) {
        header('Location: mostrar_registros.php');
        exit;
    } else {
        echo "<script>alert('Erro ao alterar usuário');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Usuário</title>
    <link rel="stylesheet" href="./css/atualizar.css" />
</head>
<body>

    <h1>Alterar Usuário</h1> <form method="POST" action="">
        <input type="hidden" name="id_alt" value="<?= htmlspecialchars($userData['id'] ?? '') ?>">

        <div class="form-row">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" value="<?= htmlspecialchars($userData['nome'] ?? '') ?>" placeholder="Seu nome" required>
            </div>
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" value="<?= htmlspecialchars($userData['email'] ?? '') ?>" placeholder="seu@email.com" required>
            </div>
        </div>

        <div class="form-group">
            <label for="senha">Nova Senha:</label>
            <input type="password" id="senha" name="senha" placeholder="********" required>
        </div>
        
        <button type="submit" name="btnAlt">Alterar</button>
    </form>

</body>
</html>