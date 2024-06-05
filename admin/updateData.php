<?php
require 'functions/functions.php';

$id = $_GET['id'];

$queryData = queryData("SELECT * FROM admin WHERE id = $id")[0];

if ($conn->connect_error) {
    die("Koneksi Gagal : " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
    if ( updateData($_POST) > 0 ) {
        echo "  <script>
                    alert('Data berhasil di Ubah');
                    document.href.location = index.php;
                </script>";
    } else {
        echo "  <script>
                    alert('Data gagal di Ubah');
                    document.href.location = index.php;
                </script>";
    }   
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="container-fluid d-flex justify-content-center">
            <form class="w-75" action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $queryData['id'];?>">
                <h1>Input Data</h1>
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?= $queryData['name'];?>">  
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email" value="<?= $queryData['email'];?>">
                </div>
                <div class="form-group">
                    <label for="nama">Password</label>
                    <input type="password" class="form-control" id="password" name="password" value="<?= $queryData['password'];?>">
                </div>
                <div class="form-group">
                    <label for="nama">Foto</label>
                    <input type="file" class="form-control" name="images" id="images" value="<?= $queryData['profile_pic'];?>">
                </div>
                <button type="submit" name="submit">Submit</button>
            </form>
        </div>
    </div>
</body>
</html>