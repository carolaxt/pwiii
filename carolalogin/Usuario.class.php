<?php
class Usuario {
    private $pdo;
    private $id;
    private $email;
    private $senha;

    public function __construct() {
        $dns    = "mysql:dbname=carolabanco;host=localhost;charset=utf8";
        $dbUser = "root";
        $dbPass = "";

        try {
            $this->pdo = new PDO($dns, $dbUser, $dbPass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erro na conexão: " . $e->getMessage());
        }
    }

    public function getId() {
        return $this->id;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function cadastrar($nome, $email, $senha) {
        try {
            $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (:n, :e, :s)";
            $stmt = $this->pdo->prepare($sql);

            $stmt->bindValue(":n", $nome);
            $stmt->bindValue(":e", $email);
            //(INSEGURO — apenas para testes)
            $stmt->bindValue(":s", $senha);

            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erro ao cadastrar: " . $e->getMessage();
            return false;
        }
    }

    public function checkUser($email) {
        $sql = "SELECT id FROM usuarios WHERE email = :e";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":e", $email);
        $stmt->execute();

        return $stmt->rowCount() > 0;
    }

    public function checkPass($email, $senha) {
        $sql = "SELECT * FROM usuarios WHERE email = :e AND senha = :s";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":e", $email);
        $stmt->bindValue(":s", $senha);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->id = $user['id'];
            $this->email = $user['email'];
            $this->senha = $user['senha'];
            return true;
        }
        return false;
    }
}
