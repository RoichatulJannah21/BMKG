<?php session_start() ?>
<?php include 'config.php'?>
<?php include('template/header.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body>


<style>
    .input-tanggal{
        padding: 10px;
        font-size: 14pt;	
    }
</style>

<div class="container">

    <div class="header">
        
    </div>
    
    <div class="body">
       
            <div class="card" style="width: 40rem; margin: 0 auto;">
                <div class="card-header">
                    <h4>Tambah Data</h4>
                    <form method="post" enctype="multipart/form-data" action="gempa_import.php">
                        Pilih File: 
                        <input name="file" type="file"> 
                        <input name="upload" type="submit" value="Import">
                    </form>
                </div>
                <div class="card-body">
         <form method="POST" action="gempa_tambah.php"> 
         <input type="hidden" name="idadmin" value="<?php echo($_SESSION['idadmin']) ?>">       
             <table>
                <tr>
                    <td><label for="date" class="mb-2 mr-sm-auto"><b>Date</b></label></td>
                    <td><input type="date" class="form-control mb-2 mr-sm-3"  autocomplete="off" name="date" required  ></td>
                    <td><label for="time" class="mb-2 mr-sm-auto"><b>Time</b></label></td>
                    <td><input type="text" class="form-control mb-2 mr-sm-3" name="time" required/></td>
                </tr>
                <tr>
                    <td><label for="lat" class="mb-2 mr-sm-auto"><b>Latitude</b></label></td>
                    <td><input type="text" class="form-control mb-2 mr-sm-3" name="lat" required/></td>
                    <td><label for="lon" class="mb-2 mr-sm-auto"><b>Longitude</b></label></td>
                    <td><input type="text" class="form-control mb-2 mr-sm-3" name="lon" required/></td>
                </tr>
                <tr>
                    <td><label for="depth" class="mb-2 mr-sm-auto"><b>Depth</b></label></td>
                    <td><input type="text" class="form-control mb-2 mr-sm-3" name="depth" required/></td>
                    <td><label for="mag" class="mb-2 mr-sm-auto"><b>Magnitude</b></label></td>
                    <td><input type="text" class="form-control mb-2 mr-sm-3" name="mag" required/></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td><label for="lokasi_1" class="mb-2 mr-sm-auto"><b>Lokasi 1</b></label></td>
                    <td><input type="text" class="form-control mb-2 mr-sm-3" name="lokasi_1" required/></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td><label for="lokasi_2" class="mb-2 mr-sm-auto" ><b>Lokasi 2</b></label></td>
                    <td colspan="5"><textarea type="text" class="form-control mb-2 mr-sm-3" name="lokasi_2" required></textarea></td>
                </tr>
                <tr>
                    <td><label for="felt_1" class="mb-2 mr-sm-auto"><b>Felt 1</b></label></td>
                    <td><input type="text" class="form-control mb-2 mr-sm-3" name="felt_1" required/></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td><label for="felt_2" class="mb-2 mr-sm-auto"><b>Felt 2</b></label></td>
                    <td colspan="5"><textarea type="text" class="form-control mb-2 mr-sm-3" name="felt_2" required></textarea></td>                  
                </tr>
                <tr>
                    <td><label for="akibat_1" class="mb-2 mr-sm-auto"><b>Akibat 1</b></label></td>
                    <td><input type="text" class="form-control mb-2 mr-sm-3" name="akibat_1" required/></td>
                    <td></td>
                    <td></td>                   
                </tr>
                <tr>
                    <td><label for="akibat_2" class="mb-2 mr-sm-auto"><b>Akibat 2</b></label></td>
                    <td colspan="5"><textarea type="text" class="form-control mb-2 mr-sm-3" name="akibat_2" required></textarea></td>               
                </tr>
                <tr>
                    <td style="white-space:nowrap;"><label for="tsun" class="mb-2 mr-sm-auto"><b>Tsunami 1</b></label></td>
                    <td><input type="text" class="form-control mb-2 mr-sm-3" name="tsun" required/></td>
                    <td></td>
                    <td></td>                    
                </tr>
                <tr>
                    <td style="white-space:nowrap;"><label for="tsunami" class="mb-2 mr-sm-auto"><b>Tsunami 2</b></label></td>
                    <td colspan="5"><textarea type="text" class="form-control mb-2 mr-sm-3" name="tsunami" required></textarea></td>  
                </tr>
                <tr>
                    <td><label for="source_1" class="mb-2 mr-sm-auto"><b>source 1</b></label></td>
                    <td><input type="text" class="form-control mb-2 mr-sm-3" name="source_1" required/></td>
                    <td><label for="source_2" class="mb-2 mr-sm-auto" ><b>source 2</b></label></td>
                    <td><input type="text" class="form-control mb-2 mr-sm-3" name="source_2" required/></td>
                </tr>
            </table> 
            </div>
            <div class="card-footer" align="right">
                <tr>
                    <button name="Submit" type="submit" value="Simpan" class="btn btn-success">Simpan</button>
                    <a href="index.php" class="btn btn-danger" aria-hidden="true">Batal</a>
                </tr>
            </div>
            </div> 
        </form>
        </div>  

</div>


</body>

</html>