<?php include("template/header.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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

<?php
    
    require_once("config.php");
	$idpetir=$_GET['idpetir'];
    $data1=mysqli_query($db,"SELECT * FROM petir WHERE idpetir=$idpetir");
    while($d=mysqli_fetch_array($data1)){
?>

<div class="container-fluid">   
    
<div class="header">
    
</div>
<div class="body">
<div class="card" style="width: 30rem;margin: 0 auto;">
    <div class="card-header">
        <h4>Edit Data</h4>
    </div>
    
    <form method="POST" action="petir_update.php">
    <input type="hidden" name="idpetir" value="<?php echo $d['idpetir'] ?>">
    <div class="card-body">
        <table>
            <tr>
                <td><label for="tanggal" class="mb-2 mr-sm-auto"><b>Tanggal</b></label></td>
                <td><input type="date" class="form-control mb-2 mr-sm-3" name="tanggal"   value="<?php echo $d['tanggal']?>" required></td>
            </tr>
            <tr>
                <td><label for="stroke" class="mb-2 mr-sm-auto"><b>Stroke</b></label></td>
                <td><input type="text" class="form-control mb-2 mr-sm-3" name="stroke" value="<?php echo $d['stroke']?>" required/></td>
            </tr>
            <tr>
                <td><label for="strong_stroke" class="mb-2 mr-sm-auto"><b>Strong Stroke</b></label></td>
                <td><input type="text" class="form-control mb-2 mr-sm-3" name="strong_stroke" value="<?php echo $d['strong_stroke']?>" required/></td>
            </tr>
            <tr>
                <td><label for="noise" class="mb-2 mr-sm-auto"><b>Noise</b></label></td>
                <td><input type="text" class="form-control mb-2 mr-sm-3" name="noise" value="<?php echo $d['noise']?>" required/></td>
            </tr>
            <tr>
                <td><label for="jumlah_energi" class="mb-2 mr-sm-auto"><b>Jumlah Energi</b></label></td>
                <td><input type="text" class="form-control mb-2 mr-sm-3" name="jumlah_energi" value="<?php echo $d['jumlah_energi']?>" required/></td>
            </tr>
            <tr>
                <td><label for="flash" class="mb-2 mr-sm-auto"><b>Flash</b></label></td>
                <td><input type="text" class="form-control mb-2 mr-sm-3" name="flash" value="<?php echo $d['flash']?>" required/></td>
            </tr>
        </table>
        </div>
        <div class="card-footer" align="right">
            <button name="Submit" type="submit" value="Simpan" class="btn btn-success">Simpan</button>
            <a href="petir.php" class="btn btn-danger" value="Batal">Batal</a>
        </div>
        </form>
        <?php 
        }
        ?>
    </div>
</div>
    </div>  

</div>
</div>
</body>
</html>
