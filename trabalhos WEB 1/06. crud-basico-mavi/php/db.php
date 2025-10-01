


<?php

// Ativa a exibição de erros
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Verifica se o driver PDO do PHP para o MySQL está disponível
if (!extension_loaded('pdo_mysql')) {
    die("❌ Erro: Extensão PDO para MySQL não está instalada. Execute: sudo apt install php-mysql #para Ubuntu");
}

// Define as variáveis de conexão ao banco de dados MySQL
$host = 'localhost:3306'; // Endereço do servidor MySQL e a porta utilizada
$db = 'mercado_db';     // Nome do banco de dados
$user = 'root';           // Usuário do banco de dados
$pass = 'root';           // Senha do usuário do banco de dados

// Tenta estabelecer uma conexão com o banco de dados usando PDO
try {
    // Cria uma nova instância de PDO para a conexão com o banco de dados
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    
    // Configura o PDO para lançar exceções em caso de erro
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Se a conexão for bem-sucedida, o código continua normalmente
} catch (PDOException $e) {
    // Se ocorrer um erro ao tentar se conectar, exibe a mensagem de erro
    echo 'Erro: ' . $e->getMessage();
}
?>
