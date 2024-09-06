<?php

    require_once('../model/cliente/cliente.php');
    require_once('../model/cliente/clienteDAO.php');

    if(isset($_POST['btnCadastrarCliente'])){
        $cli = new ClienteDAO(new Cliente($_POST['txtCpf'], $_POST['txtNome'], $_POST['txtTelefone'], $_POST['txtEmail'], $_POST['txtDataNasc']));   
        echo(($cli->Insere()==true)?"Cliente Inserido com Sucesso!": "Erro ao inserir Cliente");
    }elseif(isset($_POST['btnExcluirCliente'])){
        $cli = new ClienteDAO(new Cliente($_POST['txtCpf'], null, null, null, null));   
        echo(($cli->Excluir()==true)?"Cliente Excluido com Sucesso!": "Erro ao excluir Cliente");
    }elseif(isset($_POST['btnEditarCliente'])){
        $cli = new ClienteDAO(new Cliente($_POST['txtCpf'], $_POST['txtNome'], $_POST['txtTelefone'], $_POST['txtEmail'], $_POST['txtDataNasc']));   
        echo(($cli->Atualiza()==true)?"Cliente Alterado com Sucesso!": "Erro ao alterar Cliente");
    }

?>