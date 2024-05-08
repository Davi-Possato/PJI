<?php
    class Carro {
    private $conexao;
    public function __construct($conexao) {
        $this->conexao = $conexao;
    }

    public function salvarCarro($Placa, $Renavan, $Nome, $Tipo_Combustivel, $Marca, $Cpf_Dono, $Foto, $Descricao) {
        $stmt = $this->conexao->prepare("INSERT INTO veiculos (Placa, Renavan, Nome, Tipo_Combustivel, Marca, Cpf_Dono, Foto, Descricao) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssss", $Placa, $Renavan, $Nome, $Tipo_Combustivel, $Marca, $Cpf_Dono, $Foto, $Descricao);
        $stmt->execute();
    }
    public function salvarFoto($arquivoTemporario) {
        $nomeFoto = uniqid() . '.jpg';
        $caminhoFoto = 'C:\Users\Davi-Pessoal\Pictures' . $nomeFoto;
        move_uploaded_file($arquivoTemporario, $caminhoFoto);
        return $caminhoFoto;
    }
}
?>