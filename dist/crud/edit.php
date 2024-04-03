<?php require_once('../header/header.php'); ?>

<?php
require('../conn.php');

if (!(isset($_SESSION['page']) and $_SESSION['page'] === 'Page')) {
    header('Location:login.php');
} else {
    header('Location: post.php');
}


if (isset($_POST['edit']) && isset($_GET['editid'])) {
    $id = $_GET['editid'];

    $title = $_POST['title'];
    $body = $_POST['body'];
    $price = $_POST['price'];
    $fileName = $_FILES['image']['name'];
    $tempName = $_FILES['image']['tmp_name'];
    $folder = "../../pictures/" . $fileName;

    $sql = "UPDATE coffee_shop SET photo = '$fileName', title='$title',body='$body',price='$price' WHERE id='$id'";
    $query = mysqli_query($con, $sql);
    if ($query) {
        header('location:../post.php');
    } else {
        echo "No success";
    }
}






?>


<body class="bg-primary">
    <div>
        <div>
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5 mb-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Coffee Post Edit</h3>
                                </div>
                                <div class="card-body mb-3">
                                    <form action="" method="POST" enctype="multipart/form-data">

                                        <?php
                                        if (isset($_GET['editid'])) {
                                            $coffeeid = $_GET['editid'];

                                            $sql = "SELECT * FROM coffee_shop WHERE id='$coffeeid'";
                                            $query = mysqli_query($con, $sql);


                                            while ($row = mysqli_fetch_assoc($query)) {

                                                ?>
                                                <div class="form-floating mb-2">
                                                    <input class="" name="image" type="file" value="<?= $row['photo']; ?>" />
                                                </div>

                                                <div class="form-floating mb-2">
                                                    <input class="form-control" name="title" type="text" required
                                                        value="<?= $row['title']; ?>" />
                                                    <label>Title:</label>
                                                </div>
                                                <div class="form-floating mb-2">
                                                    <input class="form-control" name="price" type="number" required
                                                        value="<?= $row['price']; ?>" />
                                                    <label>price:</label>
                                                </div>
                                                <div class="form-floating mb-2">
                                                    <textarea name="body" cols="30" class="form-control"
                                                        rows="10"><?= $row['body']; ?></textarea>

                                                </div>



                                            <?php }
                                        }
                                        ?>

                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <button class="btn btn-primary" type="submit" name="edit"
                                                onclick="return confirm('Do you want to add really product');">Mahsulot
                                                O'zgartirish</button>
                                            <a href="../post.php">
                                                <i class="fas fa-arrow-left me-1"></i>
                                                Return to Post Page
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

    </div>

    <?php include_once('../footer/footer.php'); ?>