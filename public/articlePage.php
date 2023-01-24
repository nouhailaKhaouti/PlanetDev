<?php
include_once("../includes/header.php");

?>
            <div class="activity  mt-5 d-flex justify-content-between mb-3 mx-3">
                <div class="title">
                    <i class="uil uil-document-layout-left  fs-3"></i>
                    <span class="text fs-5 fw-bold ">My Articles</span>
                </div>
                <div class="input-group ms-5 w-25">

                    <input type="search" class="form-control rounded " placeholder="Search" aria-label="Search" aria-describedby="search-addon" id="search-input" />
                    <button type="button" class="btn ms-2 rounded  border-0 primary-bg primary-text">search</button>
                </div>
                <div class="ms-auto" id="add_category">
                    <button class="btn mycolor rounded-pill primary-bg primary-text"><i class="uil uil-plus text-white"></i> <a class="text-decoration-none text-white" href="article.php">&emsp; Create an Article</a></button>
                </div>
            </div>
            <div class="container-fluid px-5">
                <?php
                include_once("../article/view.php");
                ?>
            </div>
        </div>
    </div>
    <?php
    include("../article/Modal.php");
    include("../article/ModalView.php");
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
    <script src="../asset/script/article.js"></script>
    <script src="../asset/script/dynamique.js"></script>
</body>

</html>