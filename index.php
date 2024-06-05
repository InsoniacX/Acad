<?php
    session_start();
    require 'src/functions/queryfunction.php';

    $userData = queryUserData("SELECT * FROM admin");

    $animeData = queryAnimeData("SELECT * FROM anime");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AniMates | Share & Review</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Vanilla CSS -->
    <link rel="stylesheet" href="src/css/style.css">
</head>
<body>

    <!-- Navbar Section Start -->
    <nav class="navbar navbar-expand-lg navbar-light bg-black position-fixed" style="z-index: 999; width: 100%; height: 70px;">
        <div class="container-fluid">
            <div class="navigation d-flex">
                <a class="navbar-brand text-white" href="#">Bootstrap</a>
                <ul class="nav nav-underline">
                    <li class="nav-item">
                        <a class="nav-link text-white active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Kategori</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">#</a>
                    </li>
                </ul>
            </div>
            <form class="d-flex w-50" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            <div class="accountBtn">
                <a href="login.php" class="btn btn-outline-light">Login</a>
                <a href="login.php" class="btn btn-outline-light">Sign In</a>
            </div>
        </div>
    </nav>
    <!-- Navbar Section End -->





    
    <!-- Landing Page Content -->
        <div class="container-fluid d-flex px-0" style="padding-top: 70px;">
            <div class="container-fluid m-0 p-0">
                <div class="carousel-outside d-flex justify-content-center">
                    <?php foreach ($animeData as $data): ?>
                    <!-- Carousel Starts -->
                    <div id="carouselExampleControls" class="carousel slide w-75" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="content">
                                    <img src="src/public/img/<?= $data['preview_img'];?>" class="position-relative w-100" alt="...">
                                    <div class="info mt-3 p-3 bg-dark text-white rounded">
                                        <div class="d-flex">
                                            <div class="thumbnail">
                                                <img src="src/public/img/<?= $data['thumbnail'];?>" class="img-fluid rounded" alt="Moana 2 Thumbnail" style="max-width: 200px;">
                                            </div>
                                            <div class="align-content-center m-3">
                                                <h2><?= $data['judul']; ?></h2>
                                                <p>Duration: <?= $data['duration'];?>min</p>
                                                <p><?= $data['desciption'];?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="src/public/img/evangelion-preview.png" class="d-block w-100" alt="...">
                                <div class="info mt-3 p-3 bg-dark text-white rounded">
                                        <div class="d-flex">
                                            <div class="thumbnail">
                                                <img src="src/public/img/evangelion-thumbnail.jpeg" class="img-fluid rounded" alt="Moana 2 Thumbnail" style="max-width: 200px;">
                                            </div>
                                            <div class="align-content-center m-3">
                                                <h2>Neon Genesis Evangelion</h2>
                                                <p>Duration: 28min</p>
                                                <p>Pada tahun 2015, dunia berada di ambang kehancuran. Harapan terakhir umat manusia ada di tangan Nerv, sebuah agen khusus di bawah Perserikatan Bangsa-Bangsa, dan Evangelion mereka, mesin-mesin raksasa yang mampu mengalahkan para "Malaikat" yang menandai kehancuran Bumi. Kepala organisasi, Gendou Ikari mencari pilot yang berpotensi dan dapat tersinkronisasi dengan Evangelion.
                                                <br>
                                                Shinji Ikari bertemu dengan ayahnya setelah beberapa tahun tidak bertemu. Hidupnya mulai berubah total ketika ia dibawa ke dalam Nerv. Ia ditugaskan menjadi pilot Evangelion Unit-01 dengan nasib umat manusia di pundaknya.</p>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <div class="carousel-item">
                                <img src="src/public/img/berserk-preview.png" class="d-block w-100" alt="...">
                                <div class="info mt-3 p-3 bg-dark text-white rounded">
                                        <div class="d-flex">
                                            <div class="thumbnail">
                                                <img src="src/public/img/berserk-thumbnail.jpeg" class="img-fluid rounded" alt="Moana 2 Thumbnail" style="max-width: 200px;">
                                            </div>
                                            <div class="align-content-center m-3">
                                                <h2>Berserk: The Golden Age Arc - Memorial Edition</h2>
                                                <p>Duration: 25min</p>
                                                <p>Seorang pria yang hidup sendiri, hanya percaya pada pedangnya sendiri, bertemu dengan seorang pria bangsawan di medan perang. Prajurit muda Guts dan Griffith. Griffith yang memiliki ambisi besar di hatinya, mengalahkan Guts dalam duel dan merekrutnya ke dalam kelompok tentara bayaran "Band of the Hawk".</p>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    <!-- Carousel Ends -->
                    <?php endforeach; ?>

                </div>
                <!--  Landing Page Content -->
                <div class="container">
                    <h1 class="text-center" style="color: white;">New Releases</h1>
                    <div class="container-fluid">

                    </div>
                </div>


            </div>



            <div class="container bg-dark-subtle d-flex justify-content-center flex-wrap p-2" style="width: 320px;">

                <div class="card border border-black m-1" style="width: 18rem; max-height: 389px;">
                    <img src="src/public/img/Screenshot 2023-10-26 194646.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Ketua Musim Kawin</h5>
                        <p class="card-text">Dahulu kala orang ini terkenal sebagai penjelajah lautan terbaik di seluruh Kalimantan Selatan</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
                <div class="card border border-black m-1" style="width: 18rem; max-height: 389px;">
                    <img src="src/public/img/Screenshot 2023-10-26 194646.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Ketua Musim Kawin</h5>
                        <p class="card-text">Dahulu kala orang ini terkenal sebagai penjelajah lautan terbaik di seluruh Kalimantan Selatan</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
                <div class="card border border-black m-1" style="width: 18rem; max-height: 389px;">
                    <img src="src/public/img/Screenshot 2023-10-26 194646.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Ketua Musim Kawin</h5>
                        <p class="card-text">Dahulu kala orang ini terkenal sebagai penjelajah lautan terbaik di seluruh Kalimantan Selatan</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
                

            </div>
        </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>