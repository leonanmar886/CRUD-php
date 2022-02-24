<?php
//Propriedades do banco de dados
$banco_nome = 'Leonan';
$banco_host = 'localhost';
$banco_usuario = 'root';
$banco_senha = '261102leo';

try {
    $coneccao = mysqli_connect($banco_host, $banco_usuario, $banco_senha, $banco_nome); // função que cria uma conexão para ser utilizada em futuras operações no banco de dados.
} catch (\Throwable $th) {
    throw $th;
}