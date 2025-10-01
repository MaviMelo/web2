<?php
require_once 'db.php';

// Obter todos os professores para associar à turma
$stmt = $pdo->query("SELECT id, nome_altor FROM autores");
$autores = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $pdo->query("SELECT id, nome_livro FROM livros");
$autores = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $autor_id = $_POST['autor_id'];
    $livro_id = $_POST['livro_id'];
    $autor_principal = $_POST['autor_principal'];

    


    // Insere a nova turma no banco de dados
    $stmt = $pdo->prepare("INSERT INTO autorias (livro_id, autor_id, autor_principal) VALUES (?, ?, ?)");
    $stmt->execute([$autor_id, $livro_id, $autor_principal]);

    header('Location: index-autoria.php');
}
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Autoria</title>
</head>
<body>

    <main>
        <h2>Adicionar Autoria</h2>

            <label for="autor_id">Autor:</label>
            <select id="autor_id" name="autor_id" required>
                <option value="">Selecione o professor</option>
                <?php foreach ($autores as $autor): ?>
                    <option value="<?= $autor['id'] ?>"><?= $autor['nome_altor'] ?></option>
                <?php endforeach; ?>
            </select>

            <label for="professor_id">Livro:</label>
            <select id="professor_id" name="professor_id" required>
                <option value="">Selecione o professor</option>
                <?php foreach ($professores as $professor): ?>
                    <option value="<?= $professor['id'] ?>"><?= $professor['nome'] ?></option>
                <?php endforeach; ?>
            </select>

            <label for="autor_principal">Autor principal?</label>
            <select id="autor_principal" name="autor_principal" required>
                <option value="">Selecione</option>
                <option value="0">Não</option>
                <option value="1">Sim</option>
            </select>
            
            <!-- Botão para submeter o formulário -->
            <button type="submit">Adicionar</button>
        </form>
    </main>

    <footer>
        <p>&copy; 2024 - Sistema de Gerenciamento de Alunos</p>
    </footer>
</body>
</html>