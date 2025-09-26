<?php

if (php_sapi_name() !== 'cli') {
    die("Este script só pode ser executado via linha de comando.");
}

require_once 'app/core/Database.php';
require_once 'app/models/Usuario.php';

// Dados do novo usuário
$username = 'admin3'; // Nome -> Insira suas credenciais aqui para criar o usuario
$password = 'admin'; // Senha-> Insira suas credenciais aqui para criar o usuario


try {
    Usuario::criar($username, $password);
    echo "Usuário '$username' com a senha '$password' criado com sucesso!\n";
} catch (Exception $e) {
    echo "Erro ao criar usuário: " . $e->getMessage() . "\n";
}
?>