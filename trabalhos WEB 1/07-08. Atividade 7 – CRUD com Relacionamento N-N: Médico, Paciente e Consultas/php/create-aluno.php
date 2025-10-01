<?php
require_once 'db.php';
require_once 'authenticate.php';

// Obter todos os usuários para associar ao aluno
$stmt = $pdo->query("SELECT id, username FROM usuarios");
$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $matricula = $_POST['matricula'];
    $dataNascimento = $_POST['dataNascimento'];
    $email = $_POST['email'];
    $usuario_id = $_POST['usuario_id'];

    // Insere o novo aluno no banco de dados
    $stmt = $pdo->prepare("INSERT INTO alunos (nome, matricula, data_nascimento, email, usuario_id) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$nome, $matricula, $dataNascimento, $email, $usuario_id]);

    header('Location: index-aluno.php');
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Aluno</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <h1>Adicionar Aluno</h1>
    </header>
    <main>
        <form method="POST">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>

            <label for="matricula">Matrícula:</label>
            <input type="text" id="matricula" name="matricula" required>

            <label for="dataNascimento">Data de Nascimento:</label>
            <input type="date" id="dataNascimento" name="dataNascimento" required>

            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" required>

            <label for="usuario_id">Usuário:</label>
            <select id="usuario_id" name="usuario_id" required>
                <option value="">Selecione o usuário</option>
                <?php foreach ($usuarios as $usuario): ?>
                    <option value="<?= $usuario['id'] ?>"><?= $usuario['username'] ?></option>
                <?php endforeach; ?>
            </select>

            <button type="submit">Adicionar</button>
        </form>
    </main>
</body>
</html>
