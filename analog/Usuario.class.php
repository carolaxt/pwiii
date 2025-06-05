<?php
class Usuario{
    private $id;
    private $nome;
    private $email;
    private $senha;    
    private $pdo;

    public function __construct(){
        $dns    = "mysql:dbname=usuario;host=localhost"; 
        $dbUser = "root";
        $dbPass = "";
        
        try {
            $this->pdo = new PDO($dns, $dbUser, $dbPass);           
            return true;
        } catch (\Throwable $th) {           
            return false;
        }   
    }

    public function cadastrar($nome, $email, $senha){
        $sql = "INSERT INTO usuarios SET nome = :n, email = :e, senha = :s";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":n", $nome);
        $stmt->bindValue(":e", $email);
        $stmt->bindValue(":s", $senha);
        return $stmt->execute();
    }

    public function chkUser($email){
        $sql = "SELECT * FROM usuarios WHERE email = :e";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":e", $email);
        $stmt->execute();

        return $stmt->rowCount() > 0;
    }

    public function chkPass($email, $senha){
        $sql = "SELECT * FROM usuarios WHERE email = :e AND senha = :s";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":e", $email);
        $stmt->bindValue(":s", $senha);
        $stmt->execute();

        if ($stmt->rowCount() > 0){
            return $stmt->fetch();
        } else {
            return false;
        }     
    }

    public function getUsuarios(){
        $sql = "SELECT * FROM usuarios";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
       
        if($stmt->rowCount() > 0){
            return $stmt->fetchAll();
        } else{
            return array();
        }
    }

    public function getID($id){
    $sql = "SELECT * FROM usuarios WHERE id = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(":id", $id, PDO::PARAM_INT);
    $stmt->execute();

    if($stmt->rowCount() > 0){
        return $stmt->fetch();
    } else {
        return false;
    }
}

    public function delUser($id){
        $sql = "DELETE FROM usuarios WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":id" , $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function alterarUsuario($id, $nome, $email, $senha){
        $sql = "UPDATE usuarios SET nome = :n, email = :e, senha = :s WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":n", $nome);
        $stmt->bindValue(":e", $email);
        $stmt->bindValue(":s", $senha);
        $stmt->bindValue(":id" , $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
?>
