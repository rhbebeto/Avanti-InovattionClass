<?php
require_once __DIR__ . "/../core/Database.php";
require_once 'app/models/Usuario.php';

// Dados do novo usuário
$username = 'admin2';
$password = 'admin'; // Use uma senha segura!

// Cria o usuário usando o seu model
try {
    Usuario::criar($username, $password);
    echo "Usuário '$username' criado com sucesso!";
} catch (Exception $e) {
    echo "Erro ao criar usuário: " . $e->getMessage();
}
?>