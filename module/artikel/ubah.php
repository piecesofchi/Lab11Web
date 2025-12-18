<?php
$id = $_GET['id'];
$db = new Database();
$data = $db->get("artikel", "id=$id");

if ($_POST) {
    $update = [
        "judul" => $_POST['judul'],
        "keterangan" => $_POST['keterangan']
    ];
    $db->update("artikel", $update, "id=$id");

    echo "<div style='color:green'>Perubahan disimpan!</div>";
}
?>

<h2>Ubah Artikel</h2>

<form method="POST">
    Judul: <br>
    <input type="text" name="judul" value="<?= $data['judul'] ?>"><br><br>

    Keterangan: <br>
    <textarea name="keterangan" cols="30" rows="4"><?= $data['keterangan'] ?></textarea><br><br>

    <button type="submit">Simpan</button>
</form>
