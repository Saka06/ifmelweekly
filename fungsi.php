<?php
$koneksi = mysqli_connect("localhost", "root", "", "ifannweekly");

function tampildata($query)
{
    global $koneksi;
    $result = mysqli_query($koneksi,$query);
    $row[] = "";
    while($row = mysqli_fetch_assoc($result))
        {
            $rows []= $row;
        }

        return $rows;
}
?>