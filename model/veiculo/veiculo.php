<?php

    class Veiculo{

        private $id;
        private $modelo;
        private $marca;
        private $cor;
        private $ano;
        private $motor;
        private $cambio;
        private $quilometragem;
        private $fipe;
        private $sinistro;
        private $condicao;
        private $combustivel;

        public function __construct($pID, $pModelo, $pMarca,$pCor, $pAno, $pMotor, $pCambio, $pQuilometragem, $pFipe, $psinistro, $pcondicao, $pCombustivel, $pfoto){

            $this->id = $pID;
            $this->modelo = $pModelo;
            $this->marca = $pMarca;
            $this->cor = $pCor;
            $this->ano = $pAno;
            $this->motor = $pMotor;
            $this->cambio = $pCambio;
            $this->quilometragem = $pQuilometragem;
            $this->fipe = $pFipe;
            $this->sinistro = $psinistro;
            $this->condicao = $pcondicao;
            $this->combustivel = $pCombustivel;

        }

        public function getCor(){
            return $this->cor;
        }
        public function setCor($pCor){
            $this->cor = $pCor;
        }

        public function getQuilometragem(){
            return $this->quilometragem;
        }
        public function setQuilometragem($pQuilometragem){
            $this->quilometragem = $pQuilometragem;
        }

        public function getMotor(){
            return $this->motor;
        }
        public function setMotor($pMotor){
            $this->motor = $pMotor;
        }

        public function getMarca(){
            return $this->marca;
        }
        public function setMarca($pmarca){
            $this->marca = $pmarca;
        }

        public function getCambio(){
            return $this->cambio;
        }
        public function setCambio($pcambio){
            $this->cambio = $pcambio;
        }

        public function getID(){
            return $this->id;
        }
        public function setID($pID){
            $this->id = $pID;
        }

        public function getModelo(){
            return $this->modelo;
        }
        public function setModelo($pModelo){
            $this->modelo = $pModelo;
        }

        public function getAno(){
            return $this->ano;
        }
        public function setAno($pAno){
            $this->ano = $pAno;
        }

        public function getFipe(){
            return $this->fipe;
        }
        public function setFipe($pfipe){
            $this->fipe = $pfipe;
        }

        public function getSinistro(){
            return $this->sinistro;
        }
        public function setSinistro($pSinistro){
            $this->sinistro = $pSinistro;
        }

        public function getCondicao(){
            return $this->condicao;
        }
        public function setCondicao($pCondicao){
            $this->condicao=$pcondicao;
        }

        public function getCombustivel(){
            return $this->combustivel;
        }
        public function setCombustivel($pCombustivel){
            $this->combustivel=$pCombustivel;
        }
        /*public function getLanceInicial(){
            return $this->lanceInicial
        }
        public function setLanceInicial($pLanceInicial){
            $this->lanceInicial=$pLanceInicial;
        }*/
    }

?>