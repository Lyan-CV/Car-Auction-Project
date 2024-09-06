<?php
    require_once('../model/login/usuario.php');
    require_once('../model/login/usuarioDAO.php');

    $login = $_POST['txtLogin'];
    $senha = $_POST['txtSenha'];

    $dao = new UsuarioDAO (new Usuario($login, $senha));
    if(isset($_POST['btnEntrar'])){
        if($dao->getAutenticado() == 1){
            session_start();
            $_SESSION['usuario'] = $login;
            //header("Location: ../view/cliente.php");

        }else{
            echo "Usuário ou senha incorreto!";
        }
    }
    if(isset($_POST['btnCriarUsu'])){
        $dao = new UsuarioDAO(new Usuario($login, $senha));   
        echo(($dao->Insere()==true)?"Usuário Inserido com Sucesso!": "Erro ao inserir Usuário");
    }


?>