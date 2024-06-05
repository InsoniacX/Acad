<?php

require 'connection.php';

//Fungsi memunculkan Data
function queryData($queryData) {
    global $conn;

    $result = mysqli_query($conn, $queryData);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}










// Fungsi Untuk input data
function input($data) {
    global $conn;
  
    $nama = htmlspecialchars($data['name']);
    $email = htmlspecialchars($data['email']);
    $password = htmlspecialchars($data['password']);

    $profilePics = uploadFile();

    if (!$profilePics) {
        return false;
    }
  
    $query = "INSERT INTO admin (name, email, password, profile_pic) VALUES ('$nama', '$email', '$password', '$profilePics')";
  
    mysqli_query($conn, $query);
  
    return mysqli_affected_rows($conn);
}














// Fungsi untuk Menghapus Data
function deleteData($id) {
    global $conn;

    mysqli_query($conn, "DELETE FROM admin WHERE id = $id");

    return mysqli_affected_rows($conn);
}











// Fungsi untuk Update Data

function updateData($updateInput) {
    global $conn;

    $id = $updateInput['id']; 
    $name = htmlspecialchars($updateInput['name']);
    $email = htmlspecialchars($updateInput['email']);
    $password = htmlspecialchars($updateInput['password']);

    $profilePics = uploadFile();

    if (!$profilePics) {
        return false;
    }

    $queryUpdate = "UPDATE admin SET name = '$name', email = '$email', password = '$password', profile_pic = '$profilePics' WHERE id = $id ";

    mysqli_query($conn, $queryUpdate);

    return mysqli_affected_rows($conn);
}




















// Fungsi untuk input data content
function inputContentData($data) {
    global $conn;

    $judul = htmlspecialchars($data['judul']);
    $deskripsi = htmlspecialchars($data['deskripsi']);
    $studio = htmlspecialchars($data['studio']);
    $rating = convertStringToDouble($data);
    $genre = htmlspecialchars($data['genre']);
    $duration = convertStringToInteger($data);

    $preview = uploadPreviewImgFile();
    $thumbnail = uploadThumbnailFile();

    $release_date = $data['releaseDate'];

    if (!is_numeric($rating)) {
        return false;
    }

    if (!$preview && !$thumbnail) {
        return false;
    }

    if (!is_int($duration)) {
        return false;
    }

    $query = "  INSERT INTO anime (judul, description, studio, rating, genre, duration, preview_img, thumbnail, release_date)
                VALUES (
                '$judul',
                '$deskripsi',
                '$studio',
                '$rating',
                '$genre',
                '$duration',
                '$preview',
                '$thumbnail',
                '$release_date'
                )";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

















function convertStringToInteger($data) {
    // Hapus spasi di awal dan akhir string
    $input = trim($data['duration'])    ;

    // Cek apakah input adalah angka valid
    if (is_numeric($input)) {
        // Konversi input menjadi integer
        $integerValue = intval($input);
        return $integerValue;
    } else {
        // Jika input tidak valid, kembalikan pesan kesalahan
        return "

                <script>
                    alert('Input tidak valid. Masukkan nilai seperti contoh.');
                </script>

                ";
    }
}


























function convertStringToDouble($data) {
    // Hapus spasi di awal dan akhir string
    $input = trim($data['rating']);

    // Cek apakah input adalah angka valid
    if (is_numeric($input)) {
        // Konversi input menjadi double
        $doubleValue = doubleval($input);
        return $doubleValue;
    } else {
        // Jika input tidak valid, kembalikan pesan kesalahan
        return "<script>
                    alert('Input tidak valid. Masukkan nilai seperti contoh.');
                </script>";
    }
}































function uploadFile() {

    $fileName = $_FILES['images']['name'];
    $fileSize = $_FILES['images']['size'];
    $error = $_FILES['images']['error'];
    $tmpName = $_FILES['images']['tmp_name'];

    if ( $error === 4 ) {
        echo "<script>
                alert('Masukkan Gambar untuk di upload!');
            </script>";
            return false;
    }

    $validImagesExtension = ['jpg', 'jpeg', 'png'];
    $fileInfo = pathinfo($fileName);
    $fileExtension = isset($fileInfo['extension']) ? strtolower($fileInfo['extension']) : '';

    if ( !in_array($fileExtension, $validImagesExtension)) {
        echo "<script>
                alert('File yang anda Upload bukanlah gambar!');
            </script>";
        return false;
    }

    if ( $fileSize > 5000000 ) {
        echo "<script>
                alert('File yang anda masukkan terlalu besar!');
            </script>";
            return false;
    }

    move_uploaded_file($tmpName, 'img/' . $fileName);

    return $fileName;

}






























function uploadThumbnailFile() {

    $fileName = $_FILES['thumbnail']['name'];
    $fileSize = $_FILES['thumbnail']['size'];
    $error = $_FILES['thumbnail']['error'];
    $tmpName = $_FILES['thumbnail']['tmp_name'];

    if ( $error === 4 ) {
        echo "<script>
                alert('Masukkan Gambar untuk di upload!');
            </script>";
            return false;
    }

    $validImagesExtension = ['jpg', 'jpeg', 'png'];
    $fileInfo = pathinfo($fileName);
    $fileExtension = isset($fileInfo['extension']) ? strtolower($fileInfo['extension']) : '';

    if ( !in_array($fileExtension, $validImagesExtension)) {
        echo "<script>
                alert('File yang anda Upload bukanlah gambar!');
            </script>";
        return false;
    }

    if ( $fileSize > 5000000 ) {
        echo "<script>
                alert('File yang anda masukkan terlalu besar!');
            </script>";
            return false;
    }

    move_uploaded_file($tmpName, '../src/public/img/' . $fileName);

    return $fileName;

}























function uploadPreviewImgFile() {

    $fileName = $_FILES['preview']['name'];
    $fileSize = $_FILES['preview']['size'];
    $error = $_FILES['preview']['error'];
    $tmpName = $_FILES['preview']['tmp_name'];

    if ( $error === 4 ) {
        echo "<script>
                alert('Masukkan Gambar untuk di upload!');
            </script>";
            return false;
    }

    $validImagesExtension = ['jpg', 'jpeg', 'png'];
    $fileInfo = pathinfo($fileName);
    $fileExtension = isset($fileInfo['extension']) ? strtolower($fileInfo['extension']) : '';

    if ( !in_array($fileExtension, $validImagesExtension)) {
        echo "<script>
                alert('File yang anda Upload bukanlah gambar!');
            </script>";
        return false;
    }

    if ( $fileSize > 5000000 ) {
        echo "<script>
                alert('File yang anda masukkan terlalu besar!');
            </script>";
            return false;
    }

    move_uploaded_file($tmpName, '../src/public/img/' . $fileName);

    return $fileName;

}


































// Fungsi untuk mencari Data 

function searchData($search) {
    global $conn;

    $query = "SELECT * FROM admin 
                WHERE 
                name LIKE '%$search%' OR
                email LIKE '%$search%'

                ";

    return queryData($query);
}







function searchContentData($search) {

    $query = "SELECT * FROM anime 
                WHERE 
                judul LIKE '%$search%' OR
                studio LIKE '%$search%' OR
                genre LIKE '%$search%'

                ";

    return queryData($query);
}