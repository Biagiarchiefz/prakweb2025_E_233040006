<?php
class Database {
    private $host = "localhost";
    private $dbname = "prakweb_pertemuan2";
    private $username = "root";
    private $password = "";
    private $pdo;

    public function connect() {
        // mengecek apakah koneksi sudah ada
        if ($this->pdo === null) {
            try {
                $this->pdo = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Koneksi Gagal: " . $e->getMessage());
            }
        }
        return $this->pdo;
    }
}