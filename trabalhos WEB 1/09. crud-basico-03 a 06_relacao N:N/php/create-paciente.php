<?php 
require_once 'db.php';
require_once 'authenticate.php';

// Obter todos os usuários para associar ao paciente
$stmt = $pdo->query("SELECT id, nome FROM usuario");
$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $tipoSanguineo = $_POST['tipoSanguineo'];
    $dataNascimento = $_POST['dataNascimento'];
    $usuario_id = $_POST['usuario_id'];

    // verificar se foi enviada alguma imagem
    if (!empty($_FILES['imagem']['name']))  {
        $extensao = pathinfo($_FILES['imagem']['name'],PATHINFO_EXTENSION); // 'PATHINFO_EXTENSION' retorna apenas a extenção de arquivo referenciado pela superglobal.
        $novoNome= uniqid() . '.' . $extensao;
        $caminho = __DIR__ . '/../storage/' . $novoNome;

        if (move_uploaded_file($_FILES['imagem']['tmp_name'], $caminho)) {
            $stm = $pdo->prepare("INSERT INTO imagens (path) values (?) ");
            $stm->execute([$novoNome]);
            $imagem_id = $pdo->lastInsertId();

        }
    } else {
        $imagem_id = null;
    }

    // Insere o novo paciente no banco de dados
    $stmt = $pdo->prepare("INSERT INTO paciente (nome, tipo_sanguineo, data_nascimento, usuario_id, imagem_id) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$nome, $tipoSanguineo, $dataNascimento, $usuario_id, $imagem_id]);

    header('Location: index-paciente.php');
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Paciente</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <header>
        <h1>Adicionar Paciente</h1>
    </header>
    <main>
        <form method="POST" enctype="multipart/form-data">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>

            <label for="dataNascimento">Data de Nascimento:</label>
            <input type="date" id="dataNascimento" name="dataNascimento" required>

            <label for="tipoSanguineo">Tipo Sanguineo:</label>
            <input type="tipoSanguineo" id="tipoSanguineo" name="tipoSanguineo" required>

            <label for="usuario_id">Usuário:</label>
            <select id="usuario_id" name="usuario_id" required>
                <option value="">Selecione o usuário</option>
                <?php foreach ($usuarios as $usuario): ?>
                    <option value="<?= $usuario['id'] ?>"><?= $usuario['nome'] ?></option>
                <?php endforeach; ?>
            </select>

            <label for="imagem">Imagem de Perfil:</label>
            <input type="file" id="imagem" name="imagem" accept="image/*">

            <button type="submit">Adicionar</button>
        </form>
    </main>
</body>

</html>
