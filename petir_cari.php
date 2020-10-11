<!DOCTYPE html>
<html lang="en">
<head>
  <title>BMKG|STASIUN GEOFISIKA TRETES</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>  
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0/dist/Chart.min.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 
</head>

<body>

<style>
    .cari{
    width:100%;
    table-layout:fixed;
    font-size:11px;
  }
</style>

<?php session_start();
include('template/header.php') ?>
<?php 
include 'config.php';
?>
<div class="container-fluid">
    <div class="cotainer">
          <h2>Cari Data</h2>
        <form method="post" action="petir_cari.php">
            <table id="filter">
                <tbody>
                <tr>
                    <td><label for="tanggal" class="mb-2 mr-sm-auto">Tanggal</label></td>
                    <td><input type="date" class="form-control mb-2 mr-sm-3" name="d_tgl" autocomplete="off"  required></td>
                    <td><label for="tanggal" class="mb-2 mr-sm-auto">sampai</label></td>
                    <td><input type="date" class="form-control mb-2 mr-sm-3" name="s_tgl" autocomplete="off"  required></td>   
                    <td align="center"><input name="Search" type="submit" value="  Cari  " class="btn btn-info mb-2 mr-sm-3" ></td>
                </tr>
                </tbody>
            </table>    
        </form>
        <br>
    </div>

 
<div class="counter-fluid">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="table-responsive">
                        <table id="cari1" class="table" border="1" style="font-size:12px; white-space:nowrap;" >
                        
                        <thead align="center" style="background-color:#505050; color:#ffffff;">
                        <tr>
                            <th>NOMOR</th>
                            <th>TANGGAL</th>
                            <th>STROKE</th>
                            <th>STRONG STROKE</th>
                            <th>NOISE</th>
                            <th>JUMLAH ENERGI</th>
                            <th>FLASH</th>
                        </tr>
                        </thead>

                        <tbody align="center">
                        <div>
                        <?php 

                        if(isset($_POST['Search'])) {
                            $d_tgl=$_POST['d_tgl'];
                            $s_tgl=$_POST['s_tgl'];
                            
                        include 'config.php';

                        if (empty($d_tgl) and empty($s_tgl)) {
                            $data1 = mysqli_query($db, "SELECT * FROM petir");
                        }else{
                            $data1= mysqli_query($db,"SELECT *
                                                    FROM petir 
                                                    WHERE tanggal BETWEEN '$d_tgl' and '$s_tgl'");
                            $data2=mysqli_query($db, "SELECT SUM(stroke) AS nstroke, 
                                                            SUM(strong_stroke) AS nsstroke, 
                                                            SUM(noise) AS nnoise, 
                                                            SUM(jumlah_energi) AS njenergi,
                                                            SUM(flash) AS nflash FROM petir WHERE tanggal BETWEEN '$d_tgl' and '$s_tgl'");
                        }
                        $no=1;
                        $nstroke=0;
                        $nsstroke=0;
                        $nnoise=0;
                        $njenergi=0;
                        $nflash=0;

                        while($d = mysqli_fetch_array($data1)){
                            ?>
                            <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $d['tanggal']; ?></td>
                            <td><?php echo $d['stroke']; ?></td>
                            <td><?php echo $d['strong_stroke']; ?></td>
                            <td><?php echo $d['noise']; ?></td>
                            <td><?php echo $d['jumlah_energi']; ?></td>
                            <td><?php echo $d['flash']; ?></td>
                            </tr>                  
                        <?php 
                        }
                        while($dt = mysqli_fetch_array($data2)){
                            $nstroke+=$dt['nstroke'];
                            $nsstroke+=$dt['nsstroke'];
                            $nnoise+=$dt['nnoise'];
                            $njenergi+=$dt['njenergi'];
                            $nflash+=$dt['nflash'];
                        }    
                        ?>
                            <!-- <tr>
                                <td colspan="2" align="center">TOTAL</td>
                                <td><?php echo number_format($nstroke,0,',','.')?></td>
                                <td><?php echo number_format($nsstroke,0,',','.')?></td>
                                <td><?php echo number_format($nnoise,0,',','.')?></td>
                                <td><?php echo number_format($njenergi,0,',','.')?></td>
                                <td><?php echo number_format($nflash,0,',','.')?></td>
                            </tr> -->
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

<div class="col-lg-4">
            <canvas id="myChart" width="400" height="400"></canvas>
        </div>
    </div>
</div>        
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
        $('#cari1').DataTable({
            paging:false,  
            dom: 'trB',
            buttons: ['excel']
        });
    });
</script>


<script>


var ctx = document.getElementById('myChart');
var myPieChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ['STROKE','STRONG STROKE','NOISE','JUMLAH ENERGI','FLASH'],
        datasets: [{
            label: 'Rekapitulasi Prosentase Hasil Monitoring Sistem Prosesing Petir',
            data: [<?php echo number_format($nstroke,0,',','.') ?>,
                <?php echo number_format($nsstroke,0,',','.') ?>,
                <?php echo number_format($nnoise,0,',','.')?>,
                <?php echo number_format($njenergi,0,',','.') ?>,
                <?php echo number_format($nflash,0,',','.')?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },

});
</script>
</body>
</html>

  