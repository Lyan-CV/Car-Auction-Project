<?php
    require_once('cliente.php');
    require_once('../model/conexao/conexao.php');

    class ClienteDAO{
        private Cliente $cliente;
        private Conexao $conexao;

        public function __construct($pCliente){
            $this->cliente = $pCliente;
            $this->conexao = new Conexao("leilao", "mysql","root", "", "localhost");
        }

        public function Lista(){
            try{
                $con = $this->conexao->getConexao();
    
                $comando = $con->prepare("SELECT CPF, NOME, TELEFONE, EMAIL, DATANASC FROM CLIENTE");
                $comando->execute();
    
                $resultado = $comando->fetchAll();
    
                $html = <<<HTML
                    <div class="row bg-success cabecalho">
                        <div class="col-2 text-center">CPF</div>
                        <div class="col-2 text-center">Nome</div>
                        <div class="col-2 text-center">Telefone</div>
                        <div class="col-2 text-center">Email</div>
                        <div class="col-3 text-center">Data de Nascimento</div>
                        
                    </div>
    HTML;
    
                foreach($resultado as $id=>$linha){
    
                    $estilo ="";
                    if($id%2 == 0){
                        $estilo = "linha_par";
                    }else{
                        $estilo = "linha_impar";
                    }
                    $html .= <<<HTML
                        <div class="row $estilo">
                            <div class="col-2 text-center">{$linha['CPF']}</div>
                            <div class="col-2 text-center">{$linha['NOME']}</div>
                            <div class="col-2 text-center">{$linha['TELEFONE']}</div>
                            <div class="col-2 text-center">{$linha['EMAIL']}</div>
                            <div class="col-3 text-center">{$linha['DATANASC']}</div>                       
                        </div>  
    HTML;
                }
                $html .= "</div>";
                echo $html;
    
            }catch(Exception $e){
                return null;
            }
            
        }

        public function Insere(){
            try{
                $con = $this->conexao->getConexao();

                $con->beginTransaction();

                $comando = $con->prepare("INSERT INTO CLIENTE (CPF, NOME, TELEFONE, EMAIL, DATANASC) VALUES (:cpf, :nome, :telefone, :email, :dataNasc)");

                $cpf = $this->cliente->getCPF();
                $nome = $this->cliente->getNome();
                $telefone = $this->cliente->getTelefone();
                $email = $this->cliente->getEmail();
                $dataNasc = $this->cliente->getData();
                
                $comando->bindParam(':cpf', $cpf , PDO::PARAM_STR);
                $comando->bindParam(':nome', $nome , PDO::PARAM_STR);
                $comando->bindParam(':telefone', $telefone , PDO::PARAM_STR);
                $comando->bindParam(':email', $email , PDO::PARAM_STR);
                $comando->bindParam(':dataNasc', $dataNasc , PDO::PARAM_STR);
                
                $comando->execute();

                $con->commit();
                return true;

            }catch(Exception $e){
                $con->rollBack();
                return false;
            }

        }
        public function Atualiza(){
            try{
                $con = $this->conexao->getConexao();

                $con->beginTransaction();

                $comando = $con->prepare("UPDATE cliente SET NOME = :nome, TELEFONE = :telefone, EMAIL = :telefone, DATANASC = :dataNasc WHERE CPF = :cpf");

                $cpf = $this->cliente->getCPF();
                $nome = $this->cliente->getNome();
                $telefone = $this->cliente->getTelefone();
                $email = $this->cliente->getEmail();
                $dataNasc = $this->cliente->getData();
                
                $comando->bindParam(':cpf', $cpf , PDO::PARAM_STR);
                $comando->bindParam(':nome', $nome , PDO::PARAM_STR);
                $comando->bindParam(':telefone', $telefone , PDO::PARAM_STR);
                $comando->bindParam(':email', $email , PDO::PARAM_STR);
                $comando->bindParam(':dataNasc', $dataNasc , PDO::PARAM_STR);
                
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

                $comando = $con->prepare("DELETE FROM cliente WHERE CPF = :cpf");

                $cpf = $this->cliente->getCPF();
                
                $comando->bindParam(':cpf', $cpf, PDO::PARAM_STR);
                
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