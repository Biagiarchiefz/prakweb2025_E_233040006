<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($isEdit) ? 'Edit' : 'Tambah'; ?> User</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <div class="card">
        <h1><?= isset($isEdit) ? 'Edit' : 'Tambah'; ?> User</h1>

        <?php if (isset($_GET['message'])): ?>
            <div class="alert alert-danger">
                <?= htmlspecialchars($_GET['message']); ?>
            </div>
        <?php endif; ?>

        <form action="index.php?action=<?= isset($isEdit) ? 'update' : 'store'; ?>" method="POST" class="user-form">
            <?php if (isset($isEdit)): ?>
                <input type="hidden" name="id" value="<?= htmlspecialchars($user['id']); ?>">
            <?php endif; ?>

            <div class="form-group">
                <label for="name">Nama:</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    value="<?= isset($user) ? htmlspecialchars($user['name']) : ''; ?>"
                    required
                    placeholder="Masukkan nama User"
                >
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    value="<?= isset($user) ? htmlspecialchars($user['email']) : ''; ?>"
                    required
                    placeholder="Masukkan email user"
                >
            </div>

            <div class="form-actions">
                <a href="index.php" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">
                    <?= isset($isEdit) ? 'Update' : 'Simpan'; ?>
                </button>
            </div>
        </form>
    </div>
</div>
</body>
</html>