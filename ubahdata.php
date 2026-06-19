<?php

    require 'fungsi.php';

    $id = $_GET["id"];

    $query = "SELECT * FROM mahasiswa WHERE id = $id";
    $mhs = tampildata($query);

    var_dump($mhs);

    if(isset($_POST["submit"])) {
        
        if (ubahdata($_POST) > 0) {

        echo "<script>
                alert('Data berhasil diubah!');
                window.location.href = 'mahasiswa.php';
              </script>";
        } else {
        echo "<script>
                alert('Data gagal diubah!');
                window.location.href = 'mahasiswa.php';
              </script>";
    }
    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data Mahasiswa</title>
</head>
<body>
    <h2>Ubah Data Mahasiswa</h2>
    <form action="" method="post" enctype = "multipart/form-data">
        <table cellPadding="5px">
            <tr>
                <td><label for="nama">Nama :</label></td>
                <td><input type="text" name="nama" id="nama" required
                value="<?= $mhs["nama"]; ?>"></td>
            </tr>
            <tr>
                <td><label for="nim">NIM :</label></td>
                <td><input type="number" name="nim" id="nim" required
                value="<?= $mhs["nim"]; ?>"></td>
            </tr>
            <tr>
                <td><label for="jurusan">Jurusan :</label></td>
                <td><input type="text" name="jurusan" id="jurusan" required
                value="<?= $mhs["jurusan"]; ?>"></td>
            </tr>
            <tr>
                <td><label for="email">Email :</label></td>
                <td><input type="email" name="email" id="email"
                value="<?= $mhs["email"]; ?>"></td>
            </tr>
            <tr>
                <td><label for="no_hp">No HP :</label></td>
                <td><input type="number" name="no_hp" id="no_hp"
                value="<?= $mhs["no_hp"]; ?>"></td>
            </tr>
            <tr>
                <td><label for="foto">Foto :</label></td>
                <td><input type="text" name="foto" id="foto"
                value="<?= $mhs["foto"]; ?>"></td>
            </tr>
            <tr>
                <td colspan="3">
                    <button type="submit" name="submit">Ubah</button>
                </td>
            </tr>
        </table>
        <br>
        <hr>

        <!-- <form action="">
            <table cellpadding = "5px">
                <tr>
                    <td><label for="nama">Nama: </label></td>
                    <td><input type="text" id="nama" name="nama"></td>
                </tr>
                <tr>
                    <td><label for="nim">NIM: </label></td>
                    <td><input type="number" id="nim" name="nim"></td>
                </tr>
                <tr>
                    <td><label for="pw">Password: </label></td>
                    <td><input type="password" id="pw" name="pw"></td>
                </tr>
                <tr>
                    <td><label for="email">Email: </label></td>
                    <td><input type="email" id="email" name="email"></td>
                </tr>
                <tr>
                    <td><label for="no">No HP: </label></td>
                    <td><input type="tel" id="no" name="no"></td>
                </tr>
                <tr>
                    <td><label for="web">Website Pribadi: </label></td>
                    <td><input type="url" id="web" name="web"></td>
                </tr>
                <tr>
                    <td><label for="ttl">Tanggal Lahir: </label></td>
                    <td><input type="date" id="ttl" name="ttl"></td>
                </tr>
                <tr>
                    <td><label for="warna">Warna Fav: </label></td>
                    <td><input type="color" id="warna" name="warna"></td>
                </tr>
                <tr>
                    <td><label for="kepuasan">Tingkat Kepuasan: </label></td>
                    <td><input type="range" id="kepuasan" name="kepuasan" min="1" max="5"></td>
                </tr>
                <tr>
                    <td><label for="gender">Jenis Kelamin:</label></td>
                    <td>
                        <input type="radio" id="laki" name="gender" value="laki">
                        <label for="laki">Laki-laki</label>
                        <input type="radio" id="perempuan" name="gender" value="perempuan">
                        <label for="perempuan">Perempuan</label>
                    </td>
                </tr>
                <tr>
                    <td><label for="hobi">Hobi: </label></td>
                    <td>
                        <input type="checkbox" id="hobi1" name="hobi1" value="membaca">
                        <label for="membaca">Membaca</label>
                        <input type="checkbox" id="hobi3" name="hobi2" value="menonton">
                        <label for="menonton">Menonton</label>
                        <input type="checkbox" id="hobi3" name="hobi3" value="game">
                        <label for="game">Main Game</label>
                    </td>
                </tr>
                <tr>
                    <td><label for="foto">Foto</label></td>
                    <td><input type="file" id="foto" name="foto"></td>
                </tr>
                <tr>
                    <td><label for="alamat">Alamat: </label></td>
                    <td><input type="textarea" id="alamat" name="alamat"></td>
                </tr>
                <tr>
                    <td><label for="jurusan">Jurusan: </label></td>
                </tr>
            </table>
        </form> -->
        
    </form>
</body>
</html>