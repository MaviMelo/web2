<?php
// Inclui o arquivo de conexão com o banco de dados
require_once 'db.php';

// Executa a consulta para obter todos os produtos
$stmt = $pdo->query("SELECT * FROM produto");
// Recupera todos os resultados da consulta como um array associativo
$produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD produtos</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <h1>Bem-vindo ao Sistema de Gerenciamento de produtos</h1>
        <nav>
            <ul>
                <li><a class="buton" href="../index.php">Home</a></li>
                <li><a class="buton" href="create-produto.php">Adicionar produtos</a></li>
            </ul>
        </nav>
    </header>

    <main>
      <h2>Lista de Produtos</h2>
      <div class="box">
        <table class="tabela">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Código de barras</th>
                    <th>Lote</th>
                    <th>Validade</th>
                    <th>Quantidade</th>
                    <th>Data de estoque</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <!-- Itera sobre os produtos e cria uma linha para cada produto na tabela -->
                <?php foreach ($produtos as $produto): ?>
                    <tr>
                        <!-- Exibe os dados do produto -->
                        <td><?= $produto['id'] ?></td>
                        <td><?= $produto['nome'] ?></td>
                        <td><?= $produto['preco'] ?></td>
                        <td><?= $produto['cod_barra'] ?></td>
                        <td><?= $produto['lote'] ?></td>
                        <td><?= $produto['validade'] ?></td>
                        <td><?= $produto['quantidade'] ?></td>
                        <td><?= $produto['data_estoque'] ?></td>
                        <td>
                            <!-- Links para visualizar, editar e excluir o produto -->
                            <a href="read-produto.php?id=<?= $produto['id'] ?>">Visualizar</a>
                            <a href="update-produto.php?id=<?= $produto['id'] ?>">Editar</a>
                            <a href="delete-produto.php?id=<?= $produto['id'] ?>">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
      </div>
    </main>

    <footer>
        <p>&copy; 2024 - Sistema de Gerenciamento de produtos</p>
    </footer>
</body>
</html>
