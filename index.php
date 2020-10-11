<?php session_start(); ?>
<?php include('template/header.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>BMKG|STASIUN GEOFISIKA TRETES</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
  <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet"/>
  <link rel="stylesheet" href="https://openlayers.org/en/v4.6.5/css/ol.css" type="text/css">

  <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous"> -->
</head>

<body  >


<style type="text/css">
 */              
  table{
    width:100%;
    table-layout:fixed;
    font-size:9px;
  }
  /* table td{
    white-space:nowrap;
  } */
  thead{
    background-color:	#505050;
    color:#FFFFFF; 
    font-size:10px;
  }
  tbody{
    overflow-y:scroll;
  }
  /* .table-responsive{
    height:400px;                   
  }                */
  #gempa td{
    vertical-align: middle;
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
<script src="https://openlayers.org/en/v4.6.5/build/ol.js" type="text/javascript"></script>
<script>
/* OSM & OL example code provided by https://mediarealm.com.au/ */
var map;
  function initialize_map() {
 
  var mapLat = -7.750;
  var mapLng = 114.380;
  var mapDefaultZoom = 6;
    map = new ol.Map({
      target: "map",
      layers: [
        new ol.layer.Tile({
          source: new ol.source.OSM({
           url: "https://a.tile.openstreetmap.org/{z}/{x}/{y}.png"
          })
        })
      ],
      view: new ol.View({
        center: ol.proj.fromLonLat([mapLng, mapLat]),
        zoom: mapDefaultZoom
      })
    });
  }

  function add_map_point(lat, lng) {
    var vectorLayer = new ol.layer.Vector({
      source:new ol.source.Vector({
        features: [new ol.Feature({
          geometry: new ol.geom.Point(ol.proj.transform([parseFloat(lng), parseFloat(lat)], 'EPSG:4326', 'EPSG:3857')),
        })]
      }),
      style: new ol.style.Style({
        image: new ol.style.Icon({
          anchor: [0.5, 0.5],
          anchorXUnits: "fraction",
          anchorYUnits: "fraction",
          src: "https://upload.wikimedia.org/wikipedia/commons/e/ec/RedDot.svg"
        })
      })
    });
    map.addLayer(vectorLayer);
  }
  </script>


<?php 
include 'config.php';
?>
<div class="container-fluid">
  <div class="form-inline">
  <?php if (isset($_SESSION['username'])){ ?>
    <a href="gempa_add.php" class="btn btn-success mb-2 mr-sm-3" style="margin-left:16px;">Tambah Data</a>
  <?php } ?>  
  <a href="gempa_cari.php" class="btn btn-info mb-2 mr-sm-3"<?php if (!isset($_SESSION['username'])){ ?> style="margin-left: 16px;" <?php } ?>>Cari Data</a>
  </div>
    
   

<div class="container-fluid">
  <div class=card>
    <div class="table-responsive">
      <br>
      <table id="gempa" class="table align-middle" style="font-size:10px">
        <thead align="center">
          <tr>
            <th>NO</th>
            <th>DATE</th>
            <th>TIME</th>
            <th>LAT</th>
            <th>LON</th>
            <th>DEPTH</th>
            <th>MAG</th>
            <th>LOCT1</th>
            <th>LOCT2</th>
            <th>FELT1</th>
            <th>FELT2</th>
            <th>AKIBAT1</th>
            <th>AKIBAT2</th>
            <th>TSUN1</th>
            <th>TSUN2</th>
            <th>SRC1</th>
            <th>SRC2</th>
            <th>ACT</th>
          </tr>
        </thead>

        <tbody class="table-bordered">
          <?php 
          include 'config.php';
          
          $no=1;
          $data = mysqli_query($db,"SELECT * FROM gempa ORDER BY date DESC");
          while($d = mysqli_fetch_array($data)){
          ?>
              
            <tr>
              <td style="text-align:center"><?php echo $no++; ?></td>
              <td style="text-align:center; white-space:nowrap;"><?php echo $d['date']; ?></td>
              <td style="text-align:center"><?php echo $d['time']; ?></td>
              <td style="text-align:center"><?php echo $d['lat']; ?></td>
              <td style="text-align:center"><?php echo $d['lon']; ?></td>
              <td style="text-align:center"><?php echo $d['depth']; ?></td>
              <td style="text-align:center"><?php echo $d['mag']; ?></td>
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
              
              <td style=" white-space:nowrap;">
              <?php if (isset($_SESSION['username'])){ ?>
                <?php echo "<a class='btn btn-warning btn-sm' href='gempa_form_edit.php?idgempa=".$d['idgempa']."'><i class='fa fa-pencil'></i></a>"; ?> 
                <?php echo "<a class='btn btn-danger btn-sm' data-toggle='modal' data-target='#konfirmasi_hapus' data-href='gempa_delete.php?idgempa=".$d['idgempa']."'><i class='fa fa-trash-o'></i></a>";?>
              <?php } ?>
                <a  type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#lokasigempa" onclick="fungsih(<?php echo $d['lat']?>, <?php echo $d['lon']?>)"><i class="fa fa-globe"></i></a>
              </td>
            </tr>                  
          <?php 
          }
          ?>
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


<!-- modal maps -->
<div onload="" class="modal fade" id="lokasigempa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12 modal_body_map">
            <div class="location-map" id="maps">
                <div onload=""style="width: auto; height: auto;" id="map"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#gempa').DataTable({"pagingType": "simple"});      
    });

    function fungsih(lattt,langgg){
    $('#lokasigempa').on('shown.bs.modal', function(e) {
        var element = $(e.relatedTarget);
        initialize_map(); add_map_point( lattt, langgg);
    });
    }
    
  //Hapus Data
$(document).ready(function() {
        $('#konfirmasi_hapus').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
    });
</script> 

</body>
</html>

  