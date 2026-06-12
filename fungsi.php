<?php

$dbConfig = [
    'host' => 'localhost',
    'user' => 'root',
    'pass' => '',
    'name' => 'mahasiswa',
    'charset' => 'utf8mb4'
];

$koneksi = mysqli_connect($dbConfig['host'], $dbConfig['user'], $dbConfig['pass'], $dbConfig['name']);

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
    $query = "DELETE FROM mahasiswa WHERE id = $id";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}


?>