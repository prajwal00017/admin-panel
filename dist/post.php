<?php require('header/header.php'); ?>
<?php

session_start();
require('conn.php');


?>






<section>
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-3 row-cols-md-4 row-cols-xl-5 justify-content-center">

            <!-- Product actions-->
            <?php


            $sql = "SELECT * FROM coffee_shop";
            $query = mysqli_query($con, $sql);
            if ($query) {
                while ($row = mysqli_fetch_assoc($query)) {
                    ?>
                    <div>
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top w-100" src="../pictures/<?= $row['photo']; ?>" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4 text-center">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">
                                        <?= $row['title']; ?>
                                    </h5>
                                    <!-- Product price-->
                                    <?= $row['price']; ?>$
                                </div>
                                <p>
                                    <?= $row['body']; ?>
                                </p>
                            </div>
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center">
                                    <a class="btn btn-outline-success" href="crud/edit.php?editid=<?= $row['id']; ?>"
                                        onclick="return confirm('Do you want to edit really?')">Edit</a>
                                    <a class="btn btn-outline-danger" href="crud/delete.php?delid=<?= $row['id']; ?>"
                                        onclick="return confirm('Do you want to delete really?')">Delete</a>
                                </div>
                                <i class="fas fa-arrow-left me-2 mt-4"></i>
                                <a href="index.php">Return to Index Page</a>
                            </div>

                        </div>
                    </div>
                    <?php
                }
            }

            ?>


            <!-- Product actions end-->
</section>
</div>
</div>


<?php require('footer/footer.php'); ?>