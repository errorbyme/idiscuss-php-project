<?php
require 'partials/_dbconnect.php';
session_start();
if (isset($_GET["seen"])) {
    $seen = $_GET["seen"];
    $sql2 = "UPDATE comments SET active = 0 WHERE comment_id = $seen;";
    $result2 = $con->query($sql2);
}
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
    <title>comments page</title>
    <link rel="icon" type="image/x-icon" href="imgs/icons8-poison-16.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="css_js/style.css">
    <title></title>
</head>

<body>
    <div class="container-fluid p-0 thread-page" id="maincontainer">
        <?php include 'loader.php'; ?>
        <?php include 'partials/_header.php'; ?>
        <?php
        $id = $_GET["threadid"];
        $sql = "select * from threads where threads_id=$id";
        $result = mysqli_query($con, $sql);
        $noResult = true;
        while ($row = mysqli_fetch_assoc($result)) {
            $noResult = false;
            $title = $row["threads_title"];
            $desc = $row["threads_desc"];
            $user_id = $row["threads_user_id"];

            $sql3 = "select * from users where id=$user_id";
            $result3 = mysqli_query($con, $sql3);
            $row3 = mysqli_fetch_assoc($result3);
        }
        ?>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["addthreadcomment"])) {
                $comment =  mysqli_escape_string($con, $_POST["comment"]);
                $comment = str_replace("<", "&lt;", $comment);
                $comment = str_replace("<", "&gt;", $comment);
                $comment_by =  mysqli_escape_string($con, $_POST["sno"]);
                $comment_on_id = $row3["id"];
                $comment_active = 1;
                if ($comment_by==$comment_on_id) {
                    $comment_active = 0;
                }
                if ($comment=="") {
                    $_SESSION["errormessage"] = "Your comment is empty*";
                } else {
                    $sql = "INSERT INTO `comments` (`comment_content`, `thread_id`, `comment_by`,`comment_on_id`,`active`) VALUES ('$comment', '$id', '$comment_by','$comment_on_id','$comment_active')";
                    $result = mysqli_query($con, $sql);
                    if ($result) {
                        $_SESSION["successmessage"] = "Your comment has been Added.";
                    }
                }
                
            }
        }
        ?>
        <?php include("partials/_message.php"); ?>
        <div class="container my-4">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div class="card my-1 rounded-0 thread-welcome">
                        <div class="card-header border-0">
                            <h5><span class="text-capitalize"><?php echo $title; ?></span></h5>
                            <hr>
                        </div>
                        <div class="card-body border-0">
                            <p><?php echo $desc; ?></p>
                            <hr>
                        </div>
                        <div class="card-footer border-0 pt-0">
                            <p class="m-0 text-warning">No spam!</p>
                            <span class="lead" style="font-size: 14px;">Posted by : <b class="text-light"><?= $row3["username"] ?></b></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="position-fixed" style="bottom: 40px;right:14px;">
            <a href="#" class="fa-solid fa-up-long float-end" id="backtotop" onclick="document.body.scrollTop=0;document.documentElement.scrollTop=0;event.preventDefault()"></a><br>
            <button class="btn btn-sm btn-outline-success text-success" id="" type="button" style="background-color:#060a11;" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom">Post a Comment <img src="imgs/send-png-green.png" width="20px" alt=""></button>
        </div>

        <?php
        if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
            echo '<div class="offcanvas offcanvas-bottom" data-bs-scroll="true" tabindex="-1" id="offcanvasBottom" aria-labelledby="offcanvasBottomLabel" style="height:120px;background-color:#060a11;">
        <div class="offcanvas-body overflow-hidden p-1">
        <div class="row">
        <div class="col-md-10 mx-auto mb-1 mt-0">
        <button type="button" class="btn btn-sm float-end" data-bs-dismiss="offcanvas" aria-label="Close" style="color:red;"><span class="fa fa-close"></span></button>
                    </div>
                    <div class="col-md-10 mx-auto mb-1">
                        <form action="' . $_SERVER['REQUEST_URI'] . '" method="post">
                            <div class="position-relative">
                                <input type="hidden" name="sno" value="' . $_SESSION["sno"] . '">
                        <textarea name="comment" class="form-control text-light" id="commento" cols="30" rows="2" placeholder="Add Your Commentø" style="background-color:black;box-shadow:none;"></textarea>
                        <button type="submit" name="addthreadcomment" class="btn btn-sm position-absolute" style="right:5px; bottom:5px;"><img src="imgs/send-png-white.png" width="25px" alt=""></button>
                        </div>
                </form>
            </div>
        </div>
        </div>
    </div>';
        } else {
            echo '<div class="offcanvas offcanvas-bottom" tabindex="-1" id="offcanvasBottom" aria-labelledby="offcanvasBottomLabel" style="height:130px;background-color:#0d1117;">
        <div class="offcanvas-body overflow-hidden p-1">
        <div class="row">
        <div class="col-md-10 mx-auto mb-1 mt-0">
        <button type="button" class="btn btn-sm float-end" data-bs-dismiss="offcanvas" aria-label="Close" style="color:red;"><span class="fa fa-close"></span></button>
                    </div>
                    <div class="col-md-10 mx-auto mb-1">
                    <div class="p-4 rounded-0 text-light border border-secondary" style="background-color:#060a14;"><b><span class="text-danger">Sign in</span> to post a comment.</b></div>
            </div>
        </div>
        </div>
    </div>';
        }

        ?>
        <div class="container">
            <div class="row">
                <div class="col-md-10 mx-auto my-3">
                    <h2 class="text-light mb-4">Discussions</h2>
                    <hr class="text-light">
                    <?php
                    $id = $_GET["threadid"];
                    $sql = "select * from comments where thread_id=$id";
                    $result = mysqli_query($con, $sql);
                    $section = 0;
                    if (isset($_GET["seen"])) {
                        $section = $_GET["seen"];
                    }
                    $noResult = true;
                    while ($row = mysqli_fetch_assoc($result)) {
                        $noResult = false;

                        $timestamp = strtotime($row["comment_date"]);
                        $date = date('d-m', $timestamp);
                        $content = $row["comment_content"];
                        $comment_by = $row["comment_by"];
                        $comment_id = $row["comment_id"];
                        $sql2 = "select * from users where id='$comment_by'";
                        $result2 = mysqli_query($con, $sql2);
                        $row2 = mysqli_fetch_assoc($result2);
                        $user_image = $row2["user_image"];
                        if ($user_image == "") {
                            $user_image = "User-Profile.png";
                        }

                        if ($section == $comment_id) {
                            echo ' <div class="row my-3" id="section' . $comment_id . '"  style="scroll-margin-top: 40vh;">
                                    <div class="col-2 d-flex justify-content-end align-items-start">
                                    <span class="rounded-5 border border-secondary overflow-hidden" style="width:31px;height:31px;">
                                    <img src="uploaded_img/' . $user_image . '" width="31px" alt="img">
                                    </span>
                                    </div>
                                    <div class="col-10 rounded-2" style="background-color:#010409;">
                                    <p class="m-0 text-light"><b><small>@' . $row2["username"] . '</small></b><i class="float-end"><small style="font-size:.7rem;">Posted : ' . $date . '</small></i></p>
                                    <p class="m-0 text-secondary">' . $content . '</p>
                                    <hr class="m-1 text-secondary">
                                    </div> 
                                </div>';
                        } else {
                            echo ' <div class="row my-3">
                                    <div class="col-2 d-flex justify-content-end align-items-start">
                                    <span class="rounded-5 border border-secondary overflow-hidden" style="width:31px;height:31px;">
                                    <img src="uploaded_img/' . $user_image . '" width="31px" alt="img">
                                    </span>
                                    </div>
                                    <div class="col-10">
                                    <p class="m-0 text-light"><b><small>@' . $row2["username"] . '</small></b><i class="float-end"><small style="font-size:.7rem;">Posted : ' . $date . '</small></i></p>
                                    <p class="m-0 text-secondary">' . $content . '</p>
                                    <hr class="m-1 text-secondary">
                                    </div> 
                                </div>';
                        }
                    }

                    ?>
                    <?php
                    if ($noResult) {
                        echo '<div class="p-4 rounded-0 text-light" style="background-color:#060a13;"><b>No comments! Be the first one to Answer it</b></div>';
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