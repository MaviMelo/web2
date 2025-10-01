<?php
require_once 'db.php';
require_once 'authenticate.php';

$id = $_GET['id'];

// Seleciona o professor específico pelo ID
$stmt = $pdo->prepare("SELECT * FROM professores WHERE id = ?");
$stmt->execute([$id]);
$professor = $stmt->fetch(PDO::FETCH_ASSOC);

// Obter todos os usuários para associar ao professor
$stmt = $pdo->query("SELECT id, username FROM usuarios");
$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $area = $_POST['area'];
    $usuario_id = $_POST['usuario_id'];

    // Atualiza o professor no banco de dados
    $stmt = $pdo->prepare("UPDATE professores SET nome = ?, area = ?, usuario_id = ? WHERE id = ?");
    $stmt->execute([$nome, $area, $usuario_id, $id]);

    header('Location: read-professor.php?id=' . $id);
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Professor</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <h1>Editar Professor</h1>
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
            <input type="text" id="nome" name="nome" value="<?= $professor['nome'] ?>" required>

            <label for="area">Área:</label>
            <input type="text" id="area" name="area" value="<?= $professor['area'] ?>" required>

            <label for="usuario_id">Usuário:</label>
            <select id="usuario_id" name="usuario_id" required>
                <option value="">Selecione o usuário</option>
                <?php foreach ($usuarios as $usuario): ?>
                    <option value="<?= $usuario['id'] ?>" <?= $usuario['id'] == $professor['usuario_id'] ? 'selected' : '' ?>>
                        <?= $usuario['username'] ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <button type="submit">Atualizar</button>
        </form>
    </
