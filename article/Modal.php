<div class="modal fade bd-example-modal-lg shadow-sm" id="ModalArticle" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title" id="ModalLabel">Update Article</h4>
      </div>
      <div class="modal-body ">
        <form action="../article/controller.php" method="POST" id="third" class="d-flex flex-column justify-content-between pe-5" enctype='multipart/form-data'>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">title</label>
            <input type="text" class="form-control" id="title" name="title">
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Content</label>
            <textarea class="form-control" id="content" name="content"></textarea>
            <script>
              CKEDITOR.replace('content');
            </script>
          </div>
          <div class="mb-3" id="remove">
            <label for="exampleInputEmail1" class="form-label">icon</label>
            <input type="file" class="form-control" id="icon" name="icon">
          </div>
          <div id="hidden"></div>
          <div id="hidden_img"></div>
          <div id="img" class="text-center"></div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">category</label>
            <select class="form-select form-select-sm cart shadow-sm" name="category" id="category">
              <?php
              option();
              ?>
            </select>
          </div>
          <div id="patient"><button type="submit" class="btn btn-primary" name="update_article">Submit</button></div>
        </form>
      </div>
    </div>
  </div>
</div>