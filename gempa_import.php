<?php
    include 'config.php';
    include "excel_reader2.php";
    ?>

<html>
<head>
    <title>Uploading...</title>
</head>
<body>
<h1>Uploading file...</h1>
<?php

    if ($_FILES['file']['error'] > 0)
    {
        echo 'Problem: ';
        switch ($_FILES['file']['error'])
        {
            case 1: echo "<script>alert('File exceeded upload_max_filesize';history.go(-1);</script>";
            break;
            case 2: echo "<script>alert('File exceeded max_file_size';history.go(-1);</script>";
            break;
            case 3: echo "<script>alert('File only partially uploaded';history.go(-1);</script>";
            break;
            case 4: echo "<script>alert('No file uploaded');history.go(-1);</script>";
            break;
            case 6: echo "<script>alert('Cannot upload file: No temp directory specified';history.go(-1);</script>";
            break;
            case 7: echo "<script>alert('Upload failed: Cannot write to disk';history.go(-1);</script>";
            break;
        }
        exit;
    }
    $target = basename($_FILES['file']['name']) ;
    move_uploaded_file($_FILES['file']['tmp_name'], $target);
    
    chmod($_FILES['file']['name'],0777);

    $data = new Spreadsheet_Excel_Reader($_FILES['file']['name'],false);

    $jumlah_baris = $data->rowcount($sheet_index=0);



    $berhasil = 0;
    for ($i=2; $i<=$jumlah_baris; $i++){
    
        // menangkap data dan memasukkan ke variabel sesuai dengan kolumnya masing-masing
        $date  = $data->val($i, 1);
        $time = $data->val($i, 2);
        $lat  = $data->val($i, 3);
        $lon  = $data->val($i, 4);
        $depth= $data->val($i, 5);
        $mag  = $data->val($i, 6);
        $lokasi_1  = $data->val($i, 7);
        $lokasi_2  = $data->val($i, 8);
        $felt_1  = $data->val($i, 9);
        $felt_2  = $data->val($i, 10);
        $akibat_1  = $data->val($i, 11);
        $akibat_2  = $data->val($i, 12);
        $tsun  = $data->val($i, 13);
        $tsunami  = $data->val($i, 14);
        $source_1  = $data->val($i, 15);
        $source_2  = $data->val($i, 16);
    
        if($date != "" &&  $time !="" && $lat !="" && $lon !="" && $depth !="" && $mag !="" && 
            $lokasi_1 !="" && $lokasi_2 !="" && $felt_1 !="" && $felt_2 !="" && $akibat_1 !="" && 
            $akibat_2 !="" && $tsun !="" && $tsunami !="" && $source_1 !="" && $source_2 !=""){
            // input data ke database (table gempa)
            mysqli_query($db,"INSERT into gempa values('','$date','$time','$lat','$lon','$depth','$mag',
                                                        '$lokasi_1','$lokasi_2','$felt_1','$felt_2',
                                                        '$akibat_1','$akibat_2','$tsun','$tsunami','$source_1','$source_2')");
            $berhasil++;
        }
    }

    

    // Check if file already exists
    // if (file_exists($target_file)) {
    //     echo "Sorry, file already exists.<br />";
    //     $upload_ok = 0;
    // }

    // Check file size if you not use hidden input 'MAX_FILE_SIZE'
    // if ($_FILES['userfile']['size'] > 1000000) {
    //     echo "Sorry, your file is too large.<br />";
    //     $upload_ok = 0;
    // }
    // Allow certain file formats

    $path = $_FILES['file']['name'];
    $file_type = pathinfo($path, PATHINFO_EXTENSION);

    $allowed_type = array("xls");
    if(!in_array($file_type, $allowed_type)) {
        echo "Sorry, only xls files are allowed.";
        $upload_ok = 0;
    }

    // Does the file have the right MIME type?
    // if ($_FILES['userfile']['type'] != 'text/plain'){
    //     echo 'Problem: file is not plain text';
    //     $uploadOk = 0;
    // }

    // put the file where we'd like it
    // if ($upload_ok != 0){
    //     if (is_uploaded_file($_FILES['file']['tmp_name'])){
    //         if (!move_uploaded_file($_FILES['file']['tmp_name'],$target_file)){
    //             echo 'Problem: Could not move file to destination directory';
    //         }else{
    //             echo 'File uploaded successfully<br /><br />';
    //             echo 'Filename = '.basename($_FILES['file']['name']).'<br />';
    //             echo 'Size = '.$_FILES['file']['size'].' byte';
    //             }
    //     }else{
    //         echo 'Problem: Possible file upload attack. Filename: ';
    //         echo $_FILES['file']['name'];
    //     }
    // }

    // hapus kembali file .xls yang di upload tadi
unlink($_FILES['file']['name']);

// alihkan halaman ke index.php
header("location:index.php?berhasil=$berhasil");
?>

<script>
// window.location.href="index.php";
</script>
</body>
</html>
