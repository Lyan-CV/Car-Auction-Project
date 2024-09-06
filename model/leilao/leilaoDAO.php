<?php

    require_once('../model/conexao/conexao.php');
    require_once('leilao.php');
    class LeilaoDAO{
        private Conexao $conexao;
        private Leilao $leilao;

        public function __construct($pLeilao){
            $this->leilao = $pLeilao;
            $this->conexao = new Conexao("leilao", "mysql","root", "", "localhost");
        }

        public function Lista(){
            try{
                $con = $this->conexao->getConexao();
    
                $comando = $con->prepare("SELECT IDLEILAO, LANCEINICIAL, DATAINICIO, DATAFIM, HORAINICIO, HORAFIM FROM LEILAO");
                $comando->execute();
    
                $resultado = $comando->fetchAll();
    
                $html = <<<HTML
                    <div class="row bg-success cabecalho">
                        <div class="col-1 text-center">Id</div>
                        <div class="col-2">Lance Inicial</div>
                        <div class="col-2">Data de Inicio</div>
                        <div class="col-2">Data de Fechamento</div>
                        <div class="col-2">Hora de Inicio</div>
                        <div class="col-2">Hora de Fechamento</div>
                        
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
                            <div class="col-1 text-center">{$linha['IDLEILAO']}</div>
                            <div class="col-2">{$linha['LANCEINICIAL']}</div>
                            <div class="col-2">{$linha['DATAINICIO']}</div>
                            <div class="col-2">{$linha['DATAFIM']}</div>
                            <div class="col-2">{$linha['HORAINICIO']}</div>
                            <div class="col-2">{$linha['HORAFIM']}</div>                        
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
    
                    $comando = $con->prepare("INSERT INTO leilao (IDLEILAO, LANCEINICIAL, DATAINICIO, DATAFIM, HORAINICIO, HORAFIM) VALUES (:idLeilao, :lanceInicial, :dataInicio, :dataFim, :horaInicio, :horaFim)");
    
                    $idLeilao = $this->leilao->getIdLeilao();
                    $lance = $this->leilao->getLance();
                    $dataInicio = $this->leilao->getDataInicio();
                    $dataFim = $this->leilao->getDataFim();
                    $horaInicio = $this->leilao->getHoraInicio();
                    $horaFim = $this->leilao->getHoraFim();
                    
                    $comando->bindParam(':idLeilao', $idLeilao , PDO::PARAM_INT);
                    $comando->bindParam(':lanceInicial', $lance , PDO::PARAM_INT);
                    $comando->bindParam(':dataInicio', $dataInicio , PDO::PARAM_STR);
                    $comando->bindParam(':dataFim', $dataFim , PDO::PARAM_STR);
                    $comando->bindParam(':horaInicio', $horaInicio , PDO::PARAM_STR);
                    $comando->bindParam(':horaFim', $horaFim , PDO::PARAM_STR);
                    
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
    
                    $comando = $con->prepare("UPDATE leilao SET LANCEINICIAL = :lanceInicial, DATAINICIO = :dataInicio, DATAFIM = :dataFim, HORAINICIO = :horaInicio, HORAFIM = :horaFim WHERE IDLEILAO = :idLeilao");
    
                    $idLeilao = $this->leilao->getIdLeilao();
                    $lance = $this->leilao->getLance();
                    $dataInicio = $this->leilao->getDataInicio();
                    $dataFim = $this->leilao->getDataFim();
                    $horaInicio = $this->leilao->getHoraInicio();
                    $horaFim = $this->leilao->getHoraFim();
                    
                    $comando->bindParam(':idLeilao', $idLeilao , PDO::PARAM_INT);
                    $comando->bindParam(':lanceInicial', $lance , PDO::PARAM_INT);
                    $comando->bindParam(':dataInicio', $dataInicio , PDO::PARAM_STR);
                    $comando->bindParam(':dataFim', $dataFim , PDO::PARAM_STR);
                    $comando->bindParam(':horaInicio', $horaInicio , PDO::PARAM_STR);
                    $comando->bindParam(':horaFim', $horaFim , PDO::PARAM_STR);
                    
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
    
                    $comando = $con->prepare("DELETE FROM leilao WHERE IDLEILAO = :idLeilao");
    
                    $idLeilao = $this->leilao->getIdLeilao();
    
                    $comando->bindParam(':idLeilao', $idLeilao , PDO::PARAM_INT);
                    
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