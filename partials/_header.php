<nav class="navbar navbar-expand-lg sticky-top top-0" id="navbarr">
  <div class="container-fluid">
    <a class="navbar-brand ps-2 ps-sm-5" href="./"><span class="fa fa-wechat"></span></a>
    <?php
    if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
    ?>
      <div class="me-auto ms-1 ms-sm-3">
        <button class="btn btn-sm border border-3 border-danger btn-outline-danger rounded-5 mx-1" data-bs-toggle="modal" data-bs-target="#userprofilemodal"><span class="fa fa-user"></span></button>
        <button type="button" class="btn btn-outline-danger position-relative fa fa-bell" id="notf-btn">
          <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger invisible"><i id="notification-no"></i></span>
        </button>
      </div>
    <?php
    } else {
    ?>
      <div class="me-auto ms-1 ms-sm-3">
        <button class="btn btn-sm btn-outline-danger rounded-0" data-bs-toggle="modal" data-bs-target="#signinmodal">LOGIN</button>
        <button class="btn btn-sm btn-outline-danger rounded-0" data-bs-toggle="modal" data-bs-target="#signupmodal">REGISTER</button>
        <button type="button" class="btn btn-outline-danger position-relative fa fa-bell d-none" id="notf-btn">
          <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger invisible"><i id="notification-no"></i></span>
        </button>
      </div>
    <?php
    }
    ?>

    <ul class="list-group" id="list"></ul>
    <button class="navbar-toggler text-danger" type="button" id="navbarcollapse" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContentt" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="fa fa-bars"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContentt">
      <div class="navbar-nav mx-auto mb-2 mb-lg-0 d-flex justify-content-center align-items-center">
        <ul class="list-group list-group-horizontal-sm">
          <li class="home list-group-item">
            <a class="nav-link" aria-current="page" href="./">Home</a>
          </li>
          <li class="about list-group-item">
            <a class="nav-link" href="about.php">About</a>
          </li>
          <li class="categories dropdown list-group-item">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Categories
            </a>
            <ul class="dropdown-menu bg-dark">
              <?php

              $sql = "SELECT * FROM `categories` LIMIT 4";
              $result = mysqli_query($con, $sql);
              while ($row = mysqli_fetch_assoc($result)) {
                $c_id = $row["c_id"];
                $c_name = $row["c_name"];
                echo '<li><a class="dropdown-item text-capitalize text-secondary" href="threadlist.php?catid=' . $c_id . '">' . $c_name . '</a></li>';
              }
              ?>
            </ul>
          </li>
          <li class="contact list-group-item">
            <a class="nav-link" href="contact.php">Contact</a>
          </li>
        </ul>
      </div>
      <form class="d-flex position-relative other-nav-content" role="search" method="get" action="search.php">
        <input class="form-control me-2 ps-5" type="search" name="search" placeholder="Type \ to Search" aria-label="Search">
        <button class="position-absolute start-0 ms-1 p-2 bg-transparent border-0" type="submit"><span class="fa fa-search text-secondary"></span></button>
      </form>
    </div>

  </div>
</nav>

<?php include '_signinmodal.php';?>
<?php include '_signupmodal.php';?>
<?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
  include '_user_profile.php';
} ?>
<?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
  include '_welcome_message.php';
} ?>