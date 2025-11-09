<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar User</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <div class="header">
        <h1>Daftar User</h1>
        <a href="index.php?action=create" class="btn btn-primary">+ Tambah User</a>
    </div>

    <?php if (!empty($message)): ?>
        <div class="alert alert-success">
            <?= htmlspecialchars($message); ?>
        </div>
    <?php endif; ?>

    <?php if (empty($users)): ?>
        <div class="alert alert-info">
            Belum ada data pengguna. <a href="index.php?action=create">Tambah User</a>
        </div>
    <?php else: ?>
        <!-- Tabel untuk menampilkan daftar semua pengguna -->
        <table class="user-table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            <!-- Loop untuk menampilkan setiap pengguna -->
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= htmlspecialchars($user['id']); ?></td>
                    <!-- Menampilkan nama dengan sanitasi HTML untuk keamanan -->
                    <td><?= htmlspecialchars($user['name']); ?></td>
                    <!-- Menampilkan email dengan sanitasi HTML -->
                    <td><?= htmlspecialchars($user['email']); ?></td>
                    <!-- Link untuk melihat detail pengguna berdasarkan ID -->
                    <td class="action-buttons">
                        <a href="index.php?action=detail&id=<?= $user['id']; ?>" class="btn btn-info btn-small">Detail</a>
                        <a href="index.php?action=edit&id=<?= $user['id']; ?>" class="btn btn-warning btn-small">Edit</a>
                        <a href="index.php?action=delete&id=<?= $user['id']; ?>" class="btn btn-danger btn-small" onclick="return confirm('Apakah Anda yakin ingin menghapus user ini?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>
</body>
</html>