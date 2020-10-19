<?php
include 'config.php';

$idgempa = isset($_POST['idgempa']);
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
