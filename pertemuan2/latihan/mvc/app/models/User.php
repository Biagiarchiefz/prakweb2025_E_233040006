<?php
class User {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // mengambil semua data user
    public function getAllUsers() {
        $stmt = $this->pdo->prepare("SELECT * FROM users ORDER BY id DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

   // ambil semua data user berdasarkan id
    public function getUserById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // create user
    public function createUser($name, $email) {
        $stmt = $this->pdo->prepare("INSERT INTO users (name, email) VALUES (?, ?)");
        return $stmt->execute([$name, $email]);
    }

    //update user
    public function updateUser($id, $name, $email) {
        $stmt = $this->pdo->prepare("UPDATE users SET name = ?, email = ? WHERE id = ?");
        return $stmt->execute([$name, $email, $id]);
    }

    // hapus user berdasarkan id
    public function deleteUser($id) {
        $stmt = $this->pdo->prepare("DELETE FROM users WHERE id = ?");
        return $stmt->execute([$id]);
    }
}