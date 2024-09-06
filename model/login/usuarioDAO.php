<?php
    require_once('usuario.php');
    require_once('../model/conexao/conexao.php');

    class UsuarioDAO{
        private Usuario $usuario;
        private Conexao $conexao;

        public function __construct($pUsuario){
            $this->usuario = $pUsuario;
            $this->conexao = new Conexao("leilao", "mysql","root", "", "localhost");
        }

        public function getAutenticado(){
            try{
                $con = $this->conexao->getConexao();

                $comando = $con->prepare("SELECT COUNT(*) AS EXISTE FROM USUARIO WHERE LOGIN = :login AND SENHA = :senha");

                $login= $this->usuario->getLogin();
                $senha= $this->usuario->getSenha();

                $comando->bindParam(':login', $login, PDO::PARAM_STR);
                $comando->bindParam(':senha', $senha, PDO::PARAM_STR);

                $comando->execute();

                $resultado = $comando->fetchAll();
                
                foreach($resultado as $id=>$linha){
                    return $linha['EXISTE'];
                }
            }catch(Exception $e){
                return 0;
            }
        }

        public function Insere(){
            try{
                $con = $this->conexao->getConexao();

                $con->beginTransaction();

                $comando = $con->prepare("INSERT INTO usuario (LOGIN, SENHA) VALUES (:login, :senha)");

                $login = $this->usuario->getLogin();
                $senha = $this->usuario->getSenha();
                
                $comando->bindParam(':login', $login , PDO::PARAM_STR);
                $comando->bindParam(':senha', $senha , PDO::PARAM_STR);
                
                $comando->execute();

                $con->commit();
                return true;

            }catch(Exception $e){
                $con->rollBack();
                return false;
            }

        }
        public function Atualizar(){
            try{
                $con = $this->conexao->getConexao();

                $con->beginTransaction();

                $comando = $con->prepare("UPDATE usuario SET SENHA = :senha WHERE LOGIN = :login");

                $login = $this->usuario->getLogin();
                $senha = $this->usuario->getSenha();
                
                $comando->bindParam(':login', $login , PDO::PARAM_STR);
                $comando->bindParam(':senha', $senha , PDO::PARAM_STR);
                
                $comando->execute();

                $con->commit();
                return true;

            }catch(Exception $e){
                $con->rollBack();
                return false;
            }

        }
        public function Excluir(){
            try{
                $con = $this->conexao->getConexao();

                $con->beginTransaction();

                $comando = $con->prepare("DELETE FROM usuario WHERE LOGIN = :login");

                $login = $this->usuario->getLogin();
                
                $comando->bindParam(':login', $login , PDO::PARAM_STR);
                
                $comando->execute();

                $con->commit();
                return true;

            }catch(Exception $e){
                $con->rollBack();
                return false;
            }

        }
    }
?>