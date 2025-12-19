<?php
session_start();
require "../../config/database.php";

$nim = $_POST['nim'];
$pass  = $_POST['password'];

$query = mysqli_query($conn, "SELECT * FROM users WHERE nim='$nim'");
$user  = mysqli_fetch_assoc($query);

if ($user && password_verify($pass, $user['password'])) {
    $_SESSION['login'] = true;
    $_SESSION['user'] = $user;
    header("Location: ../../public/dashboard.html");
} else {
    $_SESSION['error'] = "NIM atau password salah";
    header("Location: ../../public/login.html");
}
