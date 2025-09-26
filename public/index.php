<?php
session_start(); // Inicia a sessão

require_once __DIR__ . '/../app/controllers/AuthController.php';
require_once __DIR__ . '/../app/controllers/ProdutoController.php';

// Pega a URL que o usuário acessou 
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Cria as instâncias dos controllers
$authController = new AuthController();
$produtoController = new ProdutoController(); 

switch ($url) {
    case '/login':
        // Se a requisição for POST, processa o login. Senão, mostra a página.
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $authController->login();
        } else {
            $authController->index();
        }
        break;

        
    case '/logout':
        $authController->logout();
        break;

    case '/dashboard':
        $produtoController->index(); 
        break;

    # rota para proccessar o salvamento do novo produto
    case '/produtos/adicionarProduto':
        $produtoController->adicionarProduto();
        break;


    # rota para atualização do produto
    case '/produtos/update':
        $produtoController->update();
        break;

    # rota para excluir produto
    case '/produtos/excluir':
        $produtoController->delete();
        break;

    case '/api/produto':
        $produtoController->getById();
        break;
        
    

    default:
        # redireciona para o login
        header('Location: /login');
        exit();
}

?>