<?php

    require_once('../model/conexao/conexao.php');
    require_once('veiculo.php');

    class VeiculoDAO
    {

        private Conexao $conexao;
        private Veiculo $veiculo;

        public function __construct($pVeiculo){
            $this->veiculo = $pVeiculo;
            $this->conexao = new Conexao("leilao", "mysql","root", "", "localhost");
        }

        public function Lista(){
            try{
                $con = $this->conexao->getConexao();

                $comando = $con->prepare("SELECT ID AS IDENTIFICADOR, MODELO, MARCA, COR, ANO, MOTOR, CAMBIO, QUILOMETRAGEM, FIPE, SINISTRO, CONDICAO, COMBUSTIVEL FROM VEICULO");
                $comando->execute();
    
                $resultado = $comando->fetchAll();
    
                $html = <<<HTML
                    <div class="row bg-success cabecalho">
                        <div class="col-1 text-center">Id</div>
                        <div class="col-1">Modelo</div>
                        <div class="col-1">Marca</div>
                        <div class="col-1">Cor</div>
                        <div class="col-1">Ano</div>
                        <div class="col-1">Motor</div>
                        <div class="col-1">Cambio</div>
                        <div class="col-1">Quilometragem</div>
                        <div class="col-1 text-end">FIPE</div>
                        <div class="col-1">Sinistro</div>
                        <div class="col-1">Condição</div>
                        <div class="col-1">Combustivel</div>
                        
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
                            <div class="col-1 text-center">{$linha['IDENTIFICADOR']}</div>
                            <div class="col-1">{$linha['MODELO']}</div>
                            <div class="col-1">{$linha['MARCA']}</div>
                            <div class="col-1">{$linha['COR']}</div>
                            <div class="col-1">{$linha['ANO']}</div>
                            <div class="col-1">{$linha['MOTOR']}</div>
                            <div class="col-1">{$linha['CAMBIO']}</div>
                            <div class="col-1">{$linha['QUILOMETRAGEM']}</div>
                            <div class="col-1 text-end">{$linha['FIPE']}</div>
                            <div class="col-1">{$linha['SINISTRO']}</div>     
                            <div class="col-1">{$linha['CONDICAO']}</div>   
                            <div class="col-1">{$linha['COMBUSTIVEL']}</div>                          
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

                $comando = $con->prepare("INSERT INTO veiculo (MODELO, MARCA, COR, ANO, MOTOR, CAMBIO, QUILOMETRAGEM, FIPE, SINISTRO, CONDICAO, COMBUSTIVEL) VALUES (:modelo, :marca, :cor, :ano, :motor, :cambio, :quilometragem, :fipe, :sinistro, :condicao, :combustivel)");

                $modelo = $this->veiculo->getModelo();
                $marca = $this->veiculo->getMarca();
                $cor = $this->veiculo->getCor();
                $ano = $this->veiculo->getAno();
                $motor = $this->veiculo->getMotor();
                $cambio = $this->veiculo->getCambio();
                $quilometragem = $this->veiculo->getQuilometragem();
                $fipe = $this->veiculo->getFipe();
                $sinistro = $this->veiculo->getSinistro();
                $condicao = $this->veiculo->getCondicao();
                $combustivel = $this->veiculo->getCombustivel();
                
                $comando->bindParam(':modelo', $modelo , PDO::PARAM_STR);
                $comando->bindParam(':marca', $marca , PDO::PARAM_STR);
                $comando->bindParam(':cor', $cor , PDO::PARAM_STR);
                $comando->bindParam(':ano', $ano , PDO::PARAM_STR);
                $comando->bindParam(':motor', $motor , PDO::PARAM_STR);
                $comando->bindParam(':cambio', $cambio , PDO::PARAM_STR);
                $comando->bindParam(':quilometragem', $quilometragem , PDO::PARAM_STR);
                $comando->bindParam(':fipe', $fipe , PDO::PARAM_INT);
                $comando->bindParam(':sinistro', $sinistro , PDO::PARAM_STR);
                $comando->bindParam(':condicao', $condicao , PDO::PARAM_STR);
                $comando->bindParam(':combustivel', $combustivel , PDO::PARAM_STR);

                $comando->execute();

                $con->commit();
                return true;

            }catch(Exception $e){
                $con->rollBack();
                return false;
            }

        }

        public function Atualiza(){
            try {

                // Passo 1 - Abre a conexao com Banco
                $con = $this->conexao->getConexao();
                
                // Passo 2 -  Inicia uma transação
                $con->beginTransaction();
                
                // Passo 3 -  Executa o SQL
                $comando = $con->prepare("UPDATE veiculo SET MODELO = :modelo, MARCA = :marca, COR = :cor, ANO = :ano, MOTOR = :motor, CAMBIO = :cambio, QUILOMETRAGEM = :quilometragem, FIPE = :fipe, SINISTRO = :sinistro, CONDICAO = :condicao, COMBUSTIVEL = :combustivel WHERE ID = :id");
                
                $id = $this->veiculo->getID();
                $modelo = $this->veiculo->getModelo();
                $marca = $this->veiculo->getMarca();
                $cor = $this->veiculo->getCor();
                $ano = $this->veiculo->getAno();
                $motor = $this->veiculo->getMotor();
                $cambio = $this->veiculo->getCambio();
                $quilometragem = $this->veiculo->getQuilometragem();
                $fipe = $this->veiculo->getFipe();
                $sinistro = $this->veiculo->getSinistro();
                $condicao = $this->veiculo->getCondicao();
                $combustivel = $this->veiculo->getCombustivel();
                
                $comando->bindParam(':id', $id, PDO::PARAM_INT);
                $comando->bindParam(':modelo', $modelo , PDO::PARAM_STR);
                $comando->bindParam(':marca', $marca , PDO::PARAM_STR);
                $comando->bindParam(':cor', $cor , PDO::PARAM_STR);
                $comando->bindParam(':ano', $ano , PDO::PARAM_STR);
                $comando->bindParam(':motor', $motor , PDO::PARAM_STR);
                $comando->bindParam(':cambio', $cambio , PDO::PARAM_STR);
                $comando->bindParam(':quilometragem', $quilometragem , PDO::PARAM_STR);
                $comando->bindParam(':fipe', $fipe , PDO::PARAM_INT);
                $comando->bindParam(':sinistro', $sinistro , PDO::PARAM_STR);
                $comando->bindParam(':condicao', $condicao , PDO::PARAM_STR);
                $comando->bindParam(':combustivel', $combustivel , PDO::PARAM_STR);

                $comando->execute();
                // Passo 4 - Confirmacao a execucao

                $con->commit();
                return true;

            } catch(Exception $e) {
                // Cancela a execucao do SQL
                $con->rollBack();
                return false;
            }
        }

        public function Excluir(){
            try{
                $con = $this->conexao->getConexao();

                $con->beginTransaction();

                $comando = $con->prepare("DELETE FROM veiculo WHERE ID = :id");

                $id = $this->veiculo->getID();

                $comando->bindParam(':id', $id, PDO::PARAM_INT);

                $comando->execute();
                $con->commit();
                return true;

            }catch(Exception $e){
                $con->rollback();
                return false;
            }
        }

    }

?>