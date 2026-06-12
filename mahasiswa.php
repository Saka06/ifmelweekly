<?php

require "fungsi.php";
$qmahasiswa = "SELECT * FROM mahasiswa";
$mahasiswa = tampildata($qmahasiswa); ///array isinya data mhs

// var_dump($mhs);
// die;

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, Iinitial scale=1.0">
        <title>Data Mahasiswa | INFORMATIKA 2026 </title>
    </head>
        <body>
            <h1>INFORMATIKA 2026</h1>
            <table border="1" cellspacing="0"cellpadding="10px">
                <tr>
                    <td><a href="index.php">Home</a></td>
                    <td><a href="profile.php">Profile</a></td>
                    <td><a href="contact.php">Contact</a></td>
                    <td><a href="mahasiswa.php">Data Mahasiswa</a></td>
                </tr>
            </table>
        <br>
        <hr/>
        <h2>Data mahasiswa</h2>
        <a href="tambahdata.php">
            <button>Tambah Data</button>
        </a>
        <table border="1"cellpadding="10px">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>Jurusan</th>
                <th>Email</th>
                <th>No.HP</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>

            <?php
            $i = 1;
            foreach($mahasiswa as $mhs) {
            ?>
            <tr>
                <td align="center"><?= $i ?></td>
                <td><?php echo $mhs["nama"]?></td>
                <td><?php echo $mhs["nim"]?></td>
                <td><?php echo $mhs["jurusan"]?></td>
                <td><?php echo $mhs["email"]?></td>
                <td><?php echo $mhs["no_hp"]?></td>
                <td><img src ="assets/image/<?= $mhs["foto"] ?>" alt="Foto" width="60px"></td> 
                <td>
                    <a href="editdata.php?id=<?= $mhs["id"] ?>"><button>edit</button></a>
                    <a href="hapusdata.php?id=<?= $mhs["id"] ?>"><button>Hapus</button></a>
                    <script>
                        function confirmDelete() {
                            return confirm("Yakin ingin menghapus data?");
                        }
                    </script>
                </td>
            </tr>
            <?php
            $i++;
                }
            
            ?>
    
            
        </table>
        <br>
        <hr>
        <br>
</body>
</html>
 