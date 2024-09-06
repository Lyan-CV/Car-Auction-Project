<?php

    require_once('../model/veiculo/veiculo.php');
    require_once('../model/veiculo/veiculoDAO.php');

    if(isset($_POST['btnCadastrar'])){
        $vei = new VeiculoDAO(new Veiculo(0, $_POST['txtModelo'], $_POST['txtMarca'], $_POST['txtCor'], $_POST['txtAno'], $_POST['txtMotor'], $_POST['txtCambio'], $_POST['txtQuilometragem'], $_POST['txtFipe'], $_POST['txtSinistro'], $_POST['txtCondicao'], $_POST['txtCombustivel'],0));   
        echo(($vei->Insere()==true)?"Veiculo Inserido com Sucesso!": "Erro ao inserir Veículo");
    }elseif(isset($_POST['btnExcluir'])){
        $vei = new VeiculoDAO(new Veiculo($_POST['txtId'], null, null, null, null, null, null, null, null, null, null, null,null));    
        echo(($vei->Excluir()==true)?"Veiculo Excluido com Sucesso!": "Erro ao excluir Veículo");
    }elseif(isset($_POST['btnEditar'])){
        $vei = new VeiculoDAO(new Veiculo($_POST['txtId'],$_POST['txtModelo'], $_POST['txtMarca'], $_POST['txtCor'], $_POST['txtAno'], $_POST['txtMotor'], $_POST['txtCambio'], $_POST['txtQuilometragem'], $_POST['txtFipe'], $_POST['txtSinistro'], $_POST['txtCondicao'], $_POST['txtCombustivel'],0));    
        echo(($vei->Atualiza()==true)?"Veiculo Alterado com Sucesso!": "Erro ao alterar Veículo");
    }/*elseif(isset($_POST[])){
        $vei = new VeiculoDAO(new Veiculo(null, null, null, null, null, null, null, null, null, null, null, null,null));    
        echo(($vei->lista()));
    }*/
?>
