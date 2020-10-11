<?php
    include 'config.php';
    ?>
<html>
<head>

</head>
<body>
<?php

//Check If form submitted, insert form data into users table.
if(isset($_POST['Submit'])) {
        $idadmin=$_POST['idadmin'];
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

    // include database connection file
    include_once("config.php");

    // Insert user data into table
    $result ="INSERT into gempa(idadmin, date, time ,lat,lon,depth,mag,lokasi_1,lokasi_2,felt_1,felt_2,
                                akibat_1,akibat_2,tsun,tsunami,source_1,source_2) 
                        values('$idadmin','$date','$time','$lat','$lon','$depth','$mag','$lokasi_1','$lokasi_2','$felt_1','$felt_2',
                                '$akibat_1','$akibat_2','$tsun','$tsunami','$source_1','$source_2')";
    $query = mysqli_query($db,$result);

    // Show message when user added
    if($query) {
		// kalau berhasil alihkan ke halaman index.php dengan status=sukses
		header('Location: index.php?status=sukses');
	} else {
		// kalau gagal alihkan ke halaman indek.ph dengan status=gagal
		header('Location: index.php?status=gagal');
    }

} else{
    die("akses dilarang...");
}

?>
</body>
</html>
