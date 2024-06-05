<?php
require 'functions/functions.php';

if ($conn->connect_error) {
    die("Koneksi Gagal : " . $conn->connect_error);
}

if (isset($_POST['submit'])) {

    if ( inputContentData($_POST) > 0 ) {
        echo "  <script>
                    alert('Data berhasil di Input');
                    document.href.location = index.php;
                </script>";
    } else {
        echo "  <script>
                    alert('Data gagal di Input');
                    document.href.location = index.php;
                </script>";
    }   
}

$queryData = queryData("SELECT * FROM anime");

    if (isset($_POST['submit'])) {
        $query = searchData($_POST['search']);
        
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container-fluid d-flex justify-content-center align-items-center">
        <div class="container w-50 py-5 px-2 d-flex justify-content-center align-items-center" style="background-color: rgba(0, 0, 0, 0.4); height: max-content; border-radius: 20px;">
            <form action="" method="post" enctype="multipart/form-data" class="w-50">
                <div class="d-flex justify-content-center mb-3">
                    <h1 class="mb-3">Input Anime Data</h1>
                </div>
                <label for="judul" class="fw-bold fs-5">Judul :</label>
                <div class="mb-3">
                    <input type="text" name="judul" placeholder="Judul Anime" class="form-control" style="height: 50px;"  required>
                </div>
                <label for="deskripsi" class="fw-bold fs-5">Sinopsis :</label>
                <div class="mb-3">
                    <textarea rows="10" name="deskripsi" placeholder="Sinopsis" class="form-control" id="deskripsi" style="resize: none;" required></textarea>
                </div>
                <label for="studio" class="fw-bold fs-5">Studio :</label>
                <div class="mb-3 d-flex justify-content-end">
                    <input type="text" name="studio" placeholder="Studio" class="form-control" id="studio" style="height: 50px;"  required>
                </div>
                <label for="rating" class="fw-bold fs-5">Rating :</label>
                <div class="mb-3 d-flex justify-content-end">
                    <input type="text" name="rating" placeholder="Rating (9.9)" class="form-control" id="rating" style="height: 50px;" required>
                </div>
                <label for="genre" class="fw-bold fs-5">Genre :</label>
                <div class="mb-3 d-flex justify-content-end">
                    <input type="text" name="genre" placeholder="Genre" class="form-control" id="genre" style="height: 50px;" required>
                    <button type="add" name="tambahGenre" class="mx-2" id="addInput" style="width: 50px; font-size: 30px;">+</button>
                </div>
                <label for="duration" class="fw-bold fs-5">Durasi :</label>
                <div class="mb-3 d-flex justify-content-end">
                    <input type="text" name="duration" placeholder="Durasi(menit)" class="form-control" id="duration" style="height: 50px;" required>
                </div>
                <label for="rating" class="fw-bold fs-5">Preview :</label>
                <div class="mb-3 d-flex justify-content-end">
                    <input type="file" name="preview" class="form-control" id="rating" style="height: 42px;" required>
                </div>
                <label for="thumbnail" class="fw-bold fs-5">Thumbnail :</label>
                <div class="mb-3 d-flex justify-content-end">
                    <input type="file" name="thumbnail" class="form-control" id="thumbnail" style="height: 42px;" required>
                </div>
                <label for="thumbnail" class="fw-bold fs-5">Release Date :</label>
                <div class="mb-3 d-flex justify-content-end">
                    <input type="date" name="releaseDate" class="form-control" id="thumbnail" style="height: 42px;" required>
                </div>
                <div class="button d-flex justify-content-center">
                    <button type="submit" name="submit" class="btn btn-primary" style="width: 500px; height: 50px;">Submit</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>