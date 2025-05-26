<?php
require 'Usuario.class.php';

if(isset($_POST['atualizar'])) {
    $id = (int) $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $usuario = new Usuario();

    $atualizado = $usuario->editUser($id, $nome, $email, $senha);

    if($atualizado) {
        header("Location: mostrar_registros.php");
        exit;
    } else {
        echo "Erro ao atualizar usuário.";
    }
} else {
    echo "Acesso inválido.";
}
