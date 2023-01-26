      <?php include_once "../includes/header.php";
        ?>
      <div class="container-fluid px-4">
          <div class="row g-3 my-2 ">
              <div class="col-lg-4">
                  <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded-pill">
                      <div>
                          <h3 class="fs-2 primary-text "><?= $maxCategory["label"] ?> </h3>
                          <p class="pb-md-2" style="font-size:small">Most used category <span class="primary-text"><?= $maxCategory["nbr"] ?></span> </p>
                      </div>
                      <i class="bi-bookmarks-fill fs-1 primary-text border rounded-full secondary-bg  px-3 p-2"></i>
                  </div>
              </div>

              <div class="col-lg-4">
                  <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded-pill">
                      <div>
                          <h3 class="fs-2 primary-text"><?= $nbrArt ?></h3>
                          <p class="fs-5">Articles</p>
                      </div>
                      <i class="bi-postcard-fill fs-1 primary-text border rounded-full secondary-bg  px-3 p-2"></i>
                  </div>
              </div>

              <div class="col-lg-4">
                  <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded-pill">
                      <div>
                          <h3 class="fs-2 primary-text"><?= $count ?></h3>
                          <p class="fs-5">Users</p>
                      </div>
                      <i class="bi-person-heart fs-1 primary-text border rounded-full secondary-bg px-3 p-2"></i>
                  </div>
              </div>
          </div>
          <div class="activity  mt-5 d-flex justify-content-between mb-3">
              <div class="title d-none d-md-block">
                  <span class="text fs-5 fw-bold ">My Articles</span>
              </div>
              <div class="input-group d-flex justify-content-between ms-5 w-25">
                  <div>
                      <button type="button" class="d-block d-md-none btn btn-secondary ms-2 rounded border-0 primary-bg " onclick="search()">search</button>
                  </div>
                  <div id="search" class="d-none d-md-flex p-2">
                      <input type="search" class="form-control input-md w-auto rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" id="recherche" onkeyup="filtrer()" />
                  </div>
              </div>
              <div class="ms-auto">
                  <button class="btn btn-secondary text-light mycolor rounded-pill primary-bg "> <a class="text-decoration-none text-white" href="article.php"><i class="bi bi-patch-plus text-white"></i>&emsp; Create an Article</a></button>
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
      <?php include_once "../includes/footer.php";
        ?>