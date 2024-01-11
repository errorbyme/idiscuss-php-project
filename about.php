<?php
require 'partials/_dbconnect.php';
session_start();
?>
<?php
if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip'))
    ob_start("ob_gzhandler");
else ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About page</title>
    <link rel="icon" type="image/x-icon" href="imgs/icons8-poison-16.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="css_js/style.css">
</head>
<style>
    nav ul .about a {
        color: red !important
    }
</style>

<body>
    <div class="container-fluid p-0 about-page" id="maincontainer">
        <?php include 'loader.php'; ?>
        <?php include 'partials/_header.php'; ?>
        <?php include("partials/_message.php"); ?>

        <div class="container about-design">
            <div class="row">
                <div class="col-12 my-3">
                    <div class="text-center"><span class="logo fa fa-wechat"></div>
                </div>
                <div class="col-12 my-1">
                    <div class="text-center">
                        <h1 class="text-light my-4">We Just Getting <span class="text-danger">started..</span></h1>
                        <p class="text-secondary">Empowering the world to develop technology through collective knowledge.</p>
                        <p>Our products and tools enable people to ask, share and learn at work or at home.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'partials/_footer.php'; ?>
</body>
<script src="css_js/script.js"></script>
<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>

</html>
<?php
mysqli_close($con);
?>