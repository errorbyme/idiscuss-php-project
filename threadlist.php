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
    <title>Questions page</title>
    <link rel="icon" type="image/x-icon" href="imgs/icons8-poison-16.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="css_js/style.css">
</head>
<style>
    nav ul .categories a {
        color: red !important;
    }
</style>

<body>
    <div class="container-fluid p-0 threadlist-page" id="maincontainer">
        <?php include 'loader.php'; ?>
        <?php include 'partials/_header.php'; ?>
        <?php
        $c_id = $_GET["catid"];
        $sql = "select * from categories where c_id=$c_id";
        $result = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $c_name = $row["c_name"];
            $c_desc = $row["c_desc"];
        }

        ?>
        <?php
        $id = $_GET["catid"];
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["addthread"])) {
                $th_title =  mysqli_escape_string($con, $_POST["title"]);
                $th_title = str_replace("<", "&lt;", $th_title);
                $th_title = str_replace(">", "&gt;", $th_title);

                $th_desc =  mysqli_escape_string($con, $_POST["desc"]);
                $th_desc = str_replace("<", "&lt;", $th_desc);
                $th_desc = str_replace(">", "&gt;", $th_desc);
                if ($th_title == "" || $th_desc == "") {
                    $_SESSION["errormessage"] = "Your Thread text is empty*";
                } else {
                    $threads_user_id = $_POST["sno"];
                    $sql = "INSERT INTO threads (threads_title, threads_desc, threads_cat_id, threads_user_id) VALUES ('$th_title', '$th_desc', '$id', '$threads_user_id')";
                    $result = mysqli_query($con, $sql);
                    if ($result) {
                        $_SESSION["successmessage"] = "Your Thread has been Added.";
                    }
                }
            }
        }
        ?>
        <?php include("partials/_message.php"); ?>

        <div class="container my-4">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div class="card rounded-0 threadlist-welcome">
                        <div class="card-header border-0">
                            <h5>WelcØme To <span class="text-capitalize text-danger"><?php echo $c_name; ?></span> Threads</h5>
                            <hr>
                        </div>
                        <div class="card-body border-0">
                            <p><?php echo $c_desc; ?></p>
                            <hr>
                        </div>
                        <div class="card-footer border-0 pt-0">
                            <p class="m-0 text-warning">No spam!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="position-fixed" style="bottom: 40px;right:14px;">
            <a href="#" class="fa-solid fa-up-long float-end" id="backtotop" onclick="document.body.scrollTop=0;document.documentElement.scrollTop=0;event.preventDefault()"></a><br>
            <button class="btn btn-sm btn-outline-success text-success" id="" type="button" style="background-color:#060a11;" data-bs-toggle="offcanvas" data-bs-target="#offcanvasthreadlist" aria-controls="offcanvasBottom">Add Your Question <img src="imgs/send-png-green.png" width="20px" alt=""></button>
        </div>
        <?php
        if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
            echo '<div class="offcanvas offcanvas-bottom" data-bs-scroll="true"  tabindex="-1" id="offcanvasthreadlist" aria-labelledby="offcanvasBottomLabel" style="height:180px;background-color:#060a11;">
            <div class="offcanvas-body p-1 overflow-hidden">
            <div class="row">
            <div class="col-md-10 mx-auto mb-1 mt-0">
            <button type="button" class="btn btn-sm float-end" data-bs-dismiss="offcanvas" aria-label="Close" style="color:red;"><span class="fa fa-close"></span></button>
                        </div>
                        <div class="col-md-10 mx-auto mb-1">
                      <form action="' . $_SERVER["REQUEST_URI"] . '" method="post">
                        <input type="hidden" name="sno" value="' . $_SESSION["sno"] . '">
                            <div class="mb-3">
                                <input type="text" name="title" class="form-control text-light" id="commento" style="background-color:black;box-shadow:none;" placeholder="Question Title">
                            </div>
                            <div class="mb-3 position-relative">
                            <textarea name="desc" class="form-control text-light" style="background-color:black;box-shadow:none;" id="" cols="30" rows="2" placeholder="Question Description"></textarea>
                            <button type="submit" name="addthread" class="btn btn-sm position-absolute" style="right:5px; bottom:5px;"><img src="imgs/send-png-white.png" width="25px" alt=""></button>
                            </div>
                        </form>
                </div>
            </div>
            </div>
        </div>';
        } else {
            echo '<div class="offcanvas offcanvas-bottom" tabindex="-1" id="offcanvasthreadlist" aria-labelledby="offcanvasBottomLabel" style="height:130px;background-color:#0d1117;">
        <div class="offcanvas-body overflow-hidden p-1">
        <div class="row">
        <div class="col-md-10 mx-auto mt-0">
        <button type="button" class="btn btn-sm float-end" data-bs-dismiss="offcanvas" aria-label="Close" style="color:red;"><span class="fa fa-close"></span></button>
                    </div>
                    <div class="col-md-10 mx-auto">
                    <div class="p-4 rounded-0 text-light border border-secondary mb-2" style="background-color:#060a14;"><b><span class="text-danger">Sign in</span> to post a Question.</b></div>
            </div>
        </div>
        </div>
    </div>';
        }

        ?>
        <div class="container my-2">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <h2 class="fw-bold text-light mt-2">BROWSE QUESTIONS</h2>
                    <hr class="text-light">
                    <?php
                    $id = $_GET["catid"];
                    $sql = "select * from threads where threads_cat_id=$id";
                    $result = mysqli_query($con, $sql);

                    $noResult = true;
                    while ($row = mysqli_fetch_assoc($result)) {

                        $noResult = false;

                        $t_id = $row["threads_id"];
                        $t_title = $row["threads_title"];
                        $t_desc = $row["threads_desc"];
                        $date = $row["threads_reg_date"];
                        $thread_user_id = $row["threads_user_id"];
                        $sql2 = "select * from users where id='$thread_user_id'";
                        $result2 = mysqli_query($con, $sql2);
                        $row2 = mysqli_fetch_assoc($result2);
                        $user_image = $row2["user_image"];
                        $query = "select * from comments where thread_id='$t_id'";
                        $result3 = mysqli_query($con, $query);
                        $num = mysqli_num_rows($result3);
                        if ($user_image == "") {
                            $user_image = "User-Profile.png";
                        }
                        echo ' <div class="row">
                                <div class="col-2 d-flex justify-content-end align-items-start">
                                <span class="rounded-5 border border-secondary overflow-hidden" style="width:31px;height:31px;">
                                <img src="uploaded_img/' . $user_image . '" class="img-fluid" width="31px" alt="">
                                </span>
                                </div>
                                <div class="col-10">
                                <p class="m-0 text-light"><b><small>@' . $row2["username"] . '</small></b> <i class="float-end" style="font-size:.7rem;"><small>Posted : ' . $date . '</small></i></p>
                                     <h5><a class="text-decoration-none" href="thread.php?threadid=' . $t_id . '"><span class="" style="font-size:13px;">' . $t_title . '</span></a></h5>
                                     <p class="text-secondary">' . $t_desc . '</p>';
                        if ($num <= 0) {
                            echo '<p class="w-sm-50"><a class="text-decoration-none p-2 rounded-2 text-warning d-block" style="background-color:#060a11;font-size:12px;" href="thread.php?threadid=' . $t_id . '">There\'s no Reply Yet | Be the first one Answer it. <span class="pt-2 fa fa-reply-all float-end"></span></a></p><hr class="text-secondary">';
                        } else if ($num == 1) {
                            echo '<p class="w-sm-50"><a class="text-decoration-none p-2 rounded-2 text-danger d-block" style="background-color:#060a11;font-size:12px;" href="thread.php?threadid=' . $t_id . '">There\'s only ' . $num . ' Reply <span class="pt-2 fa fa-reply-all float-end"></span></a></p><hr class="text-secondary">';
                        } else {
                            echo '<p class="w-sm-50"><a class="text-decoration-none p-2 rounded-2 text-info d-block" style="background-color:#060a11;font-size:12px;" href="thread.php?threadid=' . $t_id . '">There are ' . $num . ' Replies <span class="pt-2 fa fa-reply-all float-end"></span></a></p><hr class="text-secondary">';
                        }

                        echo '
                                </div> 
                            </div>';
                    }

                    ?>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <?php
                    if ($noResult) {
                        echo ' <div class="lead text-secondary p-4 rounded-2 my-1" style="background-color:#060a15;">No Threads<p>Be the first one to ask a Qn.</p></div>';
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