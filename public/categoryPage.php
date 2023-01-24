<?php
include_once("../includes/header.php");

?>
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