<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Youtube Pro</title>
    <link rel="stylesheet" href="includes/style.css">
    <link rel="stylesheet" href="../Assets/css/bootstrap.css">
</head>

<body>


    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Home</a>
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
                    <button class="btn btn-outline-success" id="searc" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>


    <!-- CARD -->
    <!-- <div class="row  mx-5">

        <div id="row" class="col-sm-12 col-md-8  card mb-3 ">
            <div class="col-lg-7 col-sm-4 bg-light border me-5">
                <form action="">
                    <textarea type="text" class="url"></textarea>
                    <input type="submit" class="btn btn-primary" id="download">
                </form>
                <!-- <div class="btn btn-primary" id="download">download</div> --
    </div>
    <div class="col-lg-4 d-none d-md-block bg-light border ms-3 ">side bar</div>
    </div>
    </div> -->

    <div class="container">



        <!-- Button trigger modal -->
        <button type="button" id="btn" class="btn btn-primary search" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Click TO Search
        </button>

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">
                            <form class="d-flex" role="search">
                                <input class="form-control me-2" id="keyword" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-success" id="search" type="submit">Search</button>
                            </form>
                        </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="results">
                        <!-- <div class="results">
                            <a class="results_link" href="">I will not close if you click outside of me. Don't even try to press escape key.</a>
                            <hr>
                        </div> -->
                        <!--<div class="results">
                            <a class="results_link" href="">I will not close if you click outside of me. Don't even try to press escape key.</a>
                            <hr>
                        </div>

                        <div class="results">
                            <a class="results_link" href="">I will not close if you click outside of me. Don't even try to press escape key.</a>
                            <hr>
                        </div>

                        <div class="results">
                            <a class="results_link" href="">I will not close if you click outside of me. Don't even try to press escape key.</a>
                            <hr>
                        </div>

                        <div class="results">
                            <a class="results_link" href="">I will not close if you click outside of me. Don't even try to press escape key.</a>
                            <hr>
                        </div>

                        <div class="results">
                            <a class="results_link" href="">I will not close if you click outside of me. Don't even try to press escape key.</a>
                            <hr>
                        </div>

                        <div class="results">
                            <a class="results_link" href="">I will not close if you click outside of me. Don't even try to press escape key.</a>
                            <hr>
                        </div>

                        <div class="results">
                            <a class="results_link" href="">I will not close if you click outside of me. Don't even try to press escape key.</a>
                            <hr>
                        </div>
                        <div class="results">
                            <a class="results_link" href="">I will not close if you click outside of me. Don't even try to press escape key.</a>
                            <hr>
                        </div>
                        <div class="results">
                            <a class="results_link" href="">I will not close if you click outside of me. Don't even try to press escape key.</a>
                            <hr>
                        </div>-->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Understood</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mx-1">
            <div id="column1" class="col-lg-7 col-sm-4 bg-light border me-5">main content</div>
            <div class="col-lg-4 d-none d-md-block bg-light border ms-3 ">side bar</div>
        </div>
        <!-- <div class=" container">

            <hr>
        </div> -->
    </div>

    </div>




    <script src="includes/script.js"></script>
    <script src="../Assets/js/bootstrap.js"></script>
</body>

</html>