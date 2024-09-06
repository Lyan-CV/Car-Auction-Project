<?php

class Conexao {
    // Atributos da classe
    private $database;
    private $fabricante;
    private $usuario;
    private $senha;
    private $servidor;

    // Método construtor
    public function __construct($pdatabase, $pfabricante, $pusuario, $psenha, $pservidor) {
        $this->database = $pdatabase;
        $this->fabricante = $pfabricante;
        $this->usuario = $pusuario;
        $this->senha = $psenha;
        $this->servidor = $pservidor;
    }

    // Método responsavel pela conexao com o banco de dados
    public function getConexao() {
        try {
            $con = new PDO($this->fabricante . ":host=" . $this->servidor . ";dbname=" . $this->database, $this->usuario, $this->senha);
            //echo "OK";
            return $con;
        } catch(Exception $e) {
            //echo "Erro" . $e->getMessage();
            return null;
        }
    }

}

?>