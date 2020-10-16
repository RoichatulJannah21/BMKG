<?php 
if (session_status() == PHP_SESSION_NONE) {
  session_start();
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>BMKG</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

  <style>
 */
  </style>


</head>
<body style="background-color:#eee; padding-right: 0px !important;">
  <nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <img src="img/bmkg.png" alt="logo" style="width:60px;"><h5 style="color:#FFF; white-space: nowrap;">
        <b>SISTEM PENGELOLAAN DATA GEOFISIKA (GEMPA, PETIR)</b><br/>STASIUN GEOFISIKA TRETES, PASURUAN</h4>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar" style="margin-left:40%;">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="btn btn-secondary nav-link" href="index.php" style="color:#FFF;">Gempa</a>
      </li>
      <li class="nav-item">
        <a class="btn btn-secondary nav-link" href="petir.php" style="color:#FFF;">Petir</a>
      </li>
      <?php if (!isset($_SESSION['username'])){ ?>
      <li class="nav-item">
        <a class="nav-link" data-toggle="modal" data-target="#myModal">Login</a>
      </li>
      <?php }else{ ?> 
        <li>
        <a class="nav-link" href="logout.php">Logout</a>
        </li>   
      <?php } ?>
    </ul>
  </div>  
</nav>
<br>


<!-- modal login -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
    
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Silahkan Masuk</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      
      <!-- Modal body -->
      <div class="modal-body">
      <form action="cek_login.php" method="post">
        <table>
          <tr>
            <td><label>Username</label></td>  
            <td><input type="text" name="username" class="form-control mb-2 mr-sm-3"  required="required"></td>
          </tr>
          <tr>
            <td><label>Password</label></td>
			      <td><input type="password" name="password" class="form-control mb-2 mr-sm-3" required="required"></td>
          </tr> 
        </table>
      </div>
      
      <!-- Modal footer -->
      <div class="modal-footer">
        <input type="submit" class="btn btn-success" value="login">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </form>  
    </div>
  </div>
</div>


<?php
  if (isset($_GET['pesan'])){
    if ($_GET['pesan']=="berhasil_logout"){?>
          <div style="width:40% !important;margin: 0 auto;" class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!</strong> anda berhasil logout.
          </div>
       <?php
    }if ($_GET['pesan']=="gagal"){?>
          <div style="width:40% !important; margin: 0 auto;" class="alert alert-warning alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Warning!</strong> anda gagal login.
          </div>
       <?php
    }
   }
?>

  </body>
</html>

