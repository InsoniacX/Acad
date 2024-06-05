<?php

require '../../functions/connection.php';

if (isset($_POST['login'])){

    $email = $_POST["email"];
    $password = $_POST["password"];
    
    $result = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email' ");

    if( mysqli_num_rows($result) === 1 ){

        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            header("Location: index.php");
            exit;
        }

    }
    $error = true;
} 

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Vanilla CSS -->
    <link rel="stylesheet" href="../../css/style.css">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
    <div class="container-fluid d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="container w-50 py-4 px-2" style="background-color: rgba(255, 255, 255, 0.2); border-radius: 20px;">
            <div class="container px-2 d-flex justify-content-center align-items-center" style="height: 40vh;">
                <form action="" method="post" class="w-50">
                    <div class="d-flex justify-content-center mb-3">
                        <h1>Login</h1>
                    </div>

                    <?php if (isset($error)) :?>
                        <p style="background-color: red; font-size: 18px; font-weight: 1000; padding:10px 0 ; border-radius: 10px; display: flex; justify-content: center;">Email atau Password yang anda masukkan salah!</p>
                    <?php endif; ?>

                    <label for="email" class="fw-bold mb-3 fs-5">Email :</label>
                    <div class="mb-4">
                        <input type="email" name="email" placeholder="Email" class="form-control" id="username" style="height: 45px;" required>
                    </div>
                    <label for="password" class="fw-bold mb-3 fs-5">Password :</label>
                    <div class="mb-4 d-flex justify-content-end">
                        <input type="password" name="password" placeholder="Password" class="form-control" id="username" style="height: 45px;" required>

                        <button class="showPassword position-absolute rounded" onclick="showPassword();" id="showPassword" name="showPassword" style="width: 45px; height: 45px;"><i class="fa-regular fa-eye"></i></button>
                    </div>
                    <div class="button d-flex justify-content-center">
                        <button type="submit" name="login" class="btn btn-primary" style="width: 500px; height: 50px;">Login</button>
                    </div>
                </form>
                
            </div>
            <p style="font-size: 15px; font-weight: 600; padding:10px 0 ; border-radius: 10px; display: flex; justify-content: center;">Belum Punya Akun? <a href="registerationPage.php">Daftar</a></p>
        </div>
    </div>
</body>
</html>