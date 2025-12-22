<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Student Portfolio</title>
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

        .login-container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
            width: 350px;
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #333;
        }

        label {
            display: block;
            margin-top: 15px;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box; 
        }

        button {
            margin-top: 20px;
            width: 100%;
            padding: 12px;
            background-color: #4CAF50;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        .alert {
            padding: 10px;
            background-color: #f44336;
            color: white;
            margin-bottom: 15px;
            border-radius: 5px;
            text-align: center;
        }

        .register-link {
            margin-top: 15px;
            text-align: center;
            font-size: 14px;
        }

        .register-link a {
            color: #4CAF50;
            text-decoration: none;
        }

        .register-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login Akun</h2>
        
        <?php if (isset($error)): ?>
            <div class="alert"><?php echo $error; ?></div>
        <?php endif; ?>

        <form action="index.php?action=login" method="POST">
            <label for="nim_nip">NIM / NIP</label>
            <input type="text" id="nim_nip" name="nim_nip" placeholder="Masukkan NIM atau NIP" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Masukkan password" required>

            <button type="submit">Login</button>
        </form>

        <div class="register-link">
            Belum punya akun? <a href="index.php?page=register">Daftar di sini</a>
        </div>
        
        <div style="text-align: center; margin-top: 15px;">
            <a href="index.php?page=home" style="display: inline-block; padding: 10px 20px; background-color: #555; color: white; text-decoration: none; border-radius: 5px; font-size: 14px;">Masuk sebagai Tamu</a>
        </div>
    </div>
</body>
</html>
