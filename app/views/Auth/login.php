<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Avanti Inventory Management</title>
    
    <link rel="stylesheet" href="/assets/css/style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body class="login-page-body">

    <div class="login-container">
        <div class="login-header">
            <i class="fa-solid fa-cube"></i>
            <h1>Avanti inventory management</h1>
            <p>Acesse sua conta para gerenciar o estoque</p>
        </div>

        <form action="/login" method="POST">
            <div class="form-group">
                <label for="username">Usuário</label>
                <input type="text" id="username" name="username" placeholder="nome@empresa.com" required>
            </div>

            <div class="form-group">
                <label for="senha">Senha</label>
                <input type="password" id="senha" name="senha" placeholder="********" required>
            </div>

            <?php if (isset($erro)): ?>
                <div class="alert-warning">
                    <?php echo htmlspecialchars($erro); ?>
                </div>
            <?php endif; ?>
            
            <button type="submit" class="btn btn-primary">
                <i class="fa-solid fa-arrow-right-to-bracket"></i>
                <span>Entrar</span>
            </button>
        </form>

        <div class="login-footer">
            <p>Esqueceu sua senha? Contate o administrador.</p>
        </div>
    </div>

</body>
</html>