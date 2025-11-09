<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail User</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <div class="card">
        <h1>Detail User</h1>

        <div class="detail-item">
            <label>ID:</label>
            <span><?= htmlspecialchars($user['id']); ?></span>
        </div>

        <div class="detail-item">
            <label>Nama:</label>
            <span><?= htmlspecialchars($user['name']); ?></span>
        </div>

        <div class="detail-item">
            <label>Email:</label>
            <span><?= htmlspecialchars($user['email']); ?></span>
        </div>

        <div class="action-buttons">
            <a href="index.php" class="btn btn-secondary">Kembali ke Daftar User</a>
            <a href="index.php?action=edit&id=<?= $user['id']; ?>" class="btn btn-warning">Edit</a>
            <a href="index.php?action=delete&id=<?= $user['id']; ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus user ini?')">Hapus</a>
        </div>
    </div>
</div>
</body>
</html>