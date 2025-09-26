<?php
 require_once __DIR__ . "/../core/Database.php";


 class Usuario{

     public static function procurarPeloNome(string $nome){
         $db = new Database();
         $pdo = $db->getConnection();
         $sql = "SELECT * FROM usuarios WHERE username = ?";
         $stmt = $pdo->prepare($sql);
         # Executa a query passando os dados de forma segura
         $stmt->execute([$nome]);
         return $stmt->fetch(PDO::FETCH_ASSOC);
     }

     public static function criar(string $nome, string $senha){
         $db = new Database();
         $pdo = $db->getConnection();
         $sql = "INSERT INTO usuarios(username, senha) VALUES (?, ?)";
         $stmt = $pdo->prepare($sql);
         $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
         $stmt->execute([$nome, $senhaHash]);
         return $pdo->lastInsertId();
     }
 }

?>