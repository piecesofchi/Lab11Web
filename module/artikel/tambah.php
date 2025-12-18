<?php
$form = new Form("/lab11_php_oop/artikel/tambah", "Simpan Artikel");
$db = new Database();

if ($_POST) {
    $data = [
        "judul" => $_POST['judul'],
        "keterangan" => $_POST['keterangan']
    ];

    $db->insert("artikel", $data);
    echo "<div style='color:green'>Artikel berhasil ditambahkan!</div>";
}
?>

<h2>Tambah Artikel</h2>

<?php
$form->addField("judul", "Judul Artikel");
$form->addField("keterangan", "Keterangan", "textarea");
$form->displayForm();
?>
