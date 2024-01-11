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
    <title>search page</title>
    <link rel="icon" type="image/x-icon" href="imgs/icons8-poison-16.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="css_js/style.css">
</head>

<body>
    <div class="container-fluid p-0 search-page" id="maincontainer">
        <?php include 'loader.php'; ?>
        <?php include 'partials/_header.php'; ?>
        <?php include("partials/_message.php"); ?>
        <div class="position-fixed" style="bottom: 40px;right:14px;">
            <a href="#" class="fa-solid fa-up-long float-end" id="backtotop" onclick="document.body.scrollTop=0;document.documentElement.scrollTop=0;event.preventDefault()"></a><br>
        </div>
        <!-- Search Results -->
        <div class="container">
            <div class="row">
                <div class="col-md-10 mx-auto mt-4 mb-5" style="background-color: #060a14;">
                    <?php if (isset($_GET["search"]) && $_GET["search"] == true) {
                        $search = mysqli_escape_string($con, $_GET["search"]);
                    } ?>
                    <h2 class="fw-bold my-3 text-light sticky-top py-2" style="top: 73px;background-color: #060a14;z-index:400;">Search results for <em><?=$search?></em><hr class="text-light"></h2>
                    <?php
                    if (isset($_GET["search"]) && $_GET["search"] == true) {
                        $search = $_GET["search"];
                        $sql = "SELECT * FROM threads WHERE MATCH (threads_title,threads_desc) against ('$search')";
                        $result = mysqli_query($con, $sql);

                        $noResult = true;
                        while ($row = mysqli_fetch_assoc($result)) {
                            $noResult = false;
                            $t_id = $row["threads_id"];
                            $t_title = $row["threads_title"];
                            $t_desc = $row["threads_desc"];
                            $thread_user_id = $row["threads_user_id"];
                            $sql2 = "select * from users where id='$thread_user_id'";
                            $result2 = mysqli_query($con, $sql2);
                            $row2 = mysqli_fetch_assoc($result2);
                            $user_image = $row2["user_image"];
                            if ($user_image == "") {
                                $user_image = "User-Profile.png";
                            }

                            echo ' <div class="row">
                        <div class="col-2 d-flex justify-content-end align-items-start">
                                        <img src="uploaded_img/' . $user_image . '" class="img-fluid rounded-5" width="30px" alt="">
                                    </div>
                                    <div class="col-10 text-secondary">
                                         <h5><a class="text-decoration-none fs-6" href="thread.php?threadid=' . $t_id . '">' . $t_title . '</a></h5>
                                         <p>' . $t_desc . '</p>
                                         <hr class="text-secondary">
                                    </div> 
                                    </div>';
                        }
                        if ($noResult) {
                            echo ' <div class="p-3 border border-secondary rounded-2 my-2 text-secondary fw-bold" style="background-color: #060a17;"><p class="display-5">No Result Founds</p><p></div>';
                        }
                    }
                    ?>

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