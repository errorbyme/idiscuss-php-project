<?php
require 'partials/_dbconnect.php';
session_start();
?>
<?php
if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip'))
    ob_start("ob_gzhandler");
else ob_start();
@ini_set('zlib.output_compression', 1);
ob_implicit_flush(true);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CHACHA IDiscuss</title>
    <link rel="icon" type="image/x-icon" href="imgs/icons8-poison-16.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="css_js/style.css">
</head>
<style>
    nav ul .home a {
        color: red !important
    }
</style>

<body>
    <div class="container-fluid p-0" id="maincontainer">
        <?php include 'loader.php'; ?>
        <?php include 'partials/_header.php'; ?>
        <?php include("partials/_message.php"); ?>

        <!-- Image carousal -->

        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="1500">
                    <img src="imgs/slider-1.jpg" class="d-block w-100" alt="..." height="400px">
                </div>
                <div class="carousel-item" data-bs-interval="1500">
                    <img src="imgs/slider-2.jpg" class="d-block w-100" alt="..." height="400px">
                </div>
                <div class="carousel-item">
                    <img src="imgs/slider-3.jpg" class="d-block w-100" alt="..." height="400px">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <div class="container">
            <h2 class="text-center my-3 text-light">Welcome to <span class="text-danger">IDiscuss</span></h2>
            <div class="row">
                <?php
                $sql = "select * from categories";
                $result = mysqli_query($con, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    $c_id = $row["c_id"];
                    $c_name = $row["c_name"];
                    $c_desc = $row["c_desc"];
                    $c_img = $row["c_images"];

                    echo '<div class="col-md-4 d-flex justify-content-center alighn-items">
                        <div class="card my-2 border border-secondary" style="width: 18rem;background-color:#060a13;">
                        <img src="imgs/' . $c_img . '" class="card-img-top" style="height:200px;" alt="...">
                            <div class="card-body">
                            <h5 class="card-title text-light text-capitalize">' . $c_name . '</h5>
                                <p class="card-text text-secondary">' . substr($c_desc, 0, 60) . '...</p>
                                </div>
                                <div class="card-footer">
                                <a href="threadlist.php?catid=' . $c_id . '" class="btn btn-sm text-danger btn-outline-danger" style="background-color:black;">Read Threads</a>
                            </div>
                        </div>
                    </div>';
                }
                ?>

            </div>
        </div>
    </div>
    <?php include 'partials/_footer.php'; ?>
</body>
<script src="css_js/script.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>
</html>
<?php
mysqli_close($con);
?>