<!DOCTYPE html>
<html>
<head>
    <title>Lab 11 PHP OOP</title>
    <style>
        body { font-family: Arial; margin:0; padding:0; }
        .sidebar { width:200px; background:#eee; float:left; height:100vh; padding:15px; }
        .content { margin-left:220px; padding:20px; }
    </style>
</head>
<body>

<div class="sidebar">
    <h3>Menu</h3>
    <a href="/lab11_php_oop/artikel/index">Artikel</a><br>
    <a href="/lab11_php_oop/artikel/tambah">Tambah Artikel</a>
</div>

<div class="content">

<div class="collapse navbar-collapse">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
            <a class="nav-link" href="../home/index">Home</a>
        </li>

        <?php if (isset($_SESSION['is_login'])): ?>
            <li class="nav-item">
                <a class="nav-link" href="../artikel/index">Data Artikel</a>
            </li>
        <?php endif; ?>
    </ul>

    <ul class="navbar-nav ms-auto">
        <?php if (isset($_SESSION['is_login'])): ?>
            <li class="nav-item">
                <a class="nav-link" href="../user/logout">
                    Logout (<?= $_SESSION['nama'] ?>)
                </a>
            </li>
        <?php else: ?>
            <li class="nav-item">
                <a class="nav-link" href="../user/login">Login</a>
            </li>
        <?php endif; ?>
    </ul>
</div>

