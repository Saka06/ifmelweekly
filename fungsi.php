<?php

$dbConfig = [
    'host' => 'localhost',
    'user' => 'root',
    'pass' => 'root',
    'name' => 'ifmelweekly',
    'charset' => 'utf8mb4'
];

$koneksi = $koneksi = mysqli_connect(
    $dbConfig['host'],
    $dbConfig['user'],
    $dbConfig['pass'],
    $dbConfig['name']
);

if (!$koneksi) {
    die('Koneksi gagal: ' . mysqli_connect_error());
}

mysqli_set_charset($koneksi, $dbConfig['charset']);

function tampildata(string $query): array
{
    global $koneksi;
    $rows = [];

    if (empty($query)) {
        return $rows;
    }

    $result = mysqli_query($koneksi, $query);

    if ($result === false) {
        return $rows; // query failed; return empty array
    }

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    mysqli_free_result($result);

    return $rows;
}

function tambahdata($data)
{
    global $koneksi;
    $nama = htmlspecialchars($data["nama"]);
    $nim = htmlspecialchars($data["nim"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $email = htmlspecialchars($data["email"]);
    $nohp = htmlspecialchars($data["no_hp"]);
    $foto = $data["foto"];

    $query = "INSERT INTO mahasiswa
            (nama,nim,jurusan,email,no_hp,foto) VALUES
            ('$nama', '$nim', '$jurusan', '$email','$nohp', '$foto')";

    mysqli_query($koneksi,$query);

    return mysqli_affected_rows($koneksi);
}

function hapusdata($id)
{
    global $koneksi;

    $id = (int) $id;

    if ($id <= 0) {
        return 0;
    }

    $query = "DELETE FROM mahasiswa WHERE id = $id";
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

function register($data)
    {
         global $koneksi;

         $username = stripcslashes($data["username"]);
         $password1 = mysqli_real_escape_string($koneksi,$data["password1"]);
         $password2 = mysqli_real_escape_string($koneksi,$data["password2"]);

        if ($password1 != $password2)
            {
              echo"<script>
                    alert('Konfirmasi Password Tidak Sesuai!');
                    window.location.href='login.php'
                </script>"; 

             return false;
            }
        
            ////enkripsi password
            $password_hash = password_hash($password1, PASSWORD_DEFAULT);

            $query = "INSERT INTO user(username,password) VALUES
            ('$username','$password_hash')";

            mysqli_query($koneksi,$query);
            return mysqli_affected_rows($koneksi);
    }

function ubahdata($data)
{
    global $koneksi;

    $id = isset($data["id"]) ? (int)$data["id"] : 0;
    if ($id <= 0) {
        return 0;
    }

    $nama = htmlspecialchars($data["nama"] ?? "");
    $nim = htmlspecialchars($data["nim"] ?? "");
    $jurusan = htmlspecialchars($data["jurusan"] ?? "");
    $email = htmlspecialchars($data["email"] ?? "");
    $nohp = htmlspecialchars($data["no_hp"] ?? "");
    $foto = htmlspecialchars($data["foto"] ?? "");

    $query = "UPDATE mahasiswa SET
                nama = '$nama',
                nim = '$nim',
                jurusan = '$jurusan',
                email = '$email',
                no_hp = '$nohp',
                foto = '$foto'
              WHERE id = $id";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

?>
