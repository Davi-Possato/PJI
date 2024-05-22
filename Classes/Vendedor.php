<?php
    require_once 'Usuario.php';

    class Vendedor extends Usuario {
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

        public function salvarVendedor($Nome, $Email, $Senha) {
            $stmt = $this->conexao->prepare("INSERT INTO vendedor (Nome, Email, Senha, Cpf, Celular, Pais, Estado, Cidade, Cep, Rua, Numero) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssssssss", $Nome, $Email, $Senha, $this->Cpf, $this->Celular, $this->Pais, $this->Estado, $this->Cidade, $this->Cep, $this->Rua, $this->Numero);
            $stmt->execute();
        }
    }
?>