<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Usuários Cadastrados</title>
    <link rel="stylesheet" href="./css/index.css" />
</head>
<body>

<?php
require 'Usuario.class.php';
$usuario = new Usuario();

if (!$usuario){
    echo "<script>
        confirm('Banco indisponível. Tente mais tarde');
    </script>";
    return false;
} else {
    $dados = $usuario->getUsuarios();

    echo '<div class="table-container">';
    echo '<table class="custom-table">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>Selecionar usuário</th>';
    echo '<th>IdUsuário</th>';
    echo '<th>Nome</th>';
    echo '<th>Email</th>';
    echo '<th colspan="2">Ações</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    foreach ($dados as $item) {
        $id = $item['id'];
        $name = $item['nome'];
        $email = $item['email'];

        echo '<tr>';
        echo "<td><input type='checkbox' value='$id'></td>";
        echo "<td>$id</td>";
        echo "<td>$name</td>";
        echo "<td>$email</td>";
        // Form para remover (excluir) agora usa "btnRem" e arquivo "remover.php"
        echo "<td><form method='POST' action='remover.php' onsubmit=\"return confirm('Confirma remoção?');\" style='display:inline'>
                <input type='hidden' name='id_rem' value='$id'>
                <button type='submit' class='btn btn-danger btn-sm' name='btnRem'>Remover</button>
              </form></td>";
        // Link para alterar (editar) usa parâmetro id_alt
        echo "<td><a class='btn btn-info btn-sm' href='alterar.php?id_alt=$id'>Alterar</a></td>";
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
    echo '</div>';
}
?>

</body>
</html>
