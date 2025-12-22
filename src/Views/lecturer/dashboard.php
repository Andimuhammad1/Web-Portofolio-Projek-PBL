<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lecturer Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        .container { max-width: 1200px; margin: 20px auto; padding: 20px; background: white; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        .search-box { margin: 20px 0; display: flex; }
        .search-box input { padding: 10px; flex: 1; border: 1px solid #ddd; }
        .search-box button { padding: 10px 20px; background: #333; color: white; border: none; cursor: pointer; }

        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 12px; border-bottom: 1px solid #ddd; text-align: left; }
        th { background-color: #f2f2f2; }
        tr:hover { background-color: #f5f5f5; }
        .btn { padding: 5px 10px; background: #2196F3; color: white; text-decoration: none; border-radius: 3px; }
    </style>
</head>
<body>

    <?php include __DIR__ . '/../partials/header.php'; ?>

    <div class="container">
        <h2>Daftar Portofolio Mahasiswa</h2>

        <form method="GET" action="index.php" class="search-box">
            <input type="hidden" name="page" value="lecturer_dashboard">
            <input type="text" name="search" placeholder="Cari Nama Mahasiswa atau NIM..." value="<?php echo htmlspecialchars($_GET['search'] ?? ''); ?>">
            <button type="submit">Cari</button>
        </form>

        <table>
            <thead>
                <tr>
                    <th>Mahasiswa</th>
                    <th>NIM</th>
                    <th>Judul Portofolio</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($portfolios)): ?>
                    <tr><td colspan="5" style="text-align: center;">Tidak ada data portofolio.</td></tr>
                <?php else: ?>
                    <?php foreach ($portfolios as $p): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($p['student_name']); ?></td>
                            <td><?php echo htmlspecialchars($p['nim_nip']); ?></td>
                            <td><?php echo htmlspecialchars($p['judul']); ?></td>
                            <td><?php echo date('d M Y', strtotime($p['created_at'])); ?></td>
                            <td><a href="index.php?page=view_portfolio&id=<?php echo $p['id']; ?>" class="btn">Lihat Detail</a></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

</body>
</html>
