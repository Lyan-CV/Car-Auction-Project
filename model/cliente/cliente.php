<?php

    class Cliente{
        private $cpf;
        private $nome;
        private $telefone;
        private $email;
        private $dataNasc;   
        
        public function __construct($pCpf,$pNome,$pTelefone,$pEmail,$pDataNasc){
            $this->cpf = $pCpf;
            $this->nome = $pNome;
            $this->telefone = $pTelefone;
            $this->email = $pEmail;
            $this->dataNasc = $pDataNasc;
        }

        public function getNome(){
            return $this->nome;
        }
        public function setNome($pNome){
            $this->nome = $pNome;
        }

        public function getData(){
            return $this->dataNasc;
        }
        public function setData($pDataNasc){
            $this->dataNasc = $pDataNasc;
        }

        public function getEmail(){
            return $this->email;
        }
        public function setEmail($pEmail){
            $this->email = $pEmail;
        }

        public function getCpf(){
            return $this->cpf;
        }
        public function setCpf($pCpf){
            $this->cpf = $pCpf;
        }

        public function getTelefone(){
            return $this->telefone;
        }
        public function settelefone($pTelefone){
            $this->telefone = $pTelefone;
        }
    }
?>