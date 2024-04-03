<?php require('header/header.php'); ?>


<?php
session_start();
require('../dist/conn.php');




if (isset($_GET['viewid'])) {
    $viewid = $_GET['viewid'];
    
    
    $sql = "SELECT * FROM coffee_shop WHERE id='$viewid'";
    $query = mysqli_query($con, $sql);
    $result = mysqli_num_rows($query);
    if ($result == 1) {
        $row = mysqli_fetch_assoc($query);

        $photo = $row['photo'];
        $title = $row['title'];
        $price = $row['price'];
        $body = $row['body'];
        $created_at = $row['created_at'];
    } else {
        header('location:index.php');
        exit();
    }
} else {
    header('location:index.php');
    exit();
}




?>


<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
        
        <a class="navbar-brand" href="index.php">Coffee</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
                class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!"> Home </a></li>
                <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">All Products</a></li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li><a class="dropdown-item" href="#!">Popular Items</a></li>
                        <li><a class="dropdown-item" href="#!">New Arrivals</a></li>
                    </ul>
                </li>
            </ul>
            <form class="d-flex">
                <i class="fas fa-arrow-left me-2 mt-1 bg-white"></i>
                <a href="index.php" class="link-white" onclick="return confirm('Do you really want to quit?')">Return
                    Main</a>

            </form>
        </div>
    </div>
</nav>
<!-- Navbar end -->

<!-- header -->

<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Coffee&House</h1>
            <p class="lead fw-normal text-white-50 mb-0">Coffee About <small class="text-danger"><?= $title; ?></small> <br>
            </p>
        </div>
    </div>
</header>

<!-- header end -->

<!-- View catch -->



<!-- cards -->

<div class="row">
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <img src="../pictures/<?= $photo; ?>" style="width:650px;height:310px;">
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body mt-5">
                <h2 class="card-title text-bg-dark"><marquee behavior="scroll" direction="right"><?= $title; ?></marquee></h2>
                <h5 class="card-text text-center"> <mark class="text-success"> <?= $price; ?>$ </mark> dollar </h5>
                <h5 class="text-center "> <strong> <?= $body; ?> </strong></h5>
            </div>
            <div class="card-body mt-5">
                </div>
            </div>
        </div>
        
</div>


<?php require('footer/footer.php'); ?>