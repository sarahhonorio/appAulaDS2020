<?php

    include('../../banco/conexao.php');

    if($conexao){

        $sql = "SELECT idcliente, nome, email, telefone FROM clientes WHERE ativo = 'S' ";
        $resultado = mysqli_query($conexao, $sql);

        
        if($resultado && mysqli_num_rows($resultado) > 0){

            $dadosCliente = array();
            while($linha = mysqli_fetch_assoc($resultado)){
                $dadosCliente[] = array_map('utf8_encode', $linha);
            }

            $dados = array("tipo" =>"success","mensagem" => "","dados" => $dadosCliente);

        } else{
            $dados = array("tipo" => "error","mensagem" => "Não possível localizar o cliente.","dados" => array());
        }

        mysqli_close($conexao);

    }    else{
        $dados = array("tipo" => "info","mensagem" => "Não possível conectar ao banco de dados","dados" => array());
    }

    echo json_encode($dados, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);