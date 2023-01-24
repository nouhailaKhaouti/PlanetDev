      <?php include_once "../includes/header.php"  ?>
            <div class="container-fluid px-4">
                <div class="row g-3 my-2 ">
                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">720</h3>
                                <p class="fs-5">Products</p>
                            </div>
                            <i class="fas fa-gift fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">4920</h3>
                                <p class="fs-5">Sales</p>
                            </div>
                            <i class="fas fa-hand-holding-usd fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">3899</h3>
                                <p class="fs-5">Delivery</p>
                            </div>
                            <i class="fas fa-truck fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded-3">
                            <div>
                                <h3 class="fs-2">%25</h3>
                                <p class="fs-5">Increase</p>
                            </div>
                            <i class="fas fa-chart-line fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>
                </div>
                <div class="activity  mt-5 d-flex justify-content-between mb-3">
                    <div class="title">
                        <i class="uil uil-document-layout-left  fs-3"></i>
                        <span class="text fs-5 fw-bold ">My Articles</span>
                    </div>
                    <div class="input-group ms-5 w-25">

                        <input type="search" class="form-control rounded " placeholder="Search" aria-label="Search" aria-describedby="search-addon" id="recherche" onkeyup="filtrer()" />
                        <button type="button" class="btn btn-secondary  ms-2 rounded  border-0 primary-bg ">search</button>
                    </div>
                    <div class="ms-auto">
                        <button class="btn btn-secondary text-light mycolor rounded-pill primary-bg "><i class="uil uil-plus text-white"></i> <a class="text-decoration-none text-white" href="article.php">&emsp; Create an Article</a></button>
                    </div>
                </div>
                <div class="mx-5 col-4 mt-ms-3">
                    <div id="search_w_type" class="ms-3 ms-sm-0">
                        <select class="form-select form-select-sm ms-5 cart shadow-sm secondary-bg primary-text " onclick="filtrerType()" name="type" id="type">
                            <?php
                            option();
                            ?>
                        </select>
                    </div>
                    <br>
                    <br>
                </div>
                <div class="d-flex justify-content-around flex-wrap">
                    <?php
                     getArticles();
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function() {
            el.classList.toggle("toggled");
        };

        CKEDITOR.replace('content[]');
    </script>
    <script src="../asset/script/article.js"></script>
    <script src="../asset/script/category.js"></script>
    <script src="../asset/script/user.js"></script>

</body>

</html>