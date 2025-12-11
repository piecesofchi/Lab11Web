<?php 
// Load konfigurasi dan helper jika ada 
include "config.php"; 
// Kita perlu autoloader atau include manual class 
include "class/Database.php"; 
include "class/Form.php"; 
// Mulai Session (jika nanti butuh login) 
session_start(); 
// ROUTING LOGIC 
// Menangkap request path. Contoh: /artikel/tambah 
$path = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : 
'/home/index'; 
// Memecah path menjadi array 
$segments = explode('/', trim($path, '/')); 
// Menentukan Module (default: home) 
$mod = isset($segments[0]) ? $segments[0] : 'home'; 
// Menentukan Action/Page (default: index) 
$page = isset($segments[1]) ? $segments[1] : 'index'; 
// Menentukan path file modul 
$file = "module/{$mod}/{$page}.php"; 
// LOAD TEMPLATE & KONTEN 
include "template/header.php"; 
// Cek apakah file modul ada 
if (file_exists($file)) { 
include $file; 
} else { 
// Jika modul tidak ditemukan
    echo '<div class="alert alert-danger">Modul tidak ditemukan: ' . $mod . 
'/' . $page . '</div>'; 
} 
include "template/footer.php"; 
?> 