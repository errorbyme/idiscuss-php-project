<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["login"])) {
        require '_dbconnect.php';
        $user_email = mysqli_escape_string($con, $_POST["signinuseremail"]);
        $password = mysqli_escape_string($con, $_POST["signinpassword"]);
        if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']) {
            $url = 'https://';
        } else {
            $url = 'http://';
        }
        $url = $_SERVER['HTTP_HOST'];
        $url = $_SERVER['REQUEST_URI'];
        $user_exits = "select * from users where user_email='$user_email'";
        $result = mysqli_query($con, $user_exits);
        $num = mysqli_num_rows($result);
        if ($num == 1) {
            $row = mysqli_fetch_assoc($result);
            if (password_verify($password, $row["password"])) {
                // session_start();
                $_SESSION["loggedin"] = true;
                $_SESSION["hello"] = true;
                $_SESSION["sno"] = $row["id"];
                $_SESSION["useremail"] = $user_email;
                $_SESSION["successmessage"] = "Successfully sign in..";
                header("Location:".$url);
                exit(0);
            } else {
                $_SESSION["signmessage"] = "Pls check yr password browski.";
                $_SESSION["signin"] = true;
            }
        } else {
            $_SESSION["signmessage"] = "Invalid user browski.";
            $_SESSION["signin"] = true;
        }
    }
}
?>
<!-- sign in modal -->
<div class="modal fade signmodal" id="signinmodal" tabindex="1" aria-labelledby="examplesigninmodal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content border border-2 border-light">
            <?php include("_signmessage.php"); ?>
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="examplesigninmodal">Sign In</h1>
                <button type="button" class="btn btn-danger close" data-bs-dismiss="modal">Close</button>
            </div>
            <div class="modal-body">
                <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
                    <div class="mb-3">
                        <label for="signinemail" class="form-label">Email address</label>
                        <input type="email" class="form-control" name="signinuseremail" id="signinemail" aria-describedby="emailHelp" placeholder="Email">
                    </div>
                    <div class="mb-3">
                        <label for="signinpassword" class="form-label">Password</label>
                        <input type="password" class="form-control" name="signinpassword" id="signinpassword" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-outline-success btn-sign" name="login">Sign in</button>
                </form>
            </div>
        </div>
    </div>
</div>