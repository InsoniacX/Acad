<?php

require 'connection.php';

function register($userData) {
    global $conn;

    $username = strtolower(stripslashes($userData["username"]));
    $email = strtolower(stripslashes($userData["email"]));
    $password = mysqli_real_escape_string($conn, $userData["password"]);
    $confirmPassword = mysqli_real_escape_string($conn, $userData["confirm_password"]);


    if (strlen($password) < 8) {
        echo "  <script>
                    alert('Password Terlalu Pendek! Gunakan Minimal 8 Karakter');
                </script>";
        return false;
    }
    

    if ( $password !== $confirmPassword ) {
        echo "  <script>
                    alert('Konfirmasi password tidak sesuai!');
                </script>";
            return false;
    }

    
    $password = password_hash($password, PASSWORD_DEFAULT);

    $usernameDetect = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");
    $emailDetect = mysqli_query($conn, "SELECT email FROM users WHERE email = '$email'");

    if (mysqli_fetch_assoc($usernameDetect)){
        echo "
            <script>
                alert('Username sudah terdaftar');
            </script>
        ";
        return false;
    }

    if (mysqli_fetch_assoc($emailDetect)) {
        echo "
            <script>
                alert('Email sudah terdaftar');
            </script>
        ";
        return false;
    }

    mysqli_query($conn, "INSERT INTO users (username, email, password) VALUES('$username', '$email', '$password')");

    return mysqli_affected_rows($conn);

}