    <!-- Header -->
    <header class="header">
        <a href="index.php?page=home" class="logo">PORTO.ID</a>
        <nav class="navbar">
            <a href="index.php?page=home#home">Beranda</a>
            <a href="index.php?page=home#portfolio">Portofolio</a>
            <a href="index.php?page=home#about">Tentang</a>
            <!-- Dropdown Jurusan -->
            <div class="dropdown">
                <a href="#jurusan" class="dropbtn">Jurusan ▾</a>
                <div class="dropdown-content">
                    <a href="index.php?page=home#mesin">MESIN</a>
                    <a href="index.php?page=home#informatika">INFORMATIKA</a>
                    <a href="index.php?page=home#elektro">ELEKTRO</a>
                    <a href="index.php?page=home#manajemen-bisnis">MANAJEMEN BISNIS</a>
                </div>
            </div>

            <?php if (isset($_SESSION['user_id'])): ?>
                <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'mahasiswa'): ?>
                    <a href="index.php?page=student_dashboard">Dashboard</a>
                <?php elseif (isset($_SESSION['role']) && $_SESSION['role'] === 'dosen'): ?>
                    <a href="index.php?page=lecturer_dashboard">Dashboard</a>
                <?php endif; ?>
                
                <span style="color: white; margin-left: 15px;">
                    Welcome, 
                    <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'mahasiswa'): ?>
                         <a href="index.php?page=profile" style="color: white; text-decoration: underline; margin: 0;"><?php echo htmlspecialchars($_SESSION['name'] ?? 'User'); ?></a>
                    <?php else: ?>
                         <?php echo htmlspecialchars($_SESSION['name'] ?? 'User'); ?>
                    <?php endif; ?>
                </span>
                
                <a href="index.php?action=logout" style="margin-left: 10px;">Logout</a>
            <?php else: ?>
                <a href="index.php?page=register">Daftar Akun</a>
                <a href="index.php?page=login">Login</a>
            <?php endif; ?>
        </nav>
    </header>
