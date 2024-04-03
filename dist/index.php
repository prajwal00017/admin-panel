<?php require('header/header.php'); ?>



<?php

session_start();
require('conn.php');


if (!isset($_SESSION['admin'])) {
    header('Location:login.php');
} else {
    $now = time();

    if ($now > $_SESSION['expire']) {
        session_destroy();
        header('location:404.php');
    } else {
        ?>


        <body class="sb-nav-fixed">
            <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
                <!-- Navbar Brand-->
                <a class="navbar-brand ps-3" href="index.php">Welcome
                    <?= $_SESSION['admin']; ?>
                </a>
                <!-- Sidebar Toggle-->
                <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                        class="fas fa-bars"></i></button>
                <!-- Navbar Search-->
                <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                    <div class="input-group">
                        <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..."
                            aria-describedby="btnNavbarSearch" />
                        <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i
                                class="fas fa-search"></i></button>
                    </div>
                </form>
                <!-- Navbar-->
                <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#!">Sozlamalar</a></li>
                            <li><a class="dropdown-item" href="#!">Faolligi</a></li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li><a onclick="return confirm('Do you really want to go out?');" class="dropdown-item"
                                    href="logout.php">Chiqish</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <div id="layoutSidenav">
                <div id="layoutSidenav_nav">
                    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                        <div class="sb-sidenav-menu">
                            <div class="nav">
                                <div class="sb-sidenav-menu-heading">Core</div>
                                <a class="nav-link" href="index.php">
                                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                    Dashboard
                                </a>
                                <div class="sb-sidenav-menu-heading">Interface</div>
                                <a class="nav-link collapsed" href="form.php">
                                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                    Ma'lumot qo'shish
                                </a>
                                <a class="nav-link collapsed" href="page.php">
                                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                    Post qo'shish
                                </a>
                                <div class="sb-sidenav-menu-heading">Addons</div>
                                <a class="nav-link" href="post.php">
                                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                    Postlar
                                </a>
                                <a class="nav-link" href="tables.php">
                                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                    Tables
                                </a>
                            </div>
                        </div>
                    </nav>
                </div>
                <div id="layoutSidenav_content">
                    <main>
                        <div class="container-fluid px-4">
                            <h1 class="mt-4">Dashboard</h1>
                            <ol class="breadcrumb mb-4">
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                            <div class="row">
                                <div class="col-xl-3 col-md-6">
                                    <div class="card bg-primary text-white mb-4">
                                        <div class="card-body">Primary Card</div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <a class="small text-white stretched-link" href="#">View Details</a>
                                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6">
                                    <div class="card bg-warning text-white mb-4">
                                        <div class="card-body">Warning Card</div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <a class="small text-white stretched-link" href="#">View Details</a>
                                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6">
                                    <div class="card bg-success text-white mb-4">
                                        <div class="card-body">Success Card</div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <a class="small text-white stretched-link" href="#">View Details</a>
                                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6">
                                    <div class="card bg-danger text-white mb-4">
                                        <div class="card-body">Danger Card</div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <a class="small text-white stretched-link" href="#">View Details</a>
                                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            <i class="fas fa-chart-area me-1"></i>
                                            Area Chart Example
                                        </div>
                                        <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            <i class="fas fa-chart-bar me-1"></i>
                                            Bar Chart Example
                                        </div>
                                        <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-table me-1"></i>
                                    Ma'lumotlar jadvali
                                </div>
                                <div class="card-body">
                                    <table id="datatablesSimple">

                                   <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Name</th>
                                                <th>last_name</th>
                                                <th>email</th>
                                                <th>Age</th>
                                                <th>Start date</th>
                                                <th>password</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>last_name</th>
                                            <th>email</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>password</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>

                                            <!-- fetch data from database -->
                                            <?php

                                            $sql = "SELECT * FROM tb_employees";
                                            $query = mysqli_query($con, $sql);
                                            while ($row = mysqli_fetch_assoc($query)) { ?>

                                                <tr>
                                                    <td><?= $row['id']; ?></td>
                                                    <td><?= $row['name']; ?></td>
                                                    <td><?= $row['last_name']; ?></td>
                                                    <td><?= $row['email']; ?></td>
                                                    <td><?= $row['age']; ?></td>
                                                    <td><?= $row['start_date']; ?></td>
                                                    <td><?= $row['password']; ?>
                                                    <a href="edit.php?editid=<?= $row['id']; ?>" class="btn btn-success rounded-circle">edit</a>
                                                    <a href="delete.php?delid=<?= $row['id']; ?>" class="btn btn-danger rounded-circle" onclick="return confirm('Do you want to delete really?');">delete</a>
                                                </td>
                                                    
                                                </tr>

                                            <?php } ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </main>

                    <?php require('footer/footer.php'); ?>

                    <?php

    }

}


?>