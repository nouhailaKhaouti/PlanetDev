<?php
require_once("../config/db.php");
include_once("../user/controller.php");
include_once("../article/controller.php");
include_once("../category/controller.php");
if(!$_SESSION['id']){
    header("location:logIn.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/guillaumepotier/Parsley.js@2.9.2/doc/assets/docs.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/guillaumepotier/Parsley.js@2.9.2/src/parsley.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="../asset/style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <!-- BEGIN parsley css-->

    <!-- END parsley css-->
    <title>Blog</title>
</head>

<body>
    <div class="d-flex flex-row " id="wrapper">
        <!-- Sidebar -->
        <div class="secondary-bg " id="sidebar-wrapper">
            <div class="sidebar-heading  text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"> <img src="../asset/planet.png" width="30" height="30"> Planet Dev</div>
            <div class="list-group list-group-flush my-3">
                <a href="index.php" class="list-group-item list-group-item-action bg-transparent text-dark active"><i class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                <a href="articlePage.php" class="list-group-item list-group-item-action bg-transparent text-dark active"><i class="bi bi-postcard-fill me-2"></i>Artciles</a>
                <a href="categoryPage.php" class="list-group-item list-group-item-action bg-transparent text-dark active"><i class="bi bi-bookmark-fill me-2"></i>Categories</a>
                <a href="../user/logOut.php" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i class="fas fa-power-off me-2"></i>Logout</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper" class="d-flex flex-column ml-auto ">
            <nav class="navbar navbar-expand-lg navbar-light py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Dashboard</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item ">
                            <i class="fas fa-user me-2"></i><?=$_SESSION['name']?>
                        </li>
                    </ul>
                </div>
            </nav>
            <?php if (isset($_SESSION['success'])) : ?>
        <div class=" mx-2 alert alert-info alert-dismissible fade show">
            <!-- <strong>Success!</strong> -->
            <?php
            echo $_SESSION['success'];
            unset($_SESSION['success']);
            ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></span>
        </div>
    <?php endif ?>
    <?php if (isset($_SESSION['error'])) : ?>
        <div class=" mx-2 alert alert-danger alert-dismissible fade show">
            <?php
            echo $_SESSION['error'];
            unset($_SESSION['error']);
            ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></span>
        </div>
    <?php endif ?>
