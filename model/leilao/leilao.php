<?php

    class Leilao{
        private $idLeilao;
        private $lanceIncial;
        private $dataInicio;
        private $dataFim;
        private $horaInicio;
        private $horaFim;
        
        public function __construct($pIdLeilao,$pLanceInicial,$pDataInicio,$pDataFim,$pHoraInicio,$pHoraFim){
            $this->idLeilao = $pIdLeilao;
            $this->lanceIncial = $pLanceInicial;
            $this->dataInicio = $pDataInicio;
            $this->dataFim = $pDataFim;
            $this->horaInicio = $pHoraInicio;
            $this->horaFim = $pHoraFim;
        }

        public function getHoraFim(){
            return $this->horaFim;
        }
        public function setHoraFim($pHoraFim){
            $this->horaFim = $pHoraFim;
        }

        public function getHoraInicio(){
            return $this->horaInicio;
        }
        public function setHoraInicio($pHoraInicio){
            $this->horaInicio = $pHoraInicio;
        }

        public function getDataFim(){
            return $this->dataFim;
        }
        public function setDataFim($pDataFim){
            $this->dataFim = $pDataFim;
        }

        public function getDataInicio(){
            return $this->dataInicio;
        }
        public function setDataInicio($pDataInicio){
            $this->dataInicio = $pDataInicio;
        }

        public function getLance(){
            return $this->lanceIncial;
        }
        public function setLance($pLance){
            $this->lanceIncial = $pLance;
        }

        public function getIdLeilao(){
            return $this->idLeilao;
        }
        public function setIdLeilao($pIdLeilao){
            $this->idLeilao = $pIdLeilao;
        }

    }

?>