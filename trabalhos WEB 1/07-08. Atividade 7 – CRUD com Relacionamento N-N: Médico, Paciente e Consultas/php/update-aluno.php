<?php
require_once 'db.php';
require_once 'authenticate.php';

$id = $_GET['id'];

// Seleciona o aluno específico pelo ID
$stmt = $pdo->prepare("SELECT * FROM alunos WHERE id = ?");
$stmt->execute([$id]);
$aluno = $stmt->fetch(PDO::FETCH_ASSOC);

// Obter todos os usuários para associar ao aluno
$stmt = $pdo->query("SELECT id, username FROM usuarios");
$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $matricula = $_POST['matricula'];
    $dataNascimento = $_POST['dataNascimento'];
    $email = $_POST['email'];
    $usuario_id = $_POST['usuario_id'];

    // Atualiza o aluno no banco de dados
    $stmt = $pdo->prepare("UPDATE alunos SET nome = ?, matricula = ?, data_nascimento = ?, email = ?, usuario_id = ? WHERE id = ?");
    $stmt->execute([$nome, $matricula, $dataNascimento, $email, $usuario_id, $id]);

    header('Location: read-aluno.php?id=' . $id);
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Aluno</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <h1>Editar Aluno</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li>Alunos: 
                        <a href="/php/create-aluno.php">Adicionar</a> | 
                        <a href="/php/index-aluno.php">Listar</a>
                    </li>
                    <li>Professores: 
                        <a href="/php/create-professor.php">Adicionar</a> | 
                        <a href="/php/index-professor.php">Listar</a>
                    </li>
                    <li>Turmas: 
                        <a href="/php/create-turma.php">Adicionar</a> | 
                        <a href="/php/index-turma.php">Listar</a>
                    </li>
                    <li><a href="/php/logout.php">Logout (<?= $_SESSION['username'] ?>)</a></li>
                <?php else: ?>
                    <li><a href="/php/user-login.php">Login</a></li>
                    <li><a href="/php/user-register.php">Registrar</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>
    <main>
        <form method="POST">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="<?= $aluno['nome'] ?>" required>

            <label for="matricula">Matrícula:</label>
            <input type="text" id="matricula" name="matricula" value="<?= $aluno['matricula'] ?>" required>

            <label for="dataNascimento">Data de Nascimento:</label>
            <input type="date" id="dataNascimento" name="dataNascimento" value="<?= $aluno['data_nascimento'] ?>" required>

            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" value="<?= $aluno['email'] ?>" required>

            <label for="usuario_id">Usuário:</label>
            <select id="usuario_id" name="usuario_id" required>
                <option value="">Selecione o usuário</option>
                <?php foreach ($usuarios as $usuario): ?>
                    <option value="<?= $usuario['id'] ?>" <?= $usuario['id'] == $aluno['usuario_id'] ? 'selected' : '' ?>>
                        <?= $usuario['username'] ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <button type="submit">Atualizar</button>
        </form>
    </main>
</body>
</html>
