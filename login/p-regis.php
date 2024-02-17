<?php

include('../conn/koneksi.php'); // Pastikan file koneksi.php ada dan terhubung dengan benar

if (isset($_POST['submit'])) {
    $namaUsers = $_POST['namaUsers'];
    $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT); // tambahkan algoritma hash yang diinginkan, dalam kasus ini, PASSWORD_DEFAULT
    $level = $_POST['level'];

    $sql = "INSERT INTO users (namaUsers, pass, level) VALUES ('$namaUsers', '$pass', '$level')";

    if (mysqli_query($conn, $sql)) {
        header('Location: ../index.php');
        exit(); // Pastikan untuk keluar setelah mengarahkan pengguna
    } else {
        die("Input gagal: " . mysqli_error($conn));
    }
}

?>