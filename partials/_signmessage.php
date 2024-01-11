<?php
if (isset($_SESSION["signmessage"])) :
?>
    <div class='alert alert-danger alert-dismissible fade show rounded-0' role='alert'>
        <strong><?= $_SESSION["signmessage"]; ?></strong>
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>
<?php
    unset($_SESSION["signmessage"]);
endif;
?>
