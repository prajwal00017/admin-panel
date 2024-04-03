<?php require('header/header.php'); ?>
<?php
session_start();
require('conn.php');

if (!(isset($_SESSION['page']) and $_SESSION['page'] === 'Page')) {
    header('Location:login.php');
} else {
    header('Location: edit.php');
}



if (isset($_POST['update']) && isset($_GET['editid'])) {
    $id = $_GET['editid'];


    $user = $_POST['user'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $password = $_POST['password'];

    $sql = "UPDATE tb_employees SET name='$user',last_name = '$last_name',email='$email',age='$age',password='$password' WHERE id='$id'";
    $query = mysqli_query($con, $sql);
    if ($query) {
        header('Location: index.php');
    } else {
        echo "Mistake";
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
                                    <h3 class="text-center font-weight-light my-4">O'zgartirish</h3>
                                </div>
                                <div class="card-body mb-3">

                                    <form action="" method="POST">
                                        <?php
                                        if (isset($_GET['editid'])) {
                                            $employ_id = $_GET['editid'];

                                            $sql = "SELECT * FROM tb_employees WHERE id='$employ_id'";
                                            $query = mysqli_query($con, $sql);


                                            while ($row = mysqli_fetch_assoc($query)) {

                                                ?>

                                                <div class="form-floating mb-3">
                                                    <input class="form-control" name="user" type="text" required
                                                        value="<?= $row['name']; ?>" />
                                                    <label>Name:</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input class="form-control" name="last_name" type="text" required
                                                        value="<?= $row['last_name'] ?>" />
                                                    <label>last_name</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input class="form-control" name="email" type="text" required
                                                        value="<?= $row['email'] ?>" />
                                                    <label>email</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input class="form-control" name="age" type="text" required
                                                        value="<?= $row['age'] ?>" />
                                                    <label>Age</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input class="form-control" name="password" type="text" required
                                                        value="<?= $row['password'] ?>" />
                                                    <label>password</label>
                                                </div>
                                                <?php
                                            }
                                        }


                                        ?>
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <button class="btn btn-primary" type="submit" name="update"
                                                onclick="return confirm('Do you want to update really?');">O'zgartirish</button>
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