<?php
    $conn = mysqli_connect("localhost", "root", "root", "ifmelweekly");

    function tampilData($query) {
        global $conn;
        $result = mysqli_query($conn, $query);

        $rows = [];

        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    function tambahData($data) {
        global $conn;
        $nama = htmlspecialchars($data["nama"]);
        $nim = htmlspecialchars($data["nim"]);
        $jurusan = htmlspecialchars($data["jurusan"]);
        $email = htmlspecialchars($data["email"]);
        $no_hp = htmlspecialchars($data["no_hp"]);
        $foto = $data["foto"];

        $query = "INSERT INTO mahasiswa (nama, nim, jurusan, email, no_hp, foto) VALUES 
        ('$nama', '$nim', '$jurusan', '$email', '$no_hp', '$foto')";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }

    function hapusData($id) {
        global $conn;
        $query = "DELETE FROM mahasiswa WHERE id=$id";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }

    function ubahData($data) {
        global $conn;
        $id = $data["id"];
        $nama = htmlspecialchars($data["nama"]);
        $nim = htmlspecialchars($data["nim"]);
        $jurusan = htmlspecialchars($data["jurusan"]);
        $email = htmlspecialchars($data["email"]);
        $no_hp = htmlspecialchars($data["no_hp"]);
        $foto = $data["foto"];

        $query = "UPDATE mahasiswa SET 
        nama = '$nama', 
        nim = '$nim', 
        jurusan = '$jurusan', 
        email = '$email', 
        no_hp = '$no_hp', 
        foto = '$foto' 
        WHERE id = $id";
        
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }
?>