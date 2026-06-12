<?php
require "fungsi.php";

$id = isset($_GET["id"]) ? (int) $_GET["id"] : 0;

if ($id <= 0) {
    echo "<script>
            alert('ID tidak valid.');
            window.location.href = 'mahasiswa.php';
          </script>";
    exit;
}

if (hapusdata($id) > 0) {
    echo "<script>
            alert('Data Berhasil Dihapus!');
            window.location.href = 'mahasiswa.php';
          </script>";
} else {
    echo "<script>
            alert('Data Gagal Dihapus!');
            window.location.href = 'mahasiswa.php';
          </script>";
}
?>