<?php
require_once 'db.php';

$sql_paciente = $pdo->query("SELECT id, nome FROM paciente");
$paciente = $sql_paciente->fetchAll(PDO::FETCH_ASSOC);

$sql_medico = $pdo->query("SELECT id, nome FROM medico");
$medico + $sql_medico->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $paciente = $_POST = ['paciente'];
    $medico = $_POST = ['medico'];
    $data_hora = $_POST = ['data_hora'];
    $observacao = $_post = ['observacao'];

    $stm = $pdo->prepare("INSERT INTO medico_paciaente (medico_id, paciente_id, data_hora, observacao) VALUES (?, ?, ?, ?) ");
    $stm = $pdo->execute([$medico, $paciente, $data_hora, $observacao]);

    header('location: index-consulta.php');
    exit();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    
    
</body>
</html>