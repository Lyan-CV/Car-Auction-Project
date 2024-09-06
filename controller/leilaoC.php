<?php

    require_once('../model/leilao/leilao.php');
    require_once('../model/leilao/leilaoDAO.php');

    if(isset($_POST['btnCadastrarLeilao'])){
        $leilao = new LeilaoDAO(new Leilao(0, $_POST['txtLance'], $_POST['txtDataInicio'], $_POST['txtDataFim'], $_POST['txtHoraInicio'], $_POST['txtHoraFim']));   
        echo(($leilao->Insere()==true)?"Leilao Inserido com Sucesso!": "Erro ao inserir Leilao");
    }elseif(isset($_POST['btnExcluirLeilao'])){
        $leilao = new LeilaoDAO(new Leilao($_POST['txtID'], null, null, null, null, null));   
        echo(($leilao->Excluir()==true)?"Leilao Excluido com Sucesso!": "Erro ao excluir Leilao");
    }elseif(isset($_POST['btnEditarLeilao'])){
        $leilao = new LeilaoDAO(new Leilao($_POST['txtID'], $_POST['txtLance'], $_POST['txtDataInicio'], $_POST['txtDataFim'], $_POST['txtHoraInicio'], $_POST['txtHoraFim']));   
        echo(($leilao->Atualiza()==true)?"Leilao Alterado com Sucesso!": "Erro ao alterar Leilao");
    }/*elseif(isset($_POST[])){
        $vei = new VeiculoDAO(new Veiculo(null, null, null, null, null, null, null, null, null, null, null, null,null));    
        echo(($vei->lista()));
    }*/
?>