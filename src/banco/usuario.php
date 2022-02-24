<?php

function buscarUsuarioBD($coneccao, $id){ // Função que retorna todos os registros do banco de dados.
    $id = mysqli_real_escape_string($coneccao, $id); // Essa função serve para previnir injeção de SQL.

    $sql = "SELECT * FROM usuarios WHERE id = ?";
    $stmt = mysqli_stmt_init($coneccao);// Inicia um novo statement 

    if(!mysqli_stmt_prepare($stmt, $sql))// Essa função verifica e prepara o statement, daí se houver algum erro, a função é interrompida.
        exit('Erro na consulta SQL');
    
        mysqli_stmt_bind_param($stmt, 'i', $id);// Essa função substitui o ? na string sql, pelo id passado como argumento do método. O 'i' no chamado identifica o tipo da variável, no caso, tipo inteiro.
        mysqli_stmt_execute($stmt);

        $usuario = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));// O resultado da consulta sql é colocado em um array.

        mysqli_close($coneccao);// Conexão com o banco de dados encerrada.
        return $usuario;
}

function createUsuarioBD($coneccao, $nome, $email){// Função que cria no banco de dados um novo registro com as informações passadas no parâmetro.
    $nome = mysqli_real_escape_string($coneccao, $nome); // Essa função serve para previnir injeção de SQL.
    $email = mysqli_real_escape_string($coneccao, $email);

    if($nome && $email){
        $sql = "INSERT INTO usuarios (nome, email) values (?, ?)";
        $stmt = mysqli_stmt_init($coneccao);// Inicia um novo statement 

        if(!mysqli_stmt_prepare($stmt, $sql))// Essa função verifica e prepara o statement, daí se houver algum erro, a função é interrompida.
            exit('Erro na consulta SQL');

        mysqli_stmt_bind_param($stmt, 'ss', $nome, $email);//Essa função substitui o ? na string sql, pelo id passado como argumento do método. O 'i' no chamado identifica o tipo da variável, no caso, tipo string.
        mysqli_stmt_execute($stmt);
        mysqli_close($coneccao);
        return true;
    }
}

function readUsuarioBD($coneccao){ // Função que retorna todos os registros da tabela.
    $usuarios = [];

    $sql = "SELECT * FROM usuarios";
    $resultado = mysqli_query($coneccao, $sql); // como não há nenhuma variável passada pelo usuário, não é preciso iniciar um statement por receio de injeção de SQL.

    $quantidadeRegistros = mysqli_num_rows($resultado);

    if ($quantidadeRegistros > 0) 
        $usuarios = mysqli_fetch_all($resultado, MYSQLI_ASSOC);// Transforma todos os registros da consulta em um único array.
    
    mysqli_close($coneccao);
    return $usuarios;
}

function updateUsuarioBD($coneccao, $id, $nome, $email){// Função que atualiza o registro relativo ao id passado como parâmetro, com os outros campos passados no parâmetro.
    if($id && $nome && $email){// Verifica se as variáveis estão preenchidas.
        $sql = "UPDATE usuarios SET nome = ?, email = ? WHERE id = ?";
        $stmt = mysqli_stmt_init($coneccao);// Inicia um novo statement.

        if(!mysqli_stmt_prepare($stmt, $sql))// Essa função verifica e prepara o statement, daí se houver algum erro, a função é interrompida.
            exit('Erro na consulta SQL');

        mysqli_stmt_bind_param($stmt, 'ssi', $nome, $email, $id);//Essa função substitui o ? na string sql, pelo id passado como argumento do método. O 'i' no chamado identifica o tipo da variável, no caso, tipo string e tipo inteiro.
        mysqli_stmt_execute($stmt);
        mysqli_close($coneccao);
        return true;
    }
}

function deleteUsuarioBD($coneccao, $id){// Função que deleta o registro relativo ao id passado como parâmetro
    $id = mysqli_real_escape_string($coneccao, $id);// Essa função serve para previnir injeção de SQL.

    if($id){// Verifica se as variáveis estão preenchidas.
        $sql = "DELETE FROM usuarios WHERE id = ?";
        $stmt = mysqli_stmt_init($coneccao);// Inicia um novo statement.

        if(!mysqli_stmt_prepare($stmt, $sql))// Essa função verifica e prepara o statement, daí se houver algum erro, a função é interrompida.
            exit('Erro na consulta SQL');

        mysqli_stmt_bind_param($stmt, 'i', $id);//Essa função substitui o ? na string sql, pelo id passado como argumento do método. O 'i' no chamado identifica o tipo da variável, no caso, tipo inteiro.
        mysqli_stmt_execute($stmt);
        return true;
    }
}