<?php

$host = 'http://localhost/htdocs/CRUD/CRUD-php';

$banco_nome = 'Leonan';
$banco_host = 'localhost';
$banco_usuario = 'root';
$banco_senha = '12345abc';

try {
    $coneccao = mysqli_connect($host, $banco_usuario, $banco_senha, $banco_nome);
} catch (\Throwable $th) {
    throw $th;
}