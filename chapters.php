<?php


if (isset($_POST["booksSlug"])) {
    $bookslug = $_POST["booksSlug"];
    $apikey = '$2y$10$BylaBcXs5Lw7ZOtYmQ3PXO1x15zpp26oc1FeGktdmF6YeYoRd88e';
    $response = file_get_contents("https://hadithapi.com/api/$bookslug/chapters?apiKey=$apikey");

    $response = json_decode($response, true);

    // print_r($response["books"]);

    $hadithchapters = $response["chapters"];
} ?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri+Quran&family=Aref+Ruqaa&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Nastaliq+Urdu:wght@400..700&display=swap" rel="stylesheet">
    


    <style>
      
      body{direction: rtl;}
        @font-face {
            font-family: "jameel";
            src: url(fonts/jameel.ttf);
        }

        .arabic {
            font-family: 'Amiri Quran', serif;
        }

        .urdu {
            font-family: "jameel";

        }
    </style>


</head>

<body>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Hadis App</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            More About Hadis
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Hadis pak</a></li>
            <li><a class="dropdown-item" href="#">Read Hadis</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Disabled</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
    <div class="container">
        <div class="row">
            <?php
            foreach ($hadithchapters as  $value) {



                echo '
                  <div class="col-md-6 col-sm-12 mb-4">

                <div class="card" ">
                
                    <div class="card-body">
                        <h5 class="card-title arabic btn btn-light" >' . $value["chapterArabic"] . '</h5>
                        <p class="card-text urdu btn btn-primary">  ' . $value["chapterUrdu"] . ' </p>
                        <p class="card-text urdu btn btn-primary">  ' . $value["chapterEnglish"] . ' </p>
                           <form action="hadith.php" method="post">


                <input type="hidden"  name="booksSlug" value="' . $value['bookSlug'] . '">
                <input type="hidden"  name="chapnum" value="' . $value['chapterNumber'] . '">

                <input type="submit" class="btn btn-dark" value="Read Hadiths">



            </form>
                    </div>
                </div>
            </div>
                
                
                ';
            }

            ?>


        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
</body>

</html>