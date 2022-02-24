<?php
require_once '../banco/usuario.php';

function buscarUsuario($coneccao, $id){
    return buscarUsuarioBD($coneccao, $id); //Função que busca o usuário correspondente ao id passado como argumento.
};

function readUsuario($coneccao){
    return readUsuarioBD($coneccao); // Função que retorna todos os registros do banco de dados.
};

function updateUsuario($coneccao, $id, $nome, $email){ // Função que altera no banco de dados o registro correspondente ao id passado como argumento, substituindo os campos nome e email.
    $updateUsuarioDB = updateUsuarioBD($coneccao, $id, $nome, $email); // Função onde o processo de alteração no banco de dados é feita.
    $mensagem = $updateUsuarioDB == 1 ? 'Update-sucesso' : 'Update-falha';
    return header("location: ./read.php?mensagem=$mensagem"); // A função retorna um header para a página read.php com a mensagem indicando se a operação foi bem sucedida ou não.
}

function createUsuario($coneccao, $nome, $email){ // Função que cria um novo registro no banco de dados com as informações passadas no chamado da função.
    $createUsuarioDB = createUsuarioBD($coneccao, $nome, $email);// Função onde o processo de criação no banco de dados é feito.
    $mensagem = $createUsuarioDB == 1 ? 'Create-sucesso' : 'Create-falha';
    return header("location: ./read.php?mensagem=$mensagem");
}

function deleteUsuario($coneccao, $id){// Função que deleta do banco de dados o registro vinculado ao id passado como argumento.
    $deleteUsuarioDB = deleteUsuarioBD($coneccao, $id);// Função onde o processo de exclusão no banco de dados é feio.
    $mensagem = $deleteUsuarioDB == 1 ? 'Delete-sucesso' : 'Delete-falha';
    return header("location: ./read.php?mensagem=$mensagem");
}

?>