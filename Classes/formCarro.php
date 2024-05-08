<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Formulário de Cadastro de Veículo</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Formulário de Cadastro de Veículo</h1>
    <form method="POST" enctype="multipart/form-data">
        <label for="Placa">Placa:</label>
        <input type="text" id="Placa" name="Placa" required><br>

        <label for="Renavan">Renavan:</label>
        <input type="text" id="Renavan" name="Renavan" required><br>

        <label for="Nome">Nome:</label>
        <input type="text" id="Nome" name="Nome" required><br>

        <label for="Tipo_Combustivel">Tipo de Combustível:</label>
        <input type="text" id="Tipo_Combustivel" name="Tipo_Combustivel" required><br>

        <label for="Marca">Marca:</label>
        <input type="text" id="Marca" name="Marca" required><br>

        <label for="Cpf_Dono">CPF do Dono:</label>
        <input type="text" id="Cpf_Dono" name="Cpf_Dono" required><br>

        <label for="Foto">Foto do Veículo:</label>
        <input type="file" id="Foto" name="Foto" accept="image/*" required><br>

        <label for="Descricao">Descrição:</label><br>
        <textarea id="Descricao" name="Descricao" rows="4" cols="50" required></textarea><br>

        <input type="submit" value="Cadastrar Veículo">
    </form>
    <?php
    require_once 'Carro.php';
    $conexao = new mysqli("localhost:3306", "root", "", "pji");
    $veiculo = new Carro($conexao);
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $Placa = $_POST['Placa'];
        $Renavan = $_POST['Renavan'];
        $Nome = $_POST['Nome'];
        $Tipo_Combustivel = $_POST['Tipo_Combustivel'];
        $Marca = $_POST['Marca'];
        $Cpf_Dono = $_POST['Cpf_Dono'];
        $Descricao = $_POST['Descricao'];
        $caminhoFoto = $veiculo->salvarFoto($_FILES['Foto']['tmp_name']);
        $veiculo->salvarVeiculo($Placa, $Renavan, $Nome, $Tipo_Combustivel, $Marca, $Cpf_Dono, $caminhoFoto, $Descricao);
        header("Location: sucesso.php");
        exit();
    }
    ?>
</body>
</html>