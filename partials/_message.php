<?php
if (isset($_SESSION["successmessage"])) :
?>
    <div class='mx-1 mx-sm-5 my-2 alert alert-success alert-dismissible fade show rounded-0' role='alert'>
        <strong><?= $_SESSION["successmessage"]; ?></strong>
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>
<?php
    unset($_SESSION["successmessage"]);
endif;
?>

<?php
if (isset($_SESSION["errormessage"])) :
?>
    <div class='mx-1 mx-sm-5 my-2 alert alert-danger alert-dismissible fade show rounded-0' role='alert'>
        <strong><?= $_SESSION["errormessage"]; ?></strong>
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>
<?php
    unset($_SESSION["errormessage"]);
endif;
?>


<?php
if (isset($_SESSION["signin"])) :
?>
    <script>
        $(document).ready(function () {
        $("#signinmodal").modal("show");
            
        });
    </script>
<?php
    unset($_SESSION["signin"]);
endif;
?>

