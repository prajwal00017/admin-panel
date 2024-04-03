<?php require('header/header.php'); ?>

<?php
session_start();
require('conn.php');

    

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $body = $_POST['body'];
    $price = $_POST['price'];
    $fileName = ($_FILES['image']['name']);
    $tempName = $_FILES['image']['tmp_name'];
    $folder = "../pictures" . $fileName;


    $sql = "INSERT INTO coffee_shop (photo,title,price,body) VALUES ('$fileName','$title','$price','$body')";
    $query = mysqli_query($con, $sql);
    if ($query) {
        
header('Location:post.php');
    } else {
        echo "File upload failed, please try again.";
    }

}

?>


<body class="bg-primary overflow-hidden">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5 mb-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Coffee Post</h3>
                                </div>
                                <div class="card-body mb-3">
                                    <form action="" method="POST" enctype="multipart/form-data">

                                        <div class="form-floating mb-2">
                                            <input class="" name="image" type="file" required />
                                        </div>

                                        <div class="form-floating mb-2">
                                            <input class="form-control" name="title" type="text" required />
                                            <label>Title:</label>
                                        </div>
                                        <div class="form-floating mb-2">
                                            <input class="form-control" name="price" type="number" required />
                                            <label>price:</label>
                                        </div>
                                        <div class="form-floating mb-2">
                                           <textarea name="body" id="" cols="30" rows="10" class="form-control" required></textarea>
                                            <label>body:</label>
                                        </div>

                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <button class="btn btn-primary" type="submit" name="submit"
                                                onclick="return confirm('Do you want to add really product');">Mahsulot
                                                qo'shish</button>
                                            <a href="index.php">
                                                <i class="fas fa-arrow-left me-1"></i>
                                                Return to Index Page
                                            </a>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>




        <?php require('footer/footer.php'); ?>