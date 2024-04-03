<?php require('header/header.php'); ?>

<?php
session_start();
require('conn.php');

if(!(isset($_SESSION['page']) and $_SESSION['page']==='Page')){
    header('Location:login.php');
    }
    else{
        header('Location: form.php');
    }

if (isset($_POST['submit'])) {
    $user = $_POST['user'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $password = $_POST['password'];

    $sql = "INSERT INTO `tb_employees` (name,last_name, email, age,password) VALUES ('$user','$last_name', '$email', '$age', '$password')";
    $query = mysqli_query($con, $sql);

    if ($query) {
        header('Location:tables.php');
    } else {
        echo "<script>alert('Mistake');</script>";
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
                                    <h3 class="text-center font-weight-light my-4">Qo'shish Yangi Hodimlar</h3>
                                </div>
                                <div class="card-body mb-3">
                                    <form action="form.php" method="POST">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" name="user" type="text" required />
                                            <label>Name:</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" name="last_name" type="text" required />
                                            <label>Last_name:</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" name="email" type="email" required />
                                            <label>Email</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" name="age" type="number" required />
                                            <label>Age</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" name="password" type="password" required />
                                            <label>password</label>
                                        </div>

                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <button class="btn btn-primary" type="submit" name="submit"
                                                onclick="return confirm('Do you want to add really employee');">Saqlash</button>
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