<?php include('template/header.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>BMKG|STASIUN GEOFISIKA TRETES</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
$( function() {
    $( "#datepicker" ).datepicker({dateFormat: 'yy/mm/dd', changeMonth:true, changeYear:true, yearRange: '1900:2050'});
  } );
$( function() {
    $( "#datepicker1" ).datepicker({dateFormat: 'yy/mm/dd', changeMonth:true, changeYear:true, yearRange: '1900:2050'});
  } );
</script>
</head>

<body>

<?php 
include 'config.php';
?>
<div class="container-fluid">
<div class="row">
    <div class="col-lg-3">
          <h2>Cari Data</h2>
        <form method="post" action="gempa_cari.php">
            <table id="filter">
                <thead align=center>
                <tr>
                    <th></th>
                    <th>Dari</th>
                    <th>Sampai</th>
                </tr>
                </thead>

                <tbody>
                <tr>
                    <td><label for="year" class="mb-2 mr-sm-auto">Date</label></td>
                    <td><input type="text" class="form-control mb-2 mr-sm-3" id="datepicker"  autocomplete="off" name="d_thn"></td>
                    <td><input type="text" class="form-control mb-2 mr-sm-3" id="datepicker1"  autocomplete="off" name="s_thn"></td>
                </tr>
                <tr>
                    <td><label for="hour" class="mb-2 mr-sm-auto">Time</label></td>
                    <td><input type="text" class="form-control mb-2 mr-sm-3" name="d_jam"></td>
                    <td><input type="text" class="form-control mb-2 mr-sm-3" name="s_jam"></td>
                </tr>
                <tr>
                    <td><label for="lat" class="mb-2 mr-sm-auto">Latitude</label></td>
                    <td><input type="text" class="form-control mb-2 mr-sm-3" name="d_lat"></td>
                    <td><input type="text" class="form-control mb-2 mr-sm-3" name="s_lat"></td>
                </tr>
                <tr>
                    <td><label for="lon" class="mb-2 mr-sm-auto">Longitude</label></td>
                    <td><input type="text" class="form-control mb-2 mr-sm-3" name="d_lon"></td>
                    <td><input type="text" class="form-control mb-2 mr-sm-3" name="s_lon"></td>
                </tr>
                <tr>
                    <td><label for="depth" class="mb-2 mr-sm-auto">Depth</label></td>
                    <td><input type="text" class="form-control mb-2 mr-sm-3" name="d_dlm"></td>
                    <td><input type="text" class="form-control mb-2 mr-sm-3" name="s_dlm"></td>
                </tr>
                <tr>
                    <td><label for="mag" class="mb-2 mr-sm-auto">Magnitude</label></td>
                    <td><input type="text" class="form-control mb-2 mr-sm-3" name="d_mag"></td>
                    <td><input type="text" class="form-control mb-2 mr-sm-3" name="s_mag"></td>
                </tr>
                <tr>
                  <td colspan="3" align="center"><input name="Search" type="submit" value="    Cari    " class="btn btn-info" ></td>
                </tr>
                </tbody>
              </table>    
        </form>
        <br>
    </div>

 
    <div class="col-lg-9">
        <div class="card">
    <div class="table-responsive">
          <table id="cari" class="table" border="1" style="font-size:10px; white-space:nowrap;" >
            
            <thead align="center" style="background-color:#505050; color:#ffffff;">
            <tr>
              <th>NO</th>
              <th>DATE</th>
              <th>TIME</th>
              <th>LAT</th>
              <th>LON</th>
              <th>DEPTH</th>
              <th>MAG</th>
              <th>LOCI1</th>
              <th>LOCT2</th>
              <th>FELT1</th>
              <th>FELT2</th>
              <th>AKIBAT1</th>
              <th>AKIBAT2</th>
              <th>TSUN1</th>
              <th>TSUN2</th>
              <th>SRC1</th>
              <th>SRC2</th>
            </tr>
            </thead>

            <tbody>
            <div class="scroll">
            <?php 

            if(isset($_POST['Search'])) {
                $d_thn=$_POST['d_thn'];$s_thn=$_POST['s_thn'];
                $d_jam=$_POST['d_jam'];$s_jam=$_POST['s_jam'];
                $d_lat=$_POST['d_lat'];$s_lat=$_POST['s_lat'];
                $d_lon=$_POST['d_lon'];$s_lon=$_POST['s_lon'];
                $d_dlm=$_POST['d_dlm'];$s_dlm=$_POST['s_dlm'];
                $d_mag=$_POST['d_mag'];$s_mag=$_POST['s_mag'];

            include 'config.php';
            
            if(empty($d_thn)and empty($s_thn)
                and empty($d_jam)and empty($s_jam)
                and empty($d_lat)and empty($s_lat)
                and empty($d_lon)and empty($d_lon)
                and empty($d_dlm)and empty($s_dlm)
                and empty($d_mag)and empty($s_mag)){
                
                $data1 =mysqli_query($db,"SELECT date,time,lat,lon,depth,mag,lokasi_1,lokasi_2,felt_1,felt_2,akibat_1,akibat_2,tsun,tsunami,source_1,source_2
                                         from gempa");
            }else{
                $data1=mysqli_query($db,"SELECT date,time,lat,lon,depth,mag,lokasi_1,lokasi_2,felt_1,felt_2,akibat_1,akibat_2,tsun,tsunami,source_1,source_2
                                         from gempa where date BETWEEN '$d_thn' and '$s_thn' 
                                                        and time BETWEEN '$d_jam'and'$s_jam'
                                                        and lat BETWEEN '$d_lat'and'$s_lat'
                                                        and lon BETWEEN '$d_lon'and'$s_lon'
                                                        and depth BETWEEN '$d_dlm'and'$s_dlm'
                                                        and mag BETWEEN '$d_mag'and'$s_mag'");
            }
            $no=1;
            

            while($d = mysqli_fetch_array($data1)){
              ?>
                
              <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $d['date']; ?></td>
                <td><?php echo $d['time']; ?></td>
                <td><?php echo $d['lat']; ?></td>
                <td><?php echo $d['lon']; ?></td>
                <td><?php echo $d['depth']; ?></td>
                <td><?php echo $d['mag']; ?></td>
                <td><?php echo $d['lokasi_1']; ?></td>
                <td><?php echo $d['lokasi_2']; ?></td>
                <td><?php echo $d['felt_1']; ?></td>
                <td><?php echo $d['felt_2']; ?></td>
                <td><?php echo $d['akibat_1']; ?></td>
                <td><?php echo $d['akibat_2']; ?></td>
                <td><?php echo $d['tsun']; ?></td>
                <td><?php echo $d['tsunami']; ?></td>
                <td><?php echo $d['source_1']; ?></td>
                <td><?php echo $d['source_2']; ?></td>
              </tr>                  
            <?php 
            }
            ?>
            </div>
            <?php
            }else{
                unset($_POST['Search']);
            }
            ?>
            </tbody>
            </table>
    </div>
</div>
</div>

<!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script> -->
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
<script type="text/javascript">
    $(document).ready(function() {
        $('#cari').DataTable({  
            dom: 'trB',
            buttons: ['excel']
        });
    });
</script>
</body>
</html>

  