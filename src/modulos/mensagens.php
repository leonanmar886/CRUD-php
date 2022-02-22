<?php

function printMessage($mensagem){
    if($mensagem == "Create-sucesso")
        return '<span class="text-sucess"> Usuário criado com sucesso!</span>';
    if($mensagem == "Create-falha")
        return '<span class="text-error"> Erro ao criar usuário.</span>';
    
    if($mensagem == "Delete-sucesso")
        return '<span class="text-sucess"> Usuário deletado com sucesso.</span>';
    if($mensagem == "Delete-falha")
        return '<span class="text-error"> Erro ao deletar usuário.</span>';

    if($mensagem == "Update-sucesso")
        return '<span class="text-sucess"> Usuário atualizado com suceso!</span>';
    if($mensagem == "Update-falha")
        return '<span class="text-error"> Erro ao atualizar usuário.</span>';

}