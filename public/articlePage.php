<?php
include_once("../includes/header.php");

?>
            <div class="activity  mt-5 d-flex justify-content-between mb-3 mx-3">
                <div class="title d-none d-md-block">
                    <i class="uil uil-document-layout-left  fs-3"></i>
                    <span class="text fs-5 fw-bold ">My Articles</span>
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
                    <button class="btn mycolor rounded-pill primary-bg primary-text"><a class="text-decoration-none text-white" href="article.php"><i class="bi bi-patch-plus text-white"></i>&emsp; Create an Article</a></button>
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
    <?php include_once "../includes/footer.php" ;
      ?>