<?php

    class Usuario{
        private $login;
        private $senha;

        public function __construct($pLogin, $pSenha){
            $this->login=$pLogin;
            $this->senha=$pSenha;
        }

        public function getLogin(){
            return $this->login;
        }
        public function setLogin($pLogin){
            $this->login=$pLogin;
        }  

        public function getSenha(){
            return $this->senha;
        }
        public function setSenha($pSenha){
            $this->senha=$pSenha;
        }
    }
?>