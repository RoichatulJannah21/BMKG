<?php 
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'config.php';

// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];
$sebelum=$_SERVER['HTTP_REFERER'];

// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($db,"SELECT * from admin where username='$username' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);


// cek apakah username dan password di temukan pada database
if($cek > 0){

	$data = mysqli_fetch_assoc($login);


		// buat session login dan username
		$_SESSION['username'] = $username;
        ?>
        <!-- // alihkan ke halaman dashboard admin -->
		<script>history.go(-1);</script>
<?php
}else{
	header('Location:index.php?pesan=gagal');
}

?>