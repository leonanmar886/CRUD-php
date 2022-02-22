<?php
require_once '../banco/usuario.php';

function buscarUsuario($coneccao, $id){
    return buscarUsuarioBD($coneccao, $id);
};

function readUsuario($coneccao){
    return readUsuarioBD($coneccao);
};

function updateUsuario($coneccao, $id, $nome, $email){
    $updateUsuarioDB = updateUsuarioBD($coneccao, $id, $nome, $email);
    $mensagem = $updateUsuarioDB == 1 ? 'Update-sucesso' : 'Update-falha';
    return header("Local: ./read.php?mensagem=$mensagem");
}

function createUsuario($coneccao, $nome, $email){
    $createUsuarioDB = createUsuarioBD($coneccao, $nome, $email);
    $mensagem = $createUsuarioDB == 1 ? 'Create-sucesso' : 'Create-falha';
    return header("Local: ./read.php?mensagem=$mensagem");
}

function deleteUsuario($coneccao, $id){
    $deleteUsuarioDB = deleteUsuarioBD($coneccao, $id);
    $mensagem = $deleteUsuarioDB == 1 ? 'Delete-sucesso' : 'Delete-falha';
    return header("Local: ./read.php?mensagem=$mensagem");
}

?>