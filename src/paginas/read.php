<?php
require_once '../../config.php';
require_once '../acoes/usuario.php';
require_once '../modulos/mensagens.php';

$usuario = readUsuario($coneccao); // chama a função que retorna todos os registros da tabela.

?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../css/style.css">
        <title>CRUD PHP</title>
    </head>
    <body>   
        <div class="container">
            <div class="row">
                <a href="../../"><h1>Usuarios - Read</h1></a>
                <a class="btn btn-success text-white" href="./create.php">Novo</a>
            </div>
            <div class="row flex-center">
                <?php if(isset($_GET['mensagem'])) echo(printMessage($_GET['mensagem'])); ?> <!-- Caso haja uma mensagem na url, ela será exibida -->
            </div>

            <table class="table-users">
                <tr>
                    <th>NOME</th>
                    <th>EMAIL</th>
                </tr>
                <?php foreach($usuario as $row): ?> <!-- Loop para exibir todos os registros retornados da consulta. -->
                <tr>
                    <td class="user-name"><?=$row['nome']?></td>
                    <td class="user-email"><?=$row['email']?></td>
                    <td class="btn-action">
                        <a class="btn btn-primary text-white" href="./update.php?id=<?=$row['id']?>">Editar</a>
                    </td>
                    <td class="btn-action">
                        <a class="btn btn-danger text-white" href="./delete.php?id=<?=$row['id']?>">Remover</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </body>
</html>
