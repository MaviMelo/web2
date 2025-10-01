<?php
// Inclui o arquivo de conexão com o banco de dados
require_once 'db.php';

// Obtém o ID do produto a ser excluído a partir da URL usando o método GET
$id = $_GET['id'];

// Prepara a instrução SQL para excluir o produto pelo ID
$stmt = $pdo->prepare("DELETE FROM produto WHERE id = ?");

// Executa a instrução SQL com o ID do produto
$stmt->execute([$id]);

// Redireciona para a página de listagem de produtos após a exclusão
header('Location: index-produto.php');
?>
