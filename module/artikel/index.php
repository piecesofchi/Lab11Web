<?php
$db = new Database();
$data = $db->query("SELECT * FROM artikel");
?>

<h2>Daftar Artikel</h2>
<a href="/lab11_php_oop/artikel/tambah">Tambah Baru</a>
<br><br>

<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Judul</th>
        <th>Keterangan</th>
        <th>Aksi</th>
    </tr>

    <?php while ($row = $data->fetch_assoc()) { ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['judul'] ?></td>
            <td><?= $row['keterangan'] ?></td>
            <td>
                <a href="/lab11_php_oop/artikel/ubah?id=<?= $row['id'] ?>">Ubah</a>
            </td>
        </tr>
    <?php } ?>
</table>
