<?php
class Cliente {
    private $conexao;
    private $Nome;
    private $Email;
    private $Senha;

    public function __construct($conexao, $Nome, $Email, $Senha) {
        $this->conexao = $conexao;
        $this->Nome = $Nome;
        $this->Email = $Email;
        $this->Senha = $Senha;
    }
}
?>