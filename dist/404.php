<?php
session_start();
require('conn.php');
?>
<?php require('header/header.php'); 


?>

<body>
    <div id="layoutError">
        <div id="layoutError_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="text-center mt-4">
                                <img class="mb-4 img-error" src="assets/img/error-404-monochrome.svg" />
                                <p class="lead"></p>
                                <a href="login.php">
                                    <i class="fas fa-arrow-left me-1"></i>
                                    Return to Login Page
                                </a>
                                <h5 class="mt-3">   You are session expired </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutError_footer">
            <?php require('footer/footer.php'); ?>