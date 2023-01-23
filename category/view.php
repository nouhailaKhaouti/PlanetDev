<div class="row my-5">
    <h3 class="fs-4 mb-3">Category</h3>
    <div class="col">
        <table class="table bg-white rounded shadow-sm  table-hover">
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