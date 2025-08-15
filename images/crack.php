<?php
class Produto{
    public $id;
    public $nome;
    public $descricao;
    private $pdo;

        public function conectar(){
            try {
                $dns    = "mysql:dbname=etimpwiiiproduto;host=localhost";
                $dbUSer = "root";
                $dbPass = "";

                $this->pdo = new PDO($dns, $dbUSer, $dbPass);
                return true;
            } catch (\Throwable $th) {
                echo "<h1>Erro ao conectar ao banco. Tente mais tarde!!";
                return false;
            }
        }
}

