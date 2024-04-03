<?php require('header/header.php'); ?>

<?php
session_start();
require('../dist/conn.php');



if (isset($_POST['submit'])) {
    // $people = $_POST['people'];
    $email = $_POST['email'];
    $psw = $_POST['password'];
    $sql = "SELECT * FROM tb_employees WHERE email='$email' AND password = '$psw'";
    $query = mysqli_query($con, $sql);
    $row = mysqli_num_rows($query);
    if ($row == 1) {
       $_SESSION['page'] = 'Page';
        $_SESSION['email'] = $email;
        $_SESSION['start'] = time();
        $_SESSION['expire'] = $_SESSION['start'] + (15 * 60);
        header('Location:index.php');
    } else {
        echo "<script>alert('Login failed');</script>";
        header('Location:login.php');
    }

}

?>

<div class="d-flex justify-content-center align-middle align-items-center text-center mt-5">
    <div class="card">
        <div class="card-body">
            <form class="form-signin" method="POST" action="login.php">
                <img class="mb-3" src="../pictures/login.jpg" alt="" width="72" height="72">
                <div class="text-center mb-3">
                    <i
                        class="icon-library2 icon-2x text-slate-300 border-slate-300 border-3 rounded-round p-3 mb-3 mt-1"></i>
                    <h5 class="mb-0">Login to your account</h5>
                    <span class="d-block text-muted">
                        <a href="registr.php">Sign Up</a>
                        <i class="fas fa-arrow-right me-1"></i>
                    </span>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control mb-2" placeholder="Email address" name="email" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control mb-2" placeholder="Password" name="password" required>
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit"
                onclick="return confirm('is this really your login?')"
                >Sign In</button>
            </form>
        </div>
    </div>
</div>


<?php require('footer/footer.php'); ?>