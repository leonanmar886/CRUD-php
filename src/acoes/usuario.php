<?php
require_once '../banco/usuario.php';

function buscarUsuario($coneccao, $id){
    return buscarUsuarioBD($coneccao, $id);
};

function readUsuario($coneccao){
    return readUsuarioDB($coneccao);
};

function updateUsuario($coneccao, $id, $nome, $email){
    $updateUsuarioDB = updateUsuarioDB($coneccao, $id, $nome, $email);
    $mensagem = $updateUsuarioDB == 1 ? 'Usuario atualizado com sucesso' : 'Falha na atualização';
    return header("Local: ./read.php?mensagem=$mensagem");
}

function createUsuario($coneccao, $nome, $email){
    $createUsuarioDB = createUsuarioDB($coneccao, $nome, $email);
    $mensagem = $createUsuarioDB == 1 ? 'Usuario criado com sucesso' : 'Falha na criação';
    return header("Local: ./read.php?mensagem=$mensagem");
}

function deleteUsuario($coneccao, $id){
    $deleteUsuarioDB = deleteUsuarioDB($coneccao, $id);
    $mensagem = $deleteUsuarioDB == 1 ? 'Usuario deletado com sucesso' : 'Falha em deletar o usuario';
    return header("Local: ./read.php?mensagem=$mensagem");
}

?>