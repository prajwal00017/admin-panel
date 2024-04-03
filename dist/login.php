<?php require('header/header.php'); ?>

<?php
session_start();
require('conn.php');

if (isset($_POST['submit'])) {
    $admin = $_POST['admin'];
    $psw = $_POST['psw'];
    $sql = "SELECT * FROM tb_admin WHERE admin='$admin' OR password = '$psw'";
    $query = mysqli_query($con, $sql);
    $row = mysqli_num_rows($query);
    if ($row == 1) {
       $_SESSION['page'] = 'Page';
        $_SESSION['admin'] = $admin;
        $_SESSION['start'] = time();
        $_SESSION['expire'] = $_SESSION['start'] + (6 * 60);
        header('Location:index.php');
    } else {
        echo "<script>alert('Login failed');</script>";
        header('Location:login.php');
    }

}



?>


<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Login</h3>
                                </div>
                                <div class="card-body">
                                    <form action="login.php" method="post" autocomplete="off">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" name="admin" type="text"
                                                required />
                                            <label>User Name:</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" name="psw" type="password"
                                                required />
                                            <label for="inputPassword">Password</label>
                                        </div>

                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <button class="btn btn-primary" type=" submit" name="submit"
                                                onclick="return confirm('Do you want to access the admin panel?')">Login</button>
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