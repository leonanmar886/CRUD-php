<?php

function buscarUsuarioBD($coneccao, $id){
    $id = mysqli_real_escape_string($coneccao, $id);

    $sql = "SELECT * FROM usuarios WHERE id = ?";
    $stmt = mysqli_stmt_init($coneccao);

    if(!mysqli_stmt_prepare($stmt, $sql))
        exit('Erro na consulta SQL');
    
        mysqli_stmt_bind_param($stmt, 'i', $id);
        mysqli_stmt_execute($stmt);

        $usuario = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));

        mysqli_close($coneccao);
        return $usuario;
}

function createUsuarioBD($coneccao, $nome, $email){
    $nome = mysqli_real_escape_string($coneccao, $nome);
    $email = mysqli_real_escape_string($coneccao, $email);

    if($nome && $email){
        $sql = "INSERT INTO usuarios (nome, email) values (?, ?)";
        $stmt = mysqli_stmt_init($coneccao);

        if(!mysqli_stmt_prepare($stmt, $sql))
            exit('Erro na consulta SQL');

        mysqli_stmt_bind_param($stmt, 'ss', $nome, $email);
        mysqli_stmt_execute($stmt);
        mysqli_close($coneccao);
        return true;
    }
}

function readUsuarioBD($coneccao){
    $usuarios = [];

    $sql = "SELECT * FROM usuarios";
    $resultado = mysqli_query($coneccao, $sql);

    $quantidadeRegistros = mysqli_num_rows($resultado);

    if ($quantidadeRegistros > 0) 
        $usuarios = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
    
    mysqli_close($coneccao);
    return $usuarios;
}

function updateUsuarioBD($coneccao, $id, $nome, $email){
    if($id && $nome && $email){
        $sql = "UPDATE usuarios SET nome = ?, email = ? WHERE id = ?";
        $stmt = mysqli_stmt_init($coneccao);

        if(!mysqli_stmt_prepare($stmt, $sql))
            exit('Erro na consulta SQL');

        mysqli_stmt_bind_param($stmt, 'ssi', $nome, $email, $id);
        mysqli_stmt_execute($stmt);
        mysqli_close($coneccao);
        return true;
    }
}

function deleteUsuarioBD($coneccao, $id){
    $id = mysqli_real_escape_string($coneccao, $id);

    if($id){
        $sql = "DELETE FROM usuarios WHERE id = ?";
        $stmt = mysqli_stmt_init($coneccao);

        if(!mysqli_stmt_prepare($stmt, $sql))
            exit('Erro na consulta SQL');

        mysqli_stmt_bind_param($stmt, 'i', $id);
        mysqli_stmt_execute($stmt);
        return true;
    }
}