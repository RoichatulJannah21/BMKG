<?php
include 'config.php';
$idgempa = isset(filter_input(INPUT_POST, 'idgempa'));
$date  = isset(filter_input(INPUT_POST, 'date'));
$time = isset(filter_input(INPUT_POST, 'time'));
$lat  = isset(filter_input(INPUT_POST, 'lat'));
$lon  = isset(filter_input(INPUT_POST, 'lon'));
$depth= isset(filter_input(INPUT_POST, 'depth'));
$mag  = isset(filter_input(INPUT_POST, 'mag'));
$lokasi_1  = isset(filter_input(INPUT_POST, 'lokasi_1'));
$lokasi_2  = isset(filter_input(INPUT_POST, 'lokasi_2'));
$felt_1  =  isset(filter_input(INPUT_POST, 'felt_1'));
$felt_2  =  isset(filter_input(INPUT_POST, 'felt_2'));
$akibat_1  = isset(filter_input(INPUT_POST, 'akibat_1'));
$akibat_2  = isset(filter_input(INPUT_POST, 'akibat_2'));
$tsun  =  isset(filter_input(INPUT_POST, 'tsun'));
$tsunami  = isset(filter_input(INPUT_POST, 'tsunami'));
$source_1  = isset(filter_input(INPUT_POST, 'source_1'));
$source_2  = isset(filter_input(INPUT_POST, 'source_2'));

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
