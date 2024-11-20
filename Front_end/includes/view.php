<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../Assets/css/bootstrap.css">
</head>
<?php include("db.php");
?>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="../index.php">Home</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Technology</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Education</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Entertainment</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Finance</a>
                    </li>


                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">About Us</a></li>
                                <li><a class="dropdown-item" href="#">Contact</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </a>
                    </li>
                    <!-- <li class="nav-item">
                <a class="nav-link " aria-disabled="true">Disabled</a>
              </li> -->
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row">
            <?php

            if (isset($_GET['video_id'])) {
                $video_id = $_GET['video_id'];
                $sql = "SELECT * FROM youtube_videos WHERE video_id = '$video_id' ";
                $query = mysqli_query($connect, $sql);
                if (!$query) {
                    echo "Error";
                } else {
                    while ($video = mysqli_fetch_assoc($query)) {

                        $video_id = $video['video_id'];
                        $title = $video['title'];
                        $description = $video['description'];
                        $channel_id = $video['channel_id'];
                        $thumbnail_url = $video['thumbnail_url'];
                        $channel_name = $video['channel_name'];
                        $publish_date = $video['publish_date'];
                        $duration = $video['duration'];
                        $keywords = $video['keywords'];
                        $category = "Technology";
                        $created_at = date("Y-m-d H:i:s");
                        // echo $thumbnail_url;
            ?>
                        <div class="col-sm-12 col-md-8 card mb-3 ">
                            <img src=<?php echo $thumbnail_url ?> width=300px class="card-img-top" alt="...">
                            <div class="card-body">
                                <a class="url" href="https://www.youtube.com/watch?v=<?php $video_id ?>">
                                    <h5 class="card-title"><?php echo $title ?></h5>
                                </a>
                                <p class="card-text"><?php echo $description ?></p>
                                <p class="card-text"><small class="text-body-secondary">Published on: <?php echo $created_at ?></small></p><button class="btn btn-primary download">Download</button>
                            </div>
                        </div>
            <?php
                    }
                }
            }
            ?>
            <script src="download1.js"></script>
            <script src="../../Assets/js/bootstrap.js"></script>
</body>

</html>