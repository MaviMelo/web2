<?php
require_once 'db.php';
require_once 'authenticate.php';

$id = $_GET['id'];

// Seleciona o paciente específico pelo ID
$stmt = $pdo->prepare("SELECT paciente.*, imagens.path, usuario.nome AS nome_usuario FROM paciente 
JOIN imagens ON paciente.imagem_id = imagens.id
LEFT JOIN usuario ON paciente.usuario_id = usuario.id WHERE paciente.id = ?");
$stmt->execute([$id]);
$paciente = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do paciente</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <header>
        <h1>Detalhes do paciente</h1>
        <nav>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li>Pacientes:
                        <a href="/php/create-paciente.php">Adicionar</a> |
                        <a href="/php/index-paciente.php">Listar</a>
                    </li>
                    <li>Médicos:
                        <a href="/php/create-medico.php">Adicionar</a> |
                        <a href="/php/index-medico.php">Listar</a>
                    </li>
                    <li>Consultas:
                        <a href="/php/create-consulta.php">Adicionar</a> |
                        <a href="/php/index-consulta.php">Listar</a>
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
        <?php if ($paciente): ?> 
            <img src="../storage/<?= $paciente['path']?>" alt="Imagem de Perfil" style="width: 100px; height: 100px;">
            <p><strong>ID:</strong> <?= $paciente['id'] ?></p>
            <p><strong>Nome:</strong> <?= $paciente['nome'] ?></p>
            <p><strong>Tipo Sanguíneo:</strong> <?= $paciente['tipo_sanguineo'] ?></p>
            <p><strong>Data de Nascimento:</strong> <?= $paciente['data_nascimento'] ?></p>
            <p><strong>Usuário Associado:</strong> <?= $paciente['nome_usuario'] ?></p>
            <p>
                <a href="update-paciente.php?id=<?= $paciente['id'] ?>">Editar</a>
                <a href="delete-paciente.php?id=<?= $paciente['id'] ?>">Excluir</a>
            </p>
        <?php else: ?>
            <p>Paciente não encontrado.</p>
        <?php endif; ?>
    </main>
</body>

</html>
