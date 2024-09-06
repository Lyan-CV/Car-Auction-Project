<?php
    require_once('leiloeiro.php');
    require_once('../model/conexao/conexao.php');

    class LeiloeiroDAO{
        private Leiloeiro $leiloeiro;
        private Conexao $conexao;

        public function __construct($pleiloeiro){
            $this->leiloeiro = $pleiloeiro;
            $this->conexao = new Conexao("leilao", "mysql","root", "", "localhost");
        }

        

        public function Insere(){
            try{
                $con = $this->conexao->getConexao();

                $con->beginTransaction();

                $comando = $con->prepare("INSERT INTO leiloeiro (LOGIN, SENHA) VALUES (:login, :senha)");

                $login = $this->leiloeiro->getLogin();
                $senha = $this->leiloeiro->getSenha();
                
                $comando->bindParam(':login', $login , PDO::PARAM_INT);
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

                $comando = $con->prepare("UPDATE leiloeiro SET SENHA = :senha WHERE LOGIN = :login");

                $login = $this->leiloeiro->getLogin();
                $senha = $this->leiloeiro->getSenha();
                
                $comando->bindParam(':login', $login , PDO::PARAM_INT);
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

                $comando = $con->prepare("DELETE FROM leiloeiro WHERE LOGIN = :login");

                $login = $this->leiloeiro->getLogin();
                
                $comando->bindParam(':login', $login , PDO::PARAM_INT);
                
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