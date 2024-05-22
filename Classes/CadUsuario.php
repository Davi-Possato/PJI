<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Formulário de Cadastro de Usuário</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Formulário de Cadastro de Usuário</h1>
    <form method="POST" enctype="multipart/form-data">
    <label for="Nome">Nome:</label>
        <input type="text" id="Nome" name="Nome" required><br>

        <label for="Email">Email:</label>
        <input type="text" id="Email" name="Email" required><br>

        <label for="Senha">Senha:</label>
        <input type="text" id="Senha" name="Senha" required><br>
        <input type="submit" value="Cadastrar Veículo">
    </form>
    <?php
    require_once 'Usuario.php';
    $conexao = new mysqli("localhost:3306", "root", "", "pji");
    $usuario = new Usuario($conexao);
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $Nome = $_POST['Nome'];
        $Email = $_POST['Email'];
        $Senha = $_POST['Senha'];
        $usuario->salvarUsuario($this->Nome, $this->Email, $this->Senha);
        header("Location: sucesso.php");
        exit();
    }
    ?>
</body>
</html>