<div class="row my-5">
    <h3 class="fs-4 mb-3">Category</h3>
    <div class="col table-responsive overflow-x-auto">
        <table class="table table-list rounded-3 shadow-md border-secondary table-hover">
            <thead>
                <tr>
                    <th scope="col" width="50">#</th>
                    <th scope="col">name</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                getAllCategories();
                ?>
            </tbody>
        </table>
    </div>
</div>