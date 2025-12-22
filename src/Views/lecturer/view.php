<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Portofolio</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 0; }
        .container { max-width: 800px; margin: 30px auto; background: white; padding: 30px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        h2 { border-bottom: 2px solid #ddd; padding-bottom: 10px; }
        .portfolio-img { max-width: 100%; height: auto; border-radius: 5px; margin-bottom: 20px; }
        .meta { color: #666; font-size: 0.9em; margin-bottom: 20px; }
        .description { margin-bottom: 20px; line-height: 1.6; }
        .repo-link { display: inline-block; margin-bottom: 20px; color: blue; }
        
        .comment-section { margin-top: 40px; border-top: 1px solid #ddd; padding-top: 20px; }
        .comment-box { background: #f9f9f9; padding: 15px; border-radius: 5px; margin-bottom: 10px; }
        .comment-header { font-weight: bold; margin-bottom: 5px; display: flex; justify-content: space-between; }
        
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        textarea, input[type="number"] { width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box; }
        button { background: #4CAF50; color: white; border: none; padding: 10px 20px; border-radius: 4px; cursor: pointer; }
        .back-link { display: block; margin-bottom: 20px; color: #333; text-decoration: none; }
    </style>
</head>
<body>

    <?php include __DIR__ . '/../partials/header.php'; ?>

    <div class="container">
        <?php if (isset($_SESSION['user_id'])): ?>
            <?php if ($_SESSION['role'] === 'mahasiswa'): ?>
                <a href="index.php?page=student_dashboard" class="back-link">&larr; Kembali ke Dashboard</a>
            <?php else: ?>
                <a href="index.php?page=lecturer_dashboard" class="back-link">&larr; Kembali ke Dashboard</a>
            <?php endif; ?>
        <?php else: ?>
             <a href="index.php?page=home" class="back-link">&larr; Kembali ke Beranda</a>
        <?php endif; ?>
        
        <h2><?php echo htmlspecialchars($portfolio['judul']); ?></h2>
        
        <?php if ($portfolio['gambar']): ?>
            <img src="../public/<?php echo htmlspecialchars($portfolio['gambar']); ?>" alt="Project Image" class="portfolio-img">
        <?php endif; ?>

        <div class="meta">
            Dibuat oleh: <strong><?php echo htmlspecialchars($portfolio['student_name']); ?> (NIM: <?php echo htmlspecialchars($portfolio['nim_nip']); ?>)</strong><br>
            Tanggal: <?php echo date('d M Y H:i', strtotime($portfolio['created_at'])); ?>
        </div>

        <p class="description"><?php echo nl2br(htmlspecialchars($portfolio['deskripsi'])); ?></p>
        
        <a href="<?php echo htmlspecialchars($portfolio['tautan']); ?>" target="_blank" class="repo-link">Lihat Repository Project</a>

        <div class="comment-section">
            <h3>Penilaian & Komentar</h3>

            <!-- Form Penilaian (Only for Dosen) -->
            <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'dosen'): ?>
                <form action="index.php?action=add_grade" method="POST" style="background: #eee; padding: 20px; border-radius: 5px; margin-bottom: 30px;">
                    <input type="hidden" name="portfolio_id" value="<?php echo $portfolio['id']; ?>">
                    
                    <div class="form-group">
                        <label>Nilai (0-100)</label>
                        <input type="number" name="grade" min="0" max="100" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Komentar</label>
                        <textarea name="comment" rows="3" required></textarea>
                    </div>
                    
                    <button type="submit">Kirim Penilaian</button>
                </form>
            <?php endif; ?>

            <!-- List Komentar -->
            <?php foreach ($comments as $c): ?>
                <div class="comment-box">
                    <div class="comment-header">
                        <span><?php echo htmlspecialchars($c['lecturer_name']); ?></span>
                        <span>Nilai: <strong><?php echo $c['grade']; ?></strong></span>
                    </div>
                    <p><?php echo nl2br(htmlspecialchars($c['comment'])); ?></p>
                    <small style="color: #888;"><?php echo date('d M Y H:i', strtotime($c['created_at'])); ?></small>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

</body>
</html>
