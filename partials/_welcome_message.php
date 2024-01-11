<?php
if (isset($_SESSION["hello"])) :
?>

    <script>
        setTimeout(() => {
            $(document).ready(function() {
                document.getElementById('hellomodal').style.transition = 'all 1s ease-in-out';
                document.getElementById('hellomodal').style.transform = 'scale(0)';
                document.getElementById('hellomodal').style.opacity = '1';
                $('#hellomodal').toast('show');
                document.getElementById('hellomodal').style.transform = 'scale(1)';
            });
        })
    </script>


    <div class="toast-container position-fixed start-0 ps-1 ps-sm-3 pt-2 pe-1" style="top: 70px;">
        <div id="hellomodal" class="toast w-auto" role="alert" auto-delay="1" data-autohide="true">
            <div class="toast-header bg-dark">
                <button type="button" class="btn btn-danger close float-end" data-bs-dismiss="toast" aria-label="Close">Close</button>
            </div>
            <div class="toast-body fw-bolder rounded-0">
                <?php
                $user_email = $_SESSION["useremail"];
                $sql = "select * from users where user_email='$user_email'";
                $result = mysqli_query($con, $sql);
                $row = mysqli_fetch_assoc($result);
                $email = $row["user_email"];
                $username = $row["username"];
                $user_image = $row["user_image"];
                ?>
                <div class="wrapper m-0">
                    <div class="static-txt"><span>H</span>ey There,</div>
                    <ul class="dynamic-txt">
                        <li class="ms-1">@<span><?= $username ?></span></li>
                    </ul>
                </div>
                <p class="ps-2 m-0"><small class="text-success">Welcome to CHACHA IDiscuss website!</small></p>
            </div>
        </div>
    </div>

<?php
    unset($_SESSION["hello"]);
endif;
?>