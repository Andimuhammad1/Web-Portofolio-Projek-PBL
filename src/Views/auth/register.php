<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: url('poltek2.jpeg') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .register-container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
            width: 350px;
        }

        h2 { text-align: center; margin-bottom: 25px; color: #333; }
        label { display: block; margin-top: 15px; margin-bottom: 5px; font-weight: bold; }
        input { width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc; box-sizing: border-box; }
        button { margin-top: 20px; width: 100%; padding: 12px; background-color: #4CAF50; border: none; border-radius: 5px; color: white; font-size: 16px; cursor: pointer; }
        button:hover { background-color: #45a049; }
        
        .alert { padding: 10px; background-color: #f44336; color: white; margin-bottom: 15px; border-radius: 5px; text-align: center; }

        .login-link { margin-top: 15px; text-align: center; font-size: 14px; }
        .login-link a { color: #4CAF50; text-decoration: none; }
        .login-link a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="register-container">
        <h2>Daftar Akun</h2>
        
        <?php if (isset($error)): ?>
            <div class="alert"><?php echo $error; ?></div>
        <?php endif; ?>

        <form action="index.php?action=register" method="POST">
            <label for="name">Nama Lengkap</label>
            <input type="text" id="name" name="name" placeholder="Nama Lengkap" required>

            <label for="nim">NIM / NIP</label>
            <input type="text" id="nim" name="nim" placeholder="Masukkan NIM atau NIP" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Masukkan email" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Masukkan password" required>
            
            <label for="role">Role</label>
            <select name="role" style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc;">
                <option value="mahasiswa">Mahasiswa</option>
                <option value="dosen">Dosen</option>
            </select>

            <button type="submit">Daftar</button>
        </form>
        <div class="login-link">
            Sudah punya akun? <a href="index.php?page=login">Login di sini</a>
        </div>
    </div>
</body>
</html>
