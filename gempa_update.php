<?php
include 'config.php';

$idgempa = isset($_POST['idgempa']);
<<<<<<< HEAD
$date  = isset($_POST['date']);
$time = isset($_POST['time']);
$lat  = isset($_POST['lat']);
$lon  = isset($_POST['lon']);
$depth= isset($_POST['depth']);
$mag  = isset($_POST['mag']);
$lokasi_1  = isset($_POST['lokasi_1']);
$lokasi_2  = isset($_POST['lokasi_2']);
$felt_1  =  isset($_POST['felt_1']);
$felt_2  =  isset($_POST['felt_2']);
$akibat_1  = isset($_POST['akibat_1']);
$akibat_2  = isset($_POST['akibat_2']);
$tsun  =  isset($_POST['tsun']);
$tsunami  = isset($_POST['tsunami']);
$source_1  = isset($_POST['source_1']);
$source_2  = isset($_POST['source_2']); 
=======
$date  = $_POST['date'];
$time = $_POST['time'];
$lat  = $_POST['lat'];
$lon  = $_POST['lon'];
$depth= $_POST['depth'];
$mag  = $_POST['mag'];
$lokasi_1  =$_POST['lokasi_1'];
$lokasi_2  =$_POST['lokasi_2'];
$felt_1  =  $_POST['felt_1'];
$felt_2  =  $_POST['felt_2'];
$akibat_1  =$_POST['akibat_1'];
$akibat_2  =$_POST['akibat_2'];
$tsun  =  $_POST['tsun'];
$tsunami  =$_POST['tsunami'];
$source_1  = $_POST['source_1'];
$source_2  = $_POST['source_2']; 
>>>>>>> f60498ce42ca0c21f40cbc26a67b0105993a127d

mysqli_query($db,"UPDATE gempa SET date='$date',
                                    time='$time',
                                    lat='$lat',
                                    lon='$lon',
                                    depth='$depth',
                                    mag='$mag',
                                    lokasi_1='$lokasi_1',
                                    lokasi_2='$lokasi_2',
                                    felt_1='$felt_1',
                                    felt_2='$felt_2',
                                    akibat_1='$akibat_1',
                                    akibat_2='$akibat_2',
                                    tsun='$tsun',
                                    tsunami='$tsunami',
                                    source_1='$source_1',
                                    source_2='$source_2'
                                WHERE idgempa=$idgempa");

header("location:index.php");
?>
