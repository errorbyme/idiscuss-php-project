<!-- user profile modal -->
<div class="modal fade" id="userprofilemodal" tabindex="-1" aria-labelledby="userprofile" aria-hidden="true">
    <div class="modal-dialog w-auto">
        <div class="modal-content border border-2 border-light">
            <div class="modal-body rounded-2" style="background-color: #0d1117;">
                <div class="container">
                    <div class="row">
                        <?php
                        $user_image = "User-Profile.png";
                        if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
                            $user_email = $_SESSION["useremail"];
                            $sql = "select * from users where user_email='$user_email'";
                            $result = mysqli_query($con, $sql);
                            $row = mysqli_fetch_assoc($result);
                            $email = $row["user_email"];
                            $username = $row["username"];
                            $user_image = $row["user_image"];
                            if ($user_image == "") {
                                $user_image = "User-Profile.png";
                            }
                            echo '<div class="col-sm-6 d-flex align-items-center justify-content-center">
                                    <div class="d-flex align-items-center justify-content-center border border-5 border-danger p-1" style="width:201px;height:201px;border-radius:50%;">
                                <img src="uploaded_img/' . $user_image . '" style="width: 195px; height:195px;border-radius:50%;" alt="no img">
                                </div>
                            </div>
                            <div class="col-sm-6 d-flex align-items-center justify-content-center overflow-hidden">
                            <div style="font-size:10px;">
                            <p class="my-2 text-success fw-bolder text-uppercase">Username : <span class="text-danger">' . $username . '</span></p><hr class="m-0 p-0 text-secondary">
                            <p class="my-2 text-success fw-bolder text-uppercase">Gmail : <span class="text-danger">' . $user_email . '</span></p><hr class="m-0 p-0 text-secondary">
                            <a href="_logout.php" class="btn btn-sm btn-outline-danger my-0 mt-3">LOGOUT</a>
                            <button type="button" class="btn btn-sm btn-outline-warning mt-3" data-bs-dismiss="modal">Close</button>
                            </div>
                            </div>';
                        } else {
                            echo '<div class="text-center">
                                <img src="uploaded_img/' . $user_image . '" style="width: 200px; height:200px;border-radius:50%;" alt="no img">
                            </div>
                            <div class="col-10 mx-auto">
                                <p class="my-3 text-success fw-bolder text-uppercase">Pls Login</p>
                            </div>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>