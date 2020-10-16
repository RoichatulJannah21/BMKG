<?php session_start() ?>
<?php include('template/header.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>BMKG|STASIUN GEOFISIKA TRETES</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>  
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0/dist/Chart.min.js"></script>
  <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet"/>

</head>

<body>

<style type="text/css">
  .title{
    display:none;
  }
 */
              
  table{
    width:100%;
    table-layout:fixed;
    height:"400px";
    font-size:11px;
  }
  table th{
    white-space:nowrap;
  }
  thead{
    background-color:	#505050;
    color:#FFFFFF; 
    font-size:11px;
  }

  div.dataTables_wrapper div.dataTables_filter {
    text-align: right;
    margin-bottom: 15px;
  }
  div.dataTables_wrapper div.dataTables_length label {
    font-weight: 400;
    text-align: left;
    white-space: nowrap;
  }
  div.dataTables_wrapper div.dataTables_length select {
    width: 75px;
    display: inline-block;
  }
  div.dataTables_wrapper div.dataTables_filter input {
    margin-left: .5em;
    display: inline-block;
    width: auto;
    margin-right: 20px;
  }
  .page-item:last-child .page-link {
    margin-right: 3px;
  }

  @media screen and (max-width: 767px){
  div.dataTables_wrapper div.dataTables_filter, div.dataTables_wrapper div.dataTables_info, div.dataTables_wrapper div.dataTables_length, div.dataTables_wrapper div.dataTables_paginate {
      margin-top: 11px;
      margin-bottom: 10px;
      float: none;
      text-align: center;
    }
    .pagination{
      display: inline-flex !important;
    }
  }
</style>


<?php 
include 'config.php';
?>
<div class="container">
  <div class="form-inline">
  <?php if (isset($_SESSION['username'])){ ?>
    <a href="petir_add.php" class="btn btn-success mb-2 mr-sm-3">Tambah Data</a> 
  <?php } ?> 
    <a href="petir_cari.php" class="btn btn-info mb-2 mr-sm-3" >Cari Data</a>
  </div>

<div class="countainer">
  <div class="card">
    <div class="card-body">
    <table id="table_id" style="font-size:12px" >
      <thead align="center">          
        <tr>
          <th>NOMOR</th>
          <th>TANGGAL</th>
          <th>STROKE</th>
          <th>STRONG STROKE</th>
          <th>NOISE</th>
          <th>JUMLAH ENERGI</th>
          <th>FLASH</th>
          <?php if (isset($_SESSION['username'])){ ?>
          <th>ACTION</th>
          <?php } ?>
        </tr>
      </thead>

      <tbody align="center" class="table-bordered">
        <div class="scroll">
        <?php 
        include 'config.php';
        $no=1;
        $nstroke=0;
        $nsstroke=0;
        $nnoise=0;
        $njenergi=0;
        $nflash=0;
        $data = mysqli_query($db,"SELECT * FROM petir GROUP BY tanggal desc");
        while($d = mysqli_fetch_array($data)){
          ?>
            
          <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $d['tanggal']; ?></td>
            <td><?php echo $d['stroke']; ?></td>
            <td><?php echo $d['strong_stroke']; ?></td>
            <td><?php echo $d['noise']; ?></td>
            <td><?php echo $d['jumlah_energi']; ?></td>
            <td><?php echo $d['flash']; ?></td>
            <?php if (isset($_SESSION['username'])){ ?>
            <td style="white-space:nowrap;">
                <?php echo "<a class='btn btn-warning btn-sm' href='petir_form_edit.php?idpetir=".$d['idpetir']."'><i class='fa fa-pencil'></i></a>"; ?> 
                <?php echo "<a class='btn btn-danger btn-sm' data-toggle='modal' data-target='#konfirmasi_hapus' data-href='petir_delete.php?idpetir=".$d['idpetir']."'><i class='fa fa-trash-o'></i></a>"; ?>
            </td>
            <?php } ?>
          </tr>
        <?php 
        }
        ?>
        </div>
      </tbody>
    </table>
    </div>
  </div>
</div>
            

<!-- modal hapus -->
<div class="modal fade" id="konfirmasi_hapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <b>Anda yakin ingin menghapus data ini?</b><br><br>
                    <div align="right">
                        <a class="btn btn-danger btn-ok"> Ya </a>
                        <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-close"></i> Tidak </button>
                    </div>
                </div>
            </div>
        </div>
    </div>


<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#table_id').DataTable({
          "pagingType": "simple",
          "searching":false,
        initComplete: function () {
            this.api().columns([2, 3]).every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        }
    } );
} );

//Hapus Data
$(document).ready(function() {
        $('#konfirmasi_hapus').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
    });

</script> 
</body>
</html>