<?php session_start() ?>

<!DOCTYPE  HTML>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html;  charset=iso-8859-1">
    <title>Delete</title>
</head>

<body>
    <?php
            //  Include  our  login  information
    require_once('config.php');
            
    $db = mysqli_connect($server, $user, $password, $nama_database);

    if( !$db ){
    die("Gagal terhubung dengan database: " . mysqli_connect_error());
    }

    $idgempa = $_GET['idgempa'];

            //Asign  a  query
    $data = "DELETE FROM `gempa` WHERE (`idgempa` = " . $idgempa . ")";

            //  Execute  the  query
    $result = mysqli_query($db, $data);
    if (!$result) {
        die("Could  not  query  the  database:  <br  />" . mysqli_error($db));
    }

    header('Location: http://localhost/bmkg/index.php');

    ?>
    
</body>

</html>