<div class="modal-body ">
    <form action="../article/controller.php" method="POST" id="add_form" class="d-flex flex-column justify-content-between" enctype='multipart/form-data' data-parsley-validate>
        <div id="show_item">
            
            <div class="d-flex flex-column pe-5 mt-2 mb-2 bg-light ">
                <div class="ps-5 pt-3">
                    <label for="exampleInputEmail1" class="form-label">title</label>
                    <input data-parsley-trigger="keyup" required data-parsley-minlength="10" data-parsley-maxlength="30" type="text" class="form-control" id="title" name="title[]" >
                </div>
                <div class="ps-5" id="remove">
                    <label for="exampleInputEmail1" class="form-label">icon</label>
                    <input type="file" class="form-control" id="icon" name="icon[]" >
                </div>
                <div class="ps-5">
                    <label for="exampleInputEmail1" class="form-label">Content</label>
                    <textarea data-parsley-trigger="keyup"  class="form-control" id="content" name="content[]" required></textarea>
                    <script>
                        CKEDITOR.replace('content');
                    </script>
                </div>
                <div class="ps-5">
                    <label for="exampleInputEmail1" class="form-label">category</label>
                    <select class="form-select form-select-sm cart shadow-sm" name="category[]" id="category">
                        <?php
                        option();
                        ?>
                    </select>
                </div>
                </br>
                <div class="ps-5 pb-3">
                    <button class="btn btn-success add_item_btn">Add More</button>
                </div>
            </div>
            
        </div>
        <div><input type="submit" class="btn btn-primary" name="save_article" value="add" id="add_btn"></div>
    </form>

</div>