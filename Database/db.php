<?php
Class DB {
    public $pdo;
    public function __construct($db = "miniquiz", $user="root", $pwd="", $host="localhost") {
        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pwd);
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    public function run($sql, $placeholders = null) {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($placeholders);
        return $stmt;
    }
}


$myDb = new DB('miniquiz');
?>
