<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Formulário de Cadastro de Usuário</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Formulário de Cadastro de Usuário</h1>
    <form action method="POST">
    <label for="Nome">Nome:</label>
        <input type="text" id="Nome" name="Nome" required><br>
        <label for="Email">Email:</label>
        <input type="text" id="Email" name="Email" required><br>
        <label for="Senha">Senha:</label>
        <input type="password" id="Senha" name="Senha" required><br>
        <input type="submit" value="Cadastrar Veículo">
    </form>
    <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            require_once '../Classes/Cliente.php';
            $conexao = new mysqli("localhost:3306", "root", "", "pji");
            $nome = isset($_POST['Nome']) ? $_POST['Nome'] : null;
            $email = isset($_POST['Email']) ? $_POST['Email'] : null;
            $senha = isset($_POST['Senha']) ? $_POST['Senha'] : null;
            if ($nome === null || $email === null || $senha === null) {
                die("Todos os campos são obrigatórios.");
            }
            $stmt = $conexao->prepare("INSERT INTO cliente (nome, email, senha) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $nome, $email, $idade);
            if ($stmt->execute()) {
                echo "Novo registro inserido com sucesso!";
            } else {
                echo "Erro: " . $stmt->error;
            }
            $stmt->close();
            $conexao->close();
            exit();
        }
        $nome="";
        $email="";
        $senha="";
    ?>
</body>
</html>