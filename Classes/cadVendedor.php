<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Formulário de Cadastro de Vendedor</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Formulário de Cadastro de Vendedor</h1>
    <form method="POST" enctype="multipart/form-data">
        <label for="Nome">Nome:</label>
        <input type="text" id="Nome" name="Nome" required><br>

        <label for="Email">Email:</label>
        <input type="text" id="Email" name="Email" required><br>

        <label for="Senha">Senha:</label>
        <input type="text" id="Senha" name="Senha" required><br>

        <label for="Cpf">CPF:</label>
        <input type="text" id="Cpf" name="Cpf" required><br>

        <label for="Celular">Celular:</label>
        <input type="text" id="Celular" name="Celular" required><br>

        <label for="Pais">País:</label>
        <input type="text" id="Pais" name="Pais" required><br>

        <label for="Estado">Estado:</label>
        <input type="text" id="Estado" name="Estado" required><br>

        <label for="Cidade">Cidade:</label>
        <input type="text" id="Cidade" name="Cidade" required><br>

        <label for="Cep">CEP:</label>
        <input type="text" id="Cep" name="Cep" required><br>

        <label for="Rua">Rua:</label>
        <input type="text" id="Rua" name="Rua" required><br>

        <label for="Numero">Número:</label>
        <input type="text" id="Numero" name="Numero" required><br>

        <input type="submit" value="Cadastrar Vendedor">
    </form>
    <?php
    require_once 'Vendedor.php';
    $conexao = new mysqli("localhost:3306", "root", "", "pji");

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $Nome = $_POST['Nome'];
        $Email = $_POST['Email'];
        $Senha = $_POST['Senha'];
        $Cpf = $_POST['Cpf'];
        $Celular = $_POST['Celular'];
        $Pais = $_POST['Pais'];
        $Estado = $_POST['Estado'];
        $Cidade = $_POST['Cidade'];
        $Cep = $_POST['Cep'];
        $Rua = $_POST['Rua'];
        $Numero = $_POST['Numero'];

        $vendedor = new Vendedor($conexao, $Cpf, $Celular, $Pais, $Estado, $Cidade, $Cep, $Rua, $Numero);
        $vendedor->salvarVendedor($Nome, $Email, $Senha);
        header("Location: sucesso.php");
        exit();
    }
    ?>
</body>
</html>