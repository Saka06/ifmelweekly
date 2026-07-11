<?php
require "fungsi.php";

$qmahasiswa = "SELECT * FROM mahasiswa";
$mahasiswa = tampildata($qmahasiswa); // array berisi data mhs

?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data Mahasiswa | INFORMATIKA 2026</title>

    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <!-- Judul -->
    <h1>INFORMATIKA 2026</h1>

    <!-- Menu Navigasi -->
    <table border="1" cellspacing="0" cellpadding="10px">
        <tr>
            <td><a href="index.php">Home</a></td>
            <td><a href="profile.php">Profile</a></td>
            <td><a href="contact.php">Contact</a></td>
            <td><a href="mahasiswa.php">Data Mahasiswa</a></td>
        </tr>
    </table>

    <br>
    <hr />

    <!-- Header Halaman -->
    <h2>Data Mahasiswa</h2>

    <a href="tambahdata.php">
        <button>Tambah Data</button>
    </a>

    <br><br>

    <table border="1" cellpadding="10px" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Jurusan</th>
            <th>Email</th>
            <th>No. HP</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>

        <?php if (!empty($mahasiswa)) { ?>
            <?php $i = 1; foreach ($mahasiswa as $mhs) { ?>
                <tr>
                    <td align="center"><?= $i ?></td>
                    <td><?= htmlspecialchars($mhs["nama"] ?? "") ?></td>
                    <td><?= htmlspecialchars($mhs["nim"] ?? "") ?></td>
                    <td><?= htmlspecialchars($mhs["jurusan"] ?? "") ?></td>
                    <td><?= htmlspecialchars($mhs["email"] ?? "") ?></td>
                    <td><?= htmlspecialchars($mhs["no_hp"] ?? "") ?></td>
                    <td>
                        <?php
                            $foto = $mhs["foto"] ?? "";
                            $fotoPath = $foto !== "" ? ("assets/images/" . $foto) : "";
                        ?>
                        <?php if ($fotoPath) { ?>
                            <img src="<?= htmlspecialchars($fotoPath) ?>" alt="Foto" width="60px">
                        <?php } ?>
                    </td>
                    <td>
                        <a href="ubahdata.php?id=<?= urlencode($mhs["id"] ?? "") ?>"><button>Ubah</button></a>
                        <a href="hapusdata.php?id=<?= urlencode($mhs["id"] ?? "") ?>" onclick="return confirm('Yakin ingin menghapus data?');"><button>Hapus</button></a>
                    </td>
                </tr>
                <?php $i++; ?>
            <?php } ?>
        <?php } else { ?>
            <tr>
                <td colspan="8" align="center">Tidak ada data mahasiswa.</td>
            </tr>
        <?php } ?>
    </table>

    <br>
    <hr>

    <!-- Link Internal -->
    <h3>Menu Internal</h3>

    <a href="profile.php">Profile</a> |
    <a href="contact.php">Contact</a> |
    <a href="mahasiswa.php">Data Mahasiswa</a>

    <br><br>

    <!-- Footer -->
    <footer>
        <p>© 2026 Program Studi Informatika | Universitas Teknologi Masa Depan</p>
    </footer>

</body>
</html>

