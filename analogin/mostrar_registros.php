<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body>
    
</body>
</html>

<?php
require 'Usuario.class.php';
$con = $usuario = new Usuario();
 
if (!$con){
    echo "<script>
        confirm('Banco indisponivel. Tente mais tarde') </script>";
    return false;
}else{
    $dados = $usuario->getUsuarios();
    
    $table = '<table class ="table table-striped table-hover">';
    $table .= '<thead>';
    $table .= '<tr>';
    $table .= '<td> Selecionar usuário</td>';
    $table .= '<td>Id</td>';
    $table .= '<td>Nome</td>';
    $table .= '<td>Email</td>';
    $table .= '<td colpsan = "2" align = "center">Acoes</td>';
    $table .= '</tr>';
    $table .= '</thead>';
    $table .= '<tbody>';

    foreach ($dados as $item) {
        $id = $item ['id'];
        $name = $item ['nome'];
        $email = $item ['email'];

        $table .= "<td><input type = 'checbox' value = $id></td>";
        $table .= "<td> $id </td>";
        $table .= "<td>$name</td>";
        $table .= "<td>$email</td>";

        $table .= "<td><a class = 'btn btn-danger' href = 'excluir.php?id=$id'>Excluir</a></td>";
        $table .= "<td><a class = 'btn btn-info' href = 'editar.php?id=$id'>Editar</a></td>";
    }
    
    echo $table;
     $table .= '</tbody>';
     $table .= '</body>';
}