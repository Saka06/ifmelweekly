<?php
    $id = $_GET["id"];
    require "fungsi.php";

    $query = "DELETE FROM mahasiswa WHERE id = $id";
    mysqli_query($koneksi, $query);
    $id = $_GET["id"];

    if(hapusdata($id) > 0)
        {
            echo "<script>
                    alert('Data Berhasil Dihapus!');
                    window.location.href='mahasiswa.php;'
                </script>
                ";
        }
        else
        {
            echo"<script>
                    alert('Data Gagal Dihapus!);
                    window.location.href='mahasiswa.php;'
                </script>
                ";
        }
?>