<?php
require_once 'db.php';
require_once 'authenticate.php';

$id = $_GET['id'];

// Prepara a instrução SQL para excluir a turma pelo ID
$stmt = $pdo->prepare("DELETE FROM turmas WHERE id = ?");
$stmt->execute([$id]);

// Redireciona de volta para a lista de turmas após a exclusão
header('Location: index-turma.php');
exit();
?>
