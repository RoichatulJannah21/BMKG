<?php include('template/header.php') ?>
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
<script type="text/javascript">
$( function() {
    $( "#datepicker" ).datepicker({dateFormat: 'yy/mm/dd', changeMonth:true, changeYear:true});
  } );
</script>
</head>
<body>
<?php
    require_once("config.php");
	$idgempa=$_GET['idgempa'];
    $data=mysqli_query($db,"SELECT * FROM gempa WHERE idgempa=$idgempa");
    while($d=mysqli_fetch_array($data)){
?>

<div class="container">

    <div class="header">
        
    </div>
    
    <div class="body">
       
            <div class="card" style="width: 40rem; margin: 0 auto;">
                <div class="card-header">
                    <h4>Edit Data</h4>
                </div>
                
                <div class="card-body">
         <form method="POST" action="gempa_update.php">
         <input type="hidden" name="idgempa" value="<?php echo $d['idgempa'] ?>">        
             <table>
                <tr>
                    <td><label for="date" class="mb-2 mr-sm-auto"><b>Date</b></label></td>
                    <td><input type="date" class="form-control mb-2 mr-sm-3" name="date"  value="<?php echo $d['date']?>" required/></td>
                    <td><label for="time" class="mb-2 mr-sm-auto"><b>Time</b></label></td>
                    <td><input type="text" class="form-control mb-2 mr-sm-3" name="time" value="<?php echo $d['time']?>" required/></td>
                </tr>
                <tr>
                    <td><label for="lat" class="mb-2 mr-sm-auto"><b>Latitude</b></label></td>
                    <td><input type="text" class="form-control mb-2 mr-sm-3" name="lat" value="<?php echo $d['lat']?>" required/></td>
                    <td><label for="lon" class="mb-2 mr-sm-auto"><b>Longitude</b></label></td>
                    <td><input type="text" class="form-control mb-2 mr-sm-3" name="lon" value="<?php echo $d['lon']?>" required/></td>
                </tr>
                <tr>
                    <td><label for="depth" class="mb-2 mr-sm-auto"><b>Depth</b></label></td>
                    <td><input type="text" class="form-control mb-2 mr-sm-3" name="depth" value="<?php echo $d['depth']?>" required/></td>
                    <td><label for="mag" class="mb-2 mr-sm-auto"><b>Magnitude</b></label></td>
                    <td><input type="text" class="form-control mb-2 mr-sm-3" name="mag" value="<?php echo $d['mag']?>" required/></td>
                </tr>
                <tr>
                    <td><label for="lokasi_1" class="mb-2 mr-sm-auto"><b>Lokasi 1</b></label></td>
                    <td><input type="text" class="form-control mb-2 mr-sm-3" name="lokasi_1" value="<?php echo $d['lokasi_1']?>" required/></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td><label for="lokasi_2" class="mb-2 mr-sm-auto" ><b>Lokasi 2</b></label></td>
                    <td colspan="5"><textarea type="text" class="form-control mb-2 mr-sm-3" name="lokasi_2" required><?php echo $d['lokasi_2']?></textarea></td>
                </tr>
                <tr>
                    <td><label for="felt_1" class="mb-2 mr-sm-auto"><b>Felt 1</b></label></td>
                    <td><input type="text" class="form-control mb-2 mr-sm-3" name="felt_1" value="<?php echo $d['felt_1']?>" required/></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td><label for="felt_2" class="mb-2 mr-sm-auto"><b>Felt 2</b></label></td>
                    <td colspan="5"><textarea type="text" class="form-control mb-2 mr-sm-3" name="felt_2" required><?php echo $d['felt_2']?></textarea></td>                  
                </tr>
                <tr>
                    <td><label for="akibat_1" class="mb-2 mr-sm-auto"><b>Akibat 1</b></label></td>
                    <td><input type="text" class="form-control mb-2 mr-sm-3" name="akibat_1" value="<?php echo $d['akibat_1']?>" required/></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>                    
                </tr>
                <tr>
                    <td><label for="akibat_2" class="mb-2 mr-sm-auto"><b>Akibat 2</b></label></td>
                    <td colspan="5"><textarea type="text" class="form-control mb-2 mr-sm-3" name="akibat_2" required><?php echo $d['akibat_2']?></textarea></td>               
                </tr>
                <tr>
                    <td style="white-space:nowrap;"><label for="tsun" class="mb-2 mr-sm-auto"><b>Tsunami 1</b></label></td>
                    <td><input type="text" class="form-control mb-2 mr-sm-3" name="tsun" value="<?php echo $d['tsun']?>" required/></td>
                    <td></td>
                    <td></td>                   
                </tr>
                <tr>
                    <td style="white-space:nowrap;"><label for="tsunami" class="mb-2 mr-sm-auto"><b >Tsunami 2</b></label></td>
                    <td colspan="5"><textarea type="text" class="form-control mb-2 mr-sm-3" name="tsunami" required><?php echo $d['tsunami']?></textarea></td>  
                </tr>
                <tr>
                    <td><label for="source_1" class="mb-2 mr-sm-auto"><b>source 1</b></label></td>
                    <td><input type="text" class="form-control mb-2 mr-sm-3" name="source_1" value="<?php echo $d['source_1']?>" required/></td>
                    <td><label for="source_2" class="mb-2 mr-sm-auto" ><b>source 2</b></label></td>
                    <td><input type="text" class="form-control mb-2 mr-sm-3" name="source_2" value="<?php echo $d['source_2']?>" required/></td>
                </tr>
            </table> 
            </div>
            <div class="card-footer" align="right">
                <tr>
                    <button name="Submit" type="submit" value="Simpan" class="btn btn-success">Simpan</button>
                    <a href="index.php" class="btn btn-danger" value="Batal">Batal</a>
                </tr>
            </div>
            </div> 
        </form>
        <?php 
        }
        ?>
        </div>  

</div>

</body>
</html>
