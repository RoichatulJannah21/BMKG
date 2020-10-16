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
        $tanggal  = $_POST['tanggal'];
        $stroke = $_POST['stroke'];
        $strong_stroke  = $_POST['strong_stroke'];
        $noise  = $_POST['noise'];
        $jumlah_energi  = $_POST['jumlah_energi'];
        $flash  = $_POST['flash'];

    // include database connection file
    include_once("config.php");

    // Insert user data into table
    $result3 ="INSERT into petir(tanggal, stroke, strong_stroke, noise,jumlah_energi,flash) 
                        values('$tanggal','$stroke','$strong_stroke','$noise','$jumlah_energi','$flash')";
    $query = mysqli_query($db,$result3);

    // Show message when user added
    if($query) {
		// kalau berhasil alihkan ke halaman index.php dengan status=sukses
		header('Location: petir.php?status=sukses');
	} else {
		// kalau gagal alihkan ke halaman indek.ph dengan status=gagal
		header('Location: petir.php?status=gagal');
    }

} else{
    die("akses dilarang...");
}

?>
</body>
</html>
