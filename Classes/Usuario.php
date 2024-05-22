<?php
    class Usuario {
        private $conexao;
        private $Nome;
        private $Email;
        private $Senha;
        public function __construct($conexao, $Nome, $Email, $Senha) {
            parent::__construct($conexao);
            $this->conexao = $conexao;
            $this->Nome = $Nome;
            $this->Email = $Email;
            $this->Senha = $Senha;
        }
        public function salvarUsuario($Nome, $Email, $Senha) {
            $stmt = $this->conexao->prepare("INSERT INTO cliente (Nome, Email, Senha) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $Nome, $Email, $Senha);
            $stmt->execute();
        }
    }
?>