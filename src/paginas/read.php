<?php
require_once 'C:/xampp/htdocs/CRUD/CRUD-php/config.php';
require_once 'C:/xampp/htdocs/CRUD/CRUD-php/src/acoes/usuario.php';
require_once 'C:/xampp/htdocs/CRUD/CRUD-php/src/modulos/mensagens.php';

$usuario = readUserAction($coneccao);

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
                <a href="../../"><h1>Usuarios - Read</h1></a>
                <a class="btn btn-success text-white" href="./create.php">New</a>
            </div>
            <div class="row flex-center">
                <?php if(isset($_GET['message'])) echo(printMessage($_GET['message'])); ?>
            </div>

            <table class="table-users">
                <tr>
                    <th>NOME</th>
                    <th>EMAIL</th>
                </tr>
                <?php foreach($users as $row): ?>
                <tr>
                    <td class="user-name"><?=$row['nome']?></td>
                    <td class="user-email"><?=$row['email']?></td>
                    <td>
                        <a class="btn btn-primary text-white" href="./edit.php?id=<?=$row['id']?>">Editar</a>
                    </td>
                    <td>
                        <a class="btn btn-danger text-white" href="./delete.php?id=<?=$row['id']?>">Remover</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </body>
</html>
