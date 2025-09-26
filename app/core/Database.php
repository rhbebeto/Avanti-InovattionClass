<?php
class Database {
    #Credenciais do banco de dados
    private $host = "localhost";
    private $db_name = "estoque";
    private $username = "root";
    private $password = "root";
    private $conn;

    // construtor já tenta abrir a conexão
    public function __construct() {
        try {
            #Cria a instância do PDO para estabelecer a conexão
            $this->conn = new PDO(
                "mysql:host={$this->host};dbname={$this->db_name};charset=utf8",
                $this->username,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            die("Erro de conexão: " . $e->getMessage());
        }
    }

    // Retorna a instância da conexão já estabelecida
    public function getConnection() {
        return $this->conn;
    }
}
?>
