<?php
    require 'functions/functions.php';

    if ($conn->connect_error) {
        die("Koneksi Gagal : " . $conn->connect_error);
    }

    $queryData = queryData("SELECT * FROM admin");

    if (isset($_POST['submit'])) {
        $query = searchData($_POST['search']);
        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="container">
            <h1>Data Admin</h1>
            <form action="" method="post" class="d-flex justify-content-between">
                <div class="searchbar">
                    <input type="text" name="search" id="search" placeholder="Search..." size="30" autocomplete="off">
                    <button type="submit" name="submit" id="submit">Cari</button>
                </div>
                <a href="inputData.php" class="p-2 mx-0" style="text-decoration: none; color: black;">Tambah Data</a>   
            </form>
        </div>
        <div class="container-fluid mx-0 px-0">
            <table class="table table-bordered">
                <thead>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Password</td>
                    <td>Profile Pic</td>
                    <td>Alter</td>
                </thead>
                <?php $i = 110; ?>
                <?php foreach( $queryData as $data ):?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $data['name'];?></td>
                    <td><?= $data['email'];?></td>
                    <td><?= $data['password'];?></td>
                    <td><img src="img/<?= $data['profile_pic'];?>" alt="..."></td>
                    <td><a href="updateData.php?id=<?=$data['id'];?>">Ubah</a> | <a href="hapus.php?id=<?= $data['id'];?>" onclick="return confirm('Apakah anda yakin ingin menghapus data?');">Hapus</a></td>
                </tr>
                <?php endforeach;?>
            </table>
            
        </div>
    </div>