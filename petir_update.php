<?php
include 'config.php';
    $idpetir = $_POST['idpetir'];
    $tanggal  = $_POST['tanggal'];
    // $bulan = $_POST['bulan'];
    // $tahun  = $_POST['tahun'];
    $stroke = $_POST['stroke'];
    $strong_stroke  = $_POST['strong_stroke'];
    $noise  = $_POST['noise'];
    $jumlah_energi  = $_POST['jumlah_energi'];
    $flash  = $_POST['flash'];

mysqli_query($db,"UPDATE petir SET tanggal = '$tanggal',
                                    stroke = '$stroke',
                                    strong_stroke = '$strong_stroke',
                                    noise = '$noise',
                                    jumlah_energi = '$jumlah_energi',
                                    flash = '$flash'
                                WHERE idpetir=$idpetir");

header("location:petir.php");
?>