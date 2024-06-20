<?php
    require_once 'Cliente.php';

    class Vendedor extends Cliente {
        private $Cpf;
        private $Celular;
        private $Pais;
        private $Estado;
        private $Cidade;
        private $Cep;
        private $Rua;
        private $Numero;

        public function __construct($conexao, $Cpf, $Celular, $Pais, $Estado, $Cidade, $Cep, $Rua, $Numero) {
            parent::__construct($conexao);
            $this->Cpf = $Cpf;
            $this->Celular = $Celular;
            $this->Pais = $Pais;
            $this->Estado = $Estado;
            $this->Cidade = $Cidade;
            $this->Cep = $Cep;
            $this->Rua = $Rua;
            $this->Numero = $Numero;
        }
    }
?>