<?php
require "Usuario.class.php";

$usuario = new Usuario();

if(isset($_POST['cadastrar'])){
    $nome  = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if ($usuario->checkUser($email)) {
        echo "<script>alert('Email já cadastrado!')</script>";
    } else {
        // Cadastro do usuário
        $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (:n, :e, :s)";
        $stmt = $usuario->pdo->prepare($sql);
        $stmt->bindValue(":n", $nome);
        $stmt->bindValue(":e", $email);
        $stmt->bindValue(":s", $senha);
        if($stmt->execute()){
            echo "<script>alert('Usuário inserido com sucesso!')</script>";
        } else {
            echo "<script>alert('Erro ao cadastrar!')</script>";
        }
    }
}

if(isset($_POST['entrar'])){
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if ($usuario->checkPass($email, $senha)){
        echo "<h2>Bem-vindo, ".$usuario->getEmail()."!</h2>";
    } else {
        echo "<script>alert('Email ou senha inválidos!')</script>";
    }
}
