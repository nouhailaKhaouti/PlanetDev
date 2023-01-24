<?php
include_once("../article/controller.php");
include_once("../category/controller.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="../asset/style.css" />
    <script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
    <title>Blog</title>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><i class="fas fa-user-secret me-2"></i>Planet Dev</div>
            <div class="list-group list-group-flush my-3">
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text active"><i class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text active"><i class="fas fa-tachometer-alt me-2"></i>Artciles</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text active"><i class="fas fa-tachometer-alt me-2"></i>Categories</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i class="fas fa-power-off me-2"></i>Logout</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->
        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
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
                            <i class="fas fa-user me-2"></i>John Doe
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="activity  mt-5 d-flex justify-content-between mb-3">
                <div class="title">
                    <i class="uil uil-document-layout-left  fs-3"></i>
                    <span class="text fs-5 fw-bold ">My Categories</span>
                </div>
                <div class="input-group ms-5 w-25">

                    <input type="search" class="form-control rounded " placeholder="Search" aria-label="Search" aria-describedby="search-addon" id="search-input"/>
                    <button type="button" class="btn btn-secondary  ms-2 rounded  border-0 primary-bg primary-text">search</button>
                </div>
                <div class="ms-auto" id="add_category">
                    <button class="button btn btn-secondary text-light mycolor rounded-pill primary-bg primary-text" type="submit" onclick="createCategory()"> Add Category</button>
                </div>
            </div>
            <div class="container-fluid px-4">
                <?php
                include_once("../category/view.php");
                ?>
            </div>
        </div>
    </div>
    <?php
    include("../category/Modal.php");
    ?>
    <!-- /#page-content-wrapper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function() {
            el.classList.toggle("toggled");
        };
    </script>
    <script src="../asset/script/category.js"></script>
    <script src="../asset/script/dynamique.js"></script>
</body>

</html>