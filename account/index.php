<?php require('header/header.php'); ?>



<?php

session_start();
require('../dist/conn.php');





if (!(isset($_SESSION['email']) and $_SESSION['page']==='Page')) {
    header('Location:login.php');
} else {
    $now = time();

    if ($now > $_SESSION['expire']) {
        session_destroy();
        header('location:session_expired/404.php');
    } else {
        ?>



        <!-- Page -->

        <!-- Navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-0 py-3">
  <div class="container-xl">
    <!-- Logo -->
    <a class="navbar-brand" href="#">
      <img src="../pictures/images.jpg" class="h-8 w-25" alt="...">
    </a>
    <!-- Navbar toggle -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Collapse -->
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <!-- Nav -->
      <div class="navbar-nav mx-lg-auto">
        <a class="nav-item nav-link active" href="#" aria-current="page">Home</a>
        <a class="nav-item nav-link" href="#">Product</a>
        <a class="nav-item nav-link" href="#">Features</a>
        <a class="nav-item nav-link" href="#">Pricing</a>
      </div>

      <!-- Action -->
      <div class="d-flex align-items-lg-center mt-3 mt-lg-0">
        <a onclick="return confirm('Chiqmoqchimisiz?')" href="login.php" class="btn btn-sm btn-primary w-full w-lg-auto">
         Login
        </a>
      </div>
    </div>
  </div>
</nav>
                               
 <!--Navbar ended  -->
             
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Coffee&House</h1>
                    <p class="lead fw-normal text-white-50 mb-0">welcome to our cofee house website <br>
                    </p>
                </div>
            </div>
        </header>
        <!-- Section-->
        <section>
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-3 row-cols-md-4 row-cols-xl-5 justify-content-center">
              
                  <?php

                    $sql = "SELECT * FROM coffee_shop";
                    $query = mysqli_query($con, $sql);
                    if ($query) {
                        while ($row = mysqli_fetch_assoc($query)) {

                            ?>

                            <div class="col mb-5">
                                <div class="card h-100">
                                    <!-- Product image--> 
                                    <img class="card-img-top w-100" src="../pictures/<?= $row['photo']; ?>" alt="..." />
                                    <!-- Product details-->
                                    <div class="card-body p-4">
                                        <div class="text-center">
                                            <!-- Product name-->
                                            <h5 class="fw-bolder"> Name: <?= $row['title']; ?></h5>
                                            
                                            <!-- Product price-->
                                          <strong> Price:</strong>
                                            <?= $row['price']; ?>$
                                        </div>
                                        <strong class="mt-2">
                                        <?= $row['created_at']; ?>
                                        </strong>
                                        
                                    </div>
                                    <!-- Product actions-->
                                    <div class="">
                                        <div class="text-center">
                                            <a class="btn btn-outline-dark mt-auto" href="view.php?viewid=<?= $row['id'];?>" onclick="return confirm('Do you really want to see?')">View</a>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        <?php }
                    }
                    ?>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container">
                <p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p>
            </div>
        </footer>
        <!-- Page end -->

        <?php require('footer/footer.php'); ?>

        <?php

    }

}


?>