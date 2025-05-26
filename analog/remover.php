<?php
require 'Usuario.class.php';

if (isset($_POST['btnRem']) && isset($_POST['id_rem'])) {
    $id = intval($_POST['id_rem']);
    $usuario = new Usuario();

    if ($usuario->delUser($id)) {
        header('Location: mostrar_registros.php');
        exit;
    } else {
        echo "<script>alert('Erro ao remover usuário'); window.location='mostrar_registros.php';</script>";
    }
} else {
    header('Location: mostrar_registros.php');
    exit;
}
?>
