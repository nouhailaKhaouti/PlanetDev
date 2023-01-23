<div class="row my-5">
    <h3 class="fs-4 mb-3">Articles</h3>
    <div class="col">
        <table class="table bg-white rounded shadow-sm  table-hover">
            <thead>
                <tr>
                    <th scope="col" width="50">#</th>
                    <th scope="col">title</th>
                    <th scope="col">Category</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                getAllArticles();
                ?>
            </tbody>
        </table>
    </div>
</div>