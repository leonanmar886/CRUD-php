<?php
require_once '../../config.php';
require_once '../acoes/usuario.php';

createUserAction($coneccao, $_POST["nome"], $_POST["email"]);
?>

<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?= $host ?>/css/style.css">
        <title>CRUD PHP</title>
    </head>
    <body>
        <div class="container">
        <div class="row">
        <a href="../../index.php"><h1>Usuarios - Create</h1></a>
        <a class="btn btn-success text-white" href="../../index.php">Inicio</a>
    </div>
    <div class="row flex-center">
        <div class="form-div">
            <form class="form" action="../paginas/create.php" method="POST">
                <label>Nome</label>
                <input type="text" name="nome" required/>
                <label>E-mail</label>
                <input type="email" name="email" required/>

                <button class="btn btn-success text-white" type="submit">Salvar</button>
            </form>
        </div>
    </div>
        </div>