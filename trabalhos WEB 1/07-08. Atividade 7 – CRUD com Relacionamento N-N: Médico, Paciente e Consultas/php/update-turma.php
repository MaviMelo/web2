<?php
require_once 'db.php';
require_once 'authenticate.php';

$id = $_GET['id'];

// Seleciona a turma específica pelo ID
$stmt = $pdo->prepare("SELECT * FROM turmas WHERE id = ?");
$stmt->execute([$id]);
$turma = $stmt->fetch(PDO::FETCH_ASSOC);

// Obter todos os professores para associar à turma
$stmt = $pdo->query("SELECT id, nome FROM professores");
$professores = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $disciplina = $_POST['disciplina'];
    $turno = $_POST['turno'];
    $professor_id = $_POST['professor_id'];

    // Atualiza a turma no banco de dados
    $stmt = $pdo->prepare("UPDATE turmas SET disciplina = ?, turno = ?, professor_id = ? WHERE id = ?");
    $stmt->execute([$disciplina, $turno, $professor_id, $id]);

    header('Location: read-turma.php?id=' . $id);
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Turma</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <h1>Editar Turma</h1>
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
            <label for="disciplina">Disciplina:</label>
            <input type="text" id="disciplina" name="disciplina" value="<?= $turma['disciplina'] ?>" required>

            <label for="turno">Turno:</label>
            <input type="text" id="turno" name="turno" value="<?= $turma['turno'] ?>" required>

            <label for="professor_id">Professor:</label>
            <select id="professor_id" name="professor_id" required>
                <option value="">Selecione o professor</option>
                <?php foreach ($professores as $professor): ?>
                    <option value="<?= $professor['id'] ?>" <?= $professor['id'] == $turma['professor_id'] ? 'selected' : '' ?>>
                        <?= $professor['nome'] ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <button type="submit">Atualizar</button>
        </form>
    </main>
</body>
</html>
