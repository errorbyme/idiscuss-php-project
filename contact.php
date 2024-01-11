<?php
require 'partials/_dbconnect.php';
session_start();
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["submitmessage"])) {
            $username = mysqli_escape_string($con,  $_POST["username"]);
            $email = mysqli_escape_string($con,  $_POST["email"]);
            $contact = mysqli_escape_string($con,  $_POST["contact"]);
            $message = mysqli_escape_string($con,  $_POST["message"]);
            $user_id = mysqli_escape_string($con,  $_POST["user_id"]);
            if ($username == "" || $email == "" || $contact == "" || $message == "") {
                $_SESSION["errormessage"] = "All the fields are required";
            } else {
                $sql = "INSERT INTO `messages` (`user_id`,`username`,`email`, `contact`, `message`) VALUES ('$user_id','$username','$email', '$contact', '$message')";
                $result = mysqli_query($con, $sql);
                if ($result) {
                    $_SESSION["successmessage"] = "Your message has been submitted";
                }
            }
        }
    }
} else {
    if (isset($_POST["submitmessage"])) {
        $_SESSION["errormessage"] = "Pls login to contact us..";
    }
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
    <title>contact page</title>
    <link rel="icon" type="image/x-icon" href="imgs/icons8-poison-16.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="css_js/style.css">
</head>
<style>
    nav ul .contact a {
        color: red !important
    }
</style>

<body>
    <div class="container-fluid p-0 contact-page" id="maincontainer">
        <?php include 'loader.php'; ?>
        <?php include 'partials/_header.php'; ?>
        <?php include("partials/_message.php"); ?>

        <div class="container">
            <div class="row">
                <div class="col-md-5 mx-auto">
                    <h2 class="my-4 text-light">Contact Us</h2>
                    <?php
                    $uid = "";
                    $uusername = "";
                    $uemail = "";
                    if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
                        $uemail = $_SESSION["useremail"];
                        $sql = "select * from users where user_email='$uemail'";
                        $result = mysqli_query($con, $sql);
                        $row = mysqli_fetch_assoc($result);
                        $uusername = $row["username"];
                        $uid = $row["id"];
                    }
                    ?>
                    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
                        <div class="my-3 input-group">
                            <input type="hidden" name="user_id" value="<?= $uid ?>">
                            <label for="cusername" class="input-group-text w-25 d-flex justify-content-center box"><span class="fa fa-user" style="color: blue;"></span></label>
                            <input type="text" id="cusername" class="form-control" name="username" placeholder="Username" value="<?= $uusername ?>">
                        </div>
                        <div class="my-3 input-group">
                            <label for="cemail" class="input-group-text w-25 d-flex justify-content-center box"><span class="fa fa-asl-interpreting" style="color: red;"></span></label>
                            <input type="Email" id="cemail" class="form-control" name="email" placeholder="Email" value="<?= $uemail ?>">
                        </div>
                        <div class="my-3 input-group">
                            <label for="ccontact" class="input-group-text w-25 d-flex justify-content-center box"><span class="fa fa-phone" style="color: green;"></span></label>
                            <input type="text" id="ccontact" class="form-control" name="contact" placeholder="Contact">
                        </div>
                        <div class="my-3 input-group">
                            <label for="message" class="input-group-text w-25 d-flex justify-content-center box"><span class="fa-solid fa-message" style="color: purple;"></span></label>
                            <textarea name="message" id="message" class="form-control" id="" cols="30" rows="3" placeholder="Type your Message Here"></textarea>
                        </div>
                        <div class="my-3 input-group">
                            <button type="submit" name="submitmessage" class="btn btn-sm btn-outline-success text-success" style="background-color:#060a11; ">Submit Your Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php include("partials/_footer.php"); ?>
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