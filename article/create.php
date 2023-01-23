<div class="modal-body ">
    <form action="../article/controller.php" method="POST" id="add_form" class="d-flex flex-column justify-content-between" enctype='multipart/form-data'>
        <div class="d-flex flex-column pe-5  bg-light " id="show_item">
            <div class="ps-5 pt-3" >
                <label for="exampleInputEmail1" class="form-label">title</label>
                <input type="text" class="form-control" id="title" name="title[]">
            </div>
            <div class="ps-5" id="remove">
                <label for="exampleInputEmail1" class="form-label">icon</label>
                <input type="file" class="form-control" id="icon" name="icon[]">
            </div>
            <div class="ps-5">
                <label for="exampleInputEmail1" class="form-label">Content</label>
                <textarea class="form-control" id="content[]" name="content[]"></textarea>
                <script>
                    CKEDITOR.replace('content[]');
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
            <div class="ps-5 pb-3">
                <button class="btn btn-success add_item_btn">Add More</button>
            </div>
        </div>
        <div ><input type="submit" class="btn btn-primary" name="save_article" value="add" id="add_btn"></div>
    </form>

</div>