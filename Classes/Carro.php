<?php
    class Carro {
        private $Placa;
        private $Renavan;
        private $Nome;
        private $Tipo_Combustivel;
        private $Marca;
        private $Cpf_Dono;
        private $Descricao;
        private $caminhoFoto;
    
        public function __construct($Placa, $Renavan, $Nome, $Tipo_Combustivel, $Marca, $Cpf_Dono, $Descricao, $caminhoFoto) {
            $this->Placa = $Placa;
            $this->Renavan = $Renavan;
            $this->Nome = $Nome;
            $this->Tipo_Combustivel = $Tipo_Combustivel;
            $this->Marca = $Marca;
            $this->Cpf_Dono = $Cpf_Dono;
            $this->Descricao = $Descricao;
            $this->caminhoFoto = $caminhoFoto;
        }
    
        public function salvarFoto($arquivoTemporario) {
            $nomeFoto = uniqid() . '.jpg';
            $caminhoFoto = $this->uploadDirectory . $nomeFoto;
    
            // Verificar se o arquivo é uma imagem válida
            $fileInfo = getimagesize($arquivoTemporario);
            if ($fileInfo === false) {
                throw new Exception("O arquivo não é uma imagem válida.");
            }
    
            // Mover o arquivo enviado para o diretório de upload
            if (!move_uploaded_file($arquivoTemporario, $caminhoFoto)) {
                throw new Exception("Erro ao mover o arquivo enviado.");
            }
    
            return $nomeFoto; // Retornar apenas o nome da foto
         }
        }
?>
