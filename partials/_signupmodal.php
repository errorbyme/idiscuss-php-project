<?php
require '_dbconnect.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["register"])) {
        $username = mysqli_escape_string($con, $_POST["signupusername"]);
        $user_email = mysqli_escape_string($con, $_POST["signupuseremail"]);
        $password = mysqli_escape_string($con,  $_POST["signuppassword"]);
        $cpassword = mysqli_escape_string($con,  $_POST["signupcpassword"]);

        $img_name = $_FILES["image"]["name"];
        $img_size = $_FILES["image"]["size"];
        $img_tmp_name = $_FILES["image"]["tmp_name"];
        $img_folder = "uploaded_img/" . $img_name;

        $user_exits = "select * from users where user_email='$user_email'";
        $result = mysqli_query($con, $user_exits);
        $num = mysqli_num_rows($result);
        if ($username == "" || $user_email == "" || $password == "" || $cpassword == "") {
            $_SESSION["errormessage"] = "All the fields are required*";
        } elseif ($password < 8) {
            $_SESSION["errormessage"] = "password is short,make sure its greater den 8*";
        } else {
            if ($num > 0) {
                $_SESSION["errormessage"] = "Email already in use, pls use any other email";
            } else {
                if ($password != $cpassword) {
                    $_SESSION["errormessage"] = "Password not matched browski, pls make sure both the password are same";
                } else {
                    if ($img_size > 2000000) {
                        $_SESSION["errormessage"] = "Img is too big, pls choose an valid image";
                    } else {
                        $hash = password_hash($password, PASSWORD_DEFAULT);
                        $sql = "INSERT INTO `users` (`username`,`user_email`, `password`,`user_image`) VALUES ('$username','$user_email', '$hash','$img_name')";
                        $result = mysqli_query($con, $sql);
                        if ($result) {
                            move_uploaded_file($img_tmp_name, $img_folder);
                            $_SESSION["successmessage"] = "Successfully Sign up, now u can sign in..";
                            $_SESSION["signin"] = true;
                        }
                    }
                }
            }
        }
    }
}
?>
<!-- sign up modal -->
<div class="modal fade signmodal" id="signupmodal" tabindex="-1" aria-labelledby="examplesignupmodal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content border border-2 border-light">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="examplesignupmodal">Sign Up</h1>
                <button type="button" class="btn btn-outline-danger close" data-bs-dismiss="modal">Close</button>
            </div>
            <div class="modal-body">
                <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post" enctype="multipart/form-data" onsubmit="return inputValidation()">
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="signupusername" class="form-label">Username</label>
                            <input type="text" class="form-control" name="signupusername" id="signupusername" placeholder="Username">
                            <span class="message"></span>
                        </div>
                        <div class="col-sm-6">
                            <label for="signupemail" class="form-label">Email address</label>
                            <input type="email" class="form-control" name="signupuseremail" id="signupemail" placeholder="Email">
                            <span class="message"></span>
                        </div>
                        <div class="col-sm-6">
                            <label for="signuppassword" class="form-label">Password</label>
                            <input type="password" class="form-control" name="signuppassword" id="signuppassword" placeholder="password">
                            <span class="message"></span>
                        </div>
                        <div class="col-sm-6">
                            <label for="signupcpassword" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" name="signupcpassword" id="signupcpassword" placeholder="Confirm password">
                            <span class="message"></span>
                        </div>
                        <div class="mb-2">
                            <label for="pfp" class="form-label">Pfp</label>
                            <input type="file" class="form-control" accept="image/jpg,image/jpeg,image/png" name="image" id="pfp">
                            <span class="message"></span>
                        </div>
                        <div class="mb-1">
                            <button type="submit" class="btn btn-outline-success btn-sign" name="register" id="submit">Sign Up</button><br>
                            <span class="message"></span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>