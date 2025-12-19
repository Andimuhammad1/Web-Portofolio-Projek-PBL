<?php
session_start();
require "../../config/database.php";

$name  = htmlspecialchars($_POST['name']);
$nim   = htmlspecialchars($_POST['nim']);
$email = htmlspecialchars($_POST['email']);
$pass  = password_hash($_POST['password'], PASSWORD_DEFAULT);

// cek nim
$cek = mysqli_query($conn, "SELECT * FROM users WHERE nim='$nim'");
if (mysqli_num_rows($cek) > 0) {
    $_SESSION['error'] = "NIM sudah terdaftar";
    header("Location: ../../public/regist.html");
    exit;
}

$query = "INSERT INTO users (name, nim, email, password) 
          VALUES ('$name', '$nim', '$email', '$pass')";
mysqli_query($conn, $query);

$_SESSION['success'] = "Registrasi berhasil";
header("Location: ../../public/login.html");
