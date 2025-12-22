<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Portofolio</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 0; }
        .container { max-width: 600px; margin: 50px auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        h2 { text-align: center; }
        form { display: flex; flex-direction: column; }
        label { margin-top: 10px; font-weight: bold; }
        input, textarea { padding: 10px; margin-top: 5px; border: 1px solid #ddd; border-radius: 5px; }
        button { margin-top: 20px; padding: 10px; background: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer; }
        button:hover { background: #45a049; }
        .back-link { display: block; margin-top: 15px; text-align: center; color: #333; }
    </style>
</head>
<body>

    <?php include __DIR__ . '/../partials/header.php'; ?>

    <div class="container">
        <h2>Tambah Portofolio</h2>
        <form action="index.php?action=create_portfolio" method="POST" enctype="multipart/form-data">
            <label>Judul Proyek</label>
            <input type="text" name="title" required>

            <label>Deskripsi</label>
            <textarea name="description" rows="5" required></textarea>

            <label>Link Repository (GitHub/GitLab)</label>
            <input type="url" name="repo_link" required>

            <label>Gambar Project</label>
            <input type="file" name="image" accept="image/*" required>

            <button type="submit">Simpan</button>
        </form>
        <a href="index.php?page=student_dashboard" class="back-link">Kembali ke Dashboard</a>
    </div>

</body>
</html>
