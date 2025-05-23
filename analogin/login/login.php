<?php
require 'Usuario.class.php';

$sucesso = $usuario = new Usuario();
if( $sucesso ){
    echo "Shou de bola";
}else{
    echo "Não deu";
}

try{
    $usuario -> cadastrar('thiago', 'thiago@gmail.com', 12345678);
    echo "\nDeu certinho paizao";
}catch(\Throwable $th){
    echo "$th";
}
