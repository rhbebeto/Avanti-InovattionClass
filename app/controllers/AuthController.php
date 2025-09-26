<?php
require_once __DIR__ . '/../models/Usuario.php';
class AuthController{

     #Exibe a página de login para o usuário.
    public function index() {
        #Esta função simplesmente carrega o arquivo da view.
        require_once __DIR__ . '/../views/Auth/login.php';
    }

     public function login() {
        
        
        # Verificar se os dados foram enviados via POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            #  Pegar username e senha do formulário
            $username = $_POST['username'] ?? '';
            $senha = $_POST['senha'] ?? '';

            $usuario = Usuario::procurarPeloNome($username);

            # Verifica se o usuário existe e se a senha está correta
            if ($usuario && password_verify($senha, $usuario['senha'])) {
                session_start();
                $_SESSION['user_id'] = $usuario['id'];
                
                # Redirecionar para o dashboard
                header('Location: /dashboard'); 
                exit();
            } else {
                # Login falhou: 
                $erro = 'Credenciais inválidas.';
                require_once __DIR__ . '/../views/Auth/login.php';
            }
        }
    }

    public function logout() {
        
        session_start();
        session_destroy();
        header('Location: /login'); 
        exit();
    }
}


?>