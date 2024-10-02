<!-- Etapa realizada de modo rápido (Utilize o códio pronto do comando e modifiquei o nome para banco de dados , a senha e no número da porta): 9:30h)-->
<?php
class Database {
    private $host = 'localhost';
    private $db = 'escola';
    private $user = 'Clara';
    private $pass = '123456';
    private $port = 3307;
    private $pdo;

    public function connect() {
        try {
            $dsn = "mysql:host=$this->host;port=$this->port;dbname=$this->db";
            $this->pdo = new PDO($dsn, $this->user, $this->pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Erro na conexão: " . $e->getMessage();
        }
    }

    public function getConnection() {
        return $this->pdo;
    }
}
?>