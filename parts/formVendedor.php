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
        require_once '../Classes/Vendedor.php';
        $conexao = new mysqli("localhost:3306", "root", "", "pji");
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = isset($_POST['Nome']) ? $_POST['Nome'] : null;
            $email = isset($_POST['Email']) ? $_POST['Email'] : null;
            $senha = isset($_POST['Senha']) ? $_POST['Senha'] : null;
            $cpf = isset($_POST['Cpf']) ? $_POST['Cpf'] : null;
            $celular = isset($_POST['Celular']) ? $_POST['Celular'] : null;
            $pais = isset($_POST['Pais']) ? $_POST['Pais'] : null;
            $estado = isset($_POST['Estado']) ? $_POST['Estado'] : null;
            $cidade = isset($_POST['Cidade']) ? $_POST['Cidade'] : null;
            $cep = isset($_POST['Cep']) ? $_POST['Cep'] : null;
            $rua = isset($_POST['Rua']) ? $_POST['Rua'] : null;
            $numero = isset($_POST['Numero']) ? $_POST['Numero'] : null;

            $todos = [$nome, $email, $senha, $cpf, $celular, $pais, $estado, $cidade, $cep, $rua, $numero];
            if ($nome === null || $email === null || $senha === null || $cpf === null || $celular === null || $pais === null || $estado === null || $cidade === null || $cep === null || $rua === null || $numero === null){
                die("Todos os campos são obrigatórios");
            }
            $stmt = $conexao->prepare("INSERT INTO vendedor (nome, email, senha, cpf, pais, estado, cidade, cep, rua, numero, celular) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param('sssssssssss', $nome, $email, $senha, $cpf, $pais, $estado, $cidade, $cep, $rua, $numero, $celular);
            if ($stmt -> execute()){
                echo'Novo registro inserido!';
            }else{
                echo'Erro' . $stmt->errror();
            }
            $stmt->close();
            $conexao->close();
            foreach($todos as $elemento){
                $elemento = "";
            }


            exit();
        }
    ?>
</body>
</html>