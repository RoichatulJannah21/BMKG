<?php session_start() ?>
<?php include 'config.php'?>
<?php include('template/header.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BMKG</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</head>
<body>
<style type="text/css">
    table td{
        white-space:nowrap;
    }
</style>
<div class="container">

<div class="header">
    
</div>
<div class="body">
<div class="card" style="width: 30rem; margin: 0 auto;">
    <div class="card-header">
        <h4>Tambah Data</h4>
        <form method="post" enctype="multipart/form-data" action="petir_import.php">
            Pilih File: 
            <input name="file" type="file" required="required">
            <input name="upload" type="submit" value="Import">
        </form>
    </div>
    
    <form method="POST" action="petir_tambah.php">
    <div class="card-body">
        <table>
            <tr>
                <td><label for="tanggal" class="mb-2 mr-sm-auto"><b>Tanggal</b></label></td>
                <td><input type="date" class="form-control mb-2 mr-sm-3" autocomplete="off"  name="tanggal" required/></td>
            </tr>
            <tr>
                <td><label for="stroke" class="mb-2 mr-sm-auto"><b>Stroke</b></label></td>
                <td><input type="text" class="form-control mb-2 mr-sm-3" name="stroke" required/></td>
            </tr>
            <tr>
                <td><label for="strong_stroke" class="mb-2 mr-sm-auto"><b>Strong Stroke</b></label></td>
                <td><input type="text" class="form-control mb-2 mr-sm-3" name="strong_stroke" required/></td>
            </tr>
            <tr>
                <td><label for="noise" class="mb-2 mr-sm-auto"><b>Noise</b></label></td>
                <td><input type="text" class="form-control mb-2 mr-sm-3" name="noise" required/></td>
            </tr>
            <tr>
                <td><label for="jumlah_energi" class="mb-2 mr-sm-auto"><b>Jumlah Energi</b></label></td>
                <td><input type="text" class="form-control mb-2 mr-sm-3" name="jumlah_energi" required/></td>
            </tr>
            <tr>
                <td><label for="flash" class="mb-2 mr-sm-auto"><b>Flash</b></label></td>
                <td><input type="text" class="form-control mb-2 mr-sm-3" name="flash" required/></td>
            </tr>
        </table>
        </div>
        <div class="card-footer" align="right">
            <button name="Submit" type="submit" value="Simpan" class="btn btn-success">Simpan</button>
            <a href="petir.php" class="btn btn-danger" aria-hidden="true">Batal</a>
        </div>
        </form>
    </div>
</div>
    </div>  

</div>

</body>
</html>