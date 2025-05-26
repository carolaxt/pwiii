<?php
require "Usuario.class.php";

$usuario = new Usuario();

if(isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['senha'])){
    $nome  = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $senha = trim($_POST['senha']);
}

if(isset($_POST['btnLog'])){  // Cadastro
    if(!$usuario) {
        echo "<script>alert('Erro ao conectar. Tente novamente mais tarde!');</script>";
    } else {
        $userExists = $usuario->chkUser($email);
        if($userExists){
            echo "<script>alert('Email já cadastrado!');</script>";
        } else {
            $success = $usuario->cadastrar($nome, $email, $senha);
            if($success){
                echo "<script>alert('Usuário cadastrado com sucesso!');</script>";
            } else {
                echo "<script>alert('Erro ao cadastrar. Tente novamente mais tarde!');</script>";
            }
        }
    }
}

if(isset($_POST['btnCad'])){  // Login
    $user = $usuario->chkPass($email, $senha);
    if($user){
        // Inicia sessão e redireciona para mostrar_registros.php
        session_start();
        $_SESSION['user'] = $user;
        header('Location: mostrar_registros.php');
        exit;
    } else {
        echo "<script>alert('Usuário ou senha incorretos!');</script>";
    }
}
?>
