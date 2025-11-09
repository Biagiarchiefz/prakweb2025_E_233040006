<?php
require_once __DIR__ . '/app/config/Database.php';

$database = new Database();
$pdo = $database->connect();

if ($pdo) {
    echo "Koneksi berhasil!<br>";

    // Test query
    $stmt = $pdo->query("SHOW TABLES");
    echo "Tabel yang ada:<br>";
    while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
        echo "- " . $row[0] . "<br>";
    }
} else {
    echo "Koneksi gagal!";
}
