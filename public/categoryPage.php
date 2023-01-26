<?php
include_once("../includes/header.php");

?>
            <div class="activity  mt-5 d-flex justify-content-between mb-3">
                <div class="title d-none d-md-block">
                    <i class="uil uil-document-layout-left  fs-3"></i>
                    <span class="text fs-5 fw-bold ">My Categories</span>
                </div>
                <div class="input-group d-flex justify-content-between ms-5 w-25">
                  <div>
                      <button type="button" class="d-block d-md-none btn btn-secondary ms-2 rounded border-0 primary-bg " onclick="search()">search</button>
                  </div>
                  <div id="search" class="d-none d-md-flex p-2">
                  <input type="search" class="form-control input-md w-auto rounded " placeholder="Search" aria-label="Search" aria-describedby="search-addon" id="search-input"/>
                  </div>
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
    <?php include_once "../includes/footer.php" ;
      ?>