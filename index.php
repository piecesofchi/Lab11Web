<?php
session_start(); // 1. Aktifkan session di baris paling atas

include "config.php";
include "class/Database.php";
include "class/Form.php";

// ... (Kode routing sebelumnya) ...

$path = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '/home/index';
$segments = explode('/', trim($path, '/'));
$mod = isset($segments[0]) ? $segments[0] : 'home';
$page = isset($segments[1]) ? $segments[1] : 'index';

// 2. Cek Session Login
// Halaman yang boleh diakses tanpa login: home, dan modul user (login)
$public_pages = ['home', 'user'];

if (!in_array($mod, $public_pages)) {
    // Jika tidak ada session is_login, lempar ke halaman login
    if (!isset($_SESSION['is_login'])) {
        header('Location: ' . 'user/login');
        exit();
    }
}

// ... (Kode include template dan file modul) ...
$file = "module/{$mod}/{$page}.php";

if (file_exists($file)) {
    // Jangan load header/footer jika sedang di halaman login
    if ($mod == 'user' && $page == 'login') {
        include $file;
    } else {
        include "template/header.php";
        include $file;
        include "template/footer.php";
    }
} else {
    echo "Halaman tidak ditemukan.";
}
?>
