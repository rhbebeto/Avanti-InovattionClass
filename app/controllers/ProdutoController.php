<?php
require_once __DIR__ . '/../models/Produto.php';

class ProdutoController {

    
    public function index() {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit();
        }

        # Pega o termo de busca da URL (via método GET do formulário)
        $termoBusca = $_GET['busca'] ?? null;

        $usuario_id_logado = $_SESSION['user_id'];
        
        # Passa o termo de busca para o método do Model
        $produtos = Produto::buscarTodosComUsuario($termoBusca);

        # Carrega a view, que agora receberá a lista de produtos filtrada
        require_once __DIR__ . '/../views/produtos/index.php';
    }

    #Salva novo produto
    public function adicionarProduto(){
        # verifica se o método é POST e se o usuário está logad
         if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['user_id'])) {
        
        $nome = $_POST['nome'] ?? '';
        $quantidade = (int)($_POST['quantidade'] ?? 0);
        $preco = (float)($_POST['preco'] ?? 0.0);
        $sku = $_POST['sku'] ?? null;
        $categoria = $_POST['categoria'] ?? null;
        $fornecedor = $_POST['fornecedor'] ?? null;
        $descricao = $_POST['descricao'] ?? null;
        $usuario_id = $_SESSION['user_id'];
        $imagemNome = null;

             #Processa o upload da imagem, se houver
        if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == 0) {
            $uploadDir = __DIR__ . '/../../public/uploads/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
            $nomeArquivo = uniqid() . '-' . basename($_FILES['imagem']['name']);
            $caminhoUpload = $uploadDir . $nomeArquivo;

            if (move_uploaded_file($_FILES['imagem']['tmp_name'], $caminhoUpload)) {
                $imagemNome = $nomeArquivo; // Define o nome do arquivo para salvar no banco
            }
        }

        # Valida os dados e cria o produto no banco
        if ($nome) {
            Produto::create($nome, $quantidade, $preco, $usuario_id, $sku, $categoria, $fornecedor, $descricao, $imagemNome);
        }
        
        header('Location: /dashboard');
        exit();
    }
    
    header('Location: /dashboard');
    exit();
}

    
     # Atualiza o produto no banco de dados.
    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['user_id'])) {
            $id = (int)($_POST['id'] ?? 0);
            $usuario_id = $_SESSION['user_id'];

            #1. BUSCA O PRODUTO EXISTENTE NO BANCO
            $produtoExistente = Produto::buscarPorId($id, $usuario_id);
            if (!$produtoExistente) {
                header('Location: /dashboard');
                exit();
            }

            # PEGA OS DADOS DO FORMULÁRIO (TEXTO)
            $nome = $_POST['nome'] ?? '';
            $quantidade = (int)($_POST['quantidade'] ?? 0);
            $preco = (float)($_POST['preco'] ?? 0.0);
            $sku = $_POST['sku'] ?? null;
            $categoria = $_POST['categoria'] ?? null;
            $fornecedor = $_POST['fornecedor'] ?? null;
            $descricao = $_POST['descricao'] ?? null;

            $imagemNome = $produtoExistente['imagem'];

            # PROCESSA O UPLOAD DA NOVA IMAGEM (SE UMA FOI ENVIADA)
            if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == 0) {
                $uploadDir = __DIR__ . '/../../public/uploads/'; 
                
                #Cria a pasta se ela não existir
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }

                # Gera um nome de arquivo único para evitar sobreposição
                $nomeArquivo = uniqid() . '-' . basename($_FILES['imagem']['name']);
                $caminhoUpload = $uploadDir . $nomeArquivo;

                # Tenta mover o arquivo enviado para nossa pasta
                if (move_uploaded_file($_FILES['imagem']['tmp_name'], $caminhoUpload)) {
                    if ($imagemNome && file_exists($uploadDir . $imagemNome)) {
                        unlink($uploadDir . $imagemNome);
                    }
                    # Define o novo nome da imagem que será salvo no banco
                    $imagemNome = $nomeArquivo;
                }
            }

            
            # VALIDA OS DADOS E ATUALIZA O BANCO
            if ($id > 0 && $nome) {
                Produto::update($id, $nome, $quantidade, $preco, $usuario_id, $sku, $categoria, $fornecedor, $descricao, $imagemNome);
            }

            # REDIRECIONA PARA O DASHBOARD
            header('Location: /dashboard');
            exit();
        }

        header('Location: /dashboard');
        exit();
    }

    public function delete(){
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit();
        }

        $produto_id = (int)($_GET['id'] ?? 0);
        $usuario_id = $_SESSION['user_id'];

        # Se o ID do produto for válid
        if ($produto_id > 0) {

            Produto::delete($produto_id, $usuario_id);
        }

        #  Redireciona de volta para o dashboard em qualquer caso.
        header('Location: /dashboard');
        exit();
    }

    public function getById() {
        if (!isset($_SESSION['user_id'])) {
            http_response_code(403); 
            echo json_encode(['erro' => 'Acesso negado']);
            exit();
        }

        $produto_id = (int)($_GET['id'] ?? 0);
        $usuario_id = $_SESSION['user_id'];

        $produto = Produto::buscarPorId($produto_id, $usuario_id);

        # Define o cabeçalho da resposta para indicar que é JSON
        header('Content-Type: application/json');

        if ($produto) {
            echo json_encode($produto);
        } else {
            http_response_code(404); 
            echo json_encode(['erro' => 'Produto não encontrado ou não pertence ao usuário']);
        }
        exit();
    }

}

?>