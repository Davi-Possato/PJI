<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Carro</title>
</head>
<body>
<form action method="POST">
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

        <label for="caminhoFoto">Foto do Veículo:</label>
        <input type="file" id="caminhoFoto" name="caminhoFoto" accept="image/*" required><br>

        <label for="Descricao">Descrição:</label><br>
        <textarea id="Descricao" name="Descricao" rows="4" cols="50" required></textarea><br>

        <input type="submit" value="Cadastrar Veículo">
</form>
    <?php
        
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            require_once '../Classes/Carro.php';
            $conexao = new mysqli("localhost:3306", "root", "", "pji");
            $veiculo = new Carro($_POST['Placa'], $_POST['Renavan'], $_POST['Nome'], $_POST['Tipo_Combustivel'], $_POST['Marca'], $_POST['Cpf_Dono'], $caminhoFoto, $_POST['Descricao'], );
            $Placa = isset($_POST['Placa']) ? $_POST['Placa'] : null;
            $Renavan = isset($_POST['Renavan']) ? $_POST['Renavan'] : null;
            $Nome = isset($_POST['Nome']) ? $_POST['Nome'] : null;
            $Tipo_Combustivel = isset($_POST['Tipo_Combustivel']) ? $_POST['Tipo_Combustivel'] : null;
            $Marca = isset($_POST['Marca']) ? $_POST['Marca'] : null;
            $Cpf_Dono = isset($_POST['Cpf_Dono']) ? $_POST['Cpf_Dono'] : null;
            $Descricao = isset($_POST['Descricao']) ? $_POST['Descricao'] : null;
            $caminhoFoto = $veiculo->salvarFoto($_FILES['caminhoFoto']['tmp_name']) !== null;
            if ($Placa === null || $Renavan === null || $Nome === null || $Tipo_Combustivel === null || $Marca === null || $Cpf_Dono === null || $Descricao === null || $caminhoFoto === null) {
                die("Todos os campos são obrigatórios.");
            }
            $stmt = $conexao->prepare("INSERT INTO carro (placa, renavan, nome_modelo, tipo_combustivel, marca, cpf_dono, descricao, caminhoFoto  ) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssssss", $Placa, $Renavan, $Nome, $Tipo_Combustivel, $Marca, $Cpf_Dono, $Descricao, $caminhoFoto);
            if ($stmt->execute()) {
                echo "Novo registro inserido com sucesso!";
            } else {
                echo "Erro: " . $stmt->error;
            }
            $stmt->close();
            $conexao->close();
            exit();
        }
    ?>
</body>
</html>