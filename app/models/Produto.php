<?php
require_once __DIR__ . "/../core/Database.php";

class Produto {
    

    # Busca um produto específico pelo seu ID e pelo ID do usuário.
    
    public static function buscarPorId(int $id, int $usuario_id) {
        $db = new Database();
        $pdo = $db->getConnection();
        
        $sql = "SELECT * FROM produtos WHERE id = ? AND usuario_id = ? LIMIT 1";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id, $usuario_id]);
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function buscarTodosComUsuario(?string $termoBusca = null) {
        $db = new Database();
        $pdo = $db->getConnection();
        
        $sql = "SELECT 
                    produtos.id, produtos.nome, produtos.sku, produtos.categoria, 
                    produtos.quantidade, produtos.preco, produtos.usuario_id, 
                    usuarios.username 
                FROM produtos 
                JOIN usuarios ON produtos.usuario_id = usuarios.id";

        $params = [];

        # Se um termo de busca foi fornecido, adiciona a condição WHERE
        if ($termoBusca) {
            # Usamos LIKE para buscar por partes do nome
            $sql .= " WHERE produtos.nome LIKE ?";
            $params[] = '%' . $termoBusca . '%';
        }

        $sql .= " ORDER BY produtos.id DESC";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    #    Cria um novo produto no banco de dados.
     
    public static function create(string $nome, int $quantidade, float $preco, int $usuario_id, ?string $sku, ?string $categoria, ?string $fornecedor, ?string $descricao, ?string $imagem) {
        $db = new Database();
        $pdo = $db->getConnection();
        
        $sql = "INSERT INTO produtos (nome, quantidade, preco, usuario_id, sku, categoria, fornecedor, descricao, imagem) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$nome, $quantidade, $preco, $usuario_id, $sku, $categoria, $fornecedor, $descricao, $imagem]);
        
        return $pdo->lastInsertId();
    }


     
    # Atualiza os dados de um produto existente.
    
    public static function update(int $id, string $nome, int $quantidade, float $preco, int $usuario_id, ?string $sku, ?string $categoria, ?string $fornecedor, ?string $descricao, ?string $imagem) {
    $db = new Database();
    $pdo = $db->getConnection();    
    $sql = "UPDATE produtos 
            SET nome = ?, quantidade = ?, preco = ?, sku = ?, categoria = ?, fornecedor = ?, descricao = ?, imagem = ? 
            WHERE id = ? AND usuario_id = ?";
    
    $stmt = $pdo->prepare($sql);
    
    return $stmt->execute([$nome, $quantidade, $preco, $sku, $categoria, $fornecedor, $descricao, $imagem, $id, $usuario_id]);
}

     # Deleta um produto do banco de dados.
     
    public static function delete(int $id, int $usuario_id) {
        
        $db = new Database();
        $pdo = $db->getConnection();
        
        $sql = "DELETE FROM produtos WHERE id = ? AND usuario_id = ?";
        
        $stmt = $pdo->prepare($sql);
        
        return $stmt->execute([$id, $usuario_id]);
    }
}
?>