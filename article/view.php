<div class="row my-5">
    <h3 class="fs-4 mb-3">Articles</h3>
    <div class="col border-top-secondary border-bottom-secondary table-responsive overflow-x-auto">
        <table class="table table-list rounded-3 shadow-md border-secondary table-hover">
            <thead>
                <tr>
                    <th scope="col" width="50">#</th>
                    <th scope="col">title</th>
                    <th scope="col">Category</th>
                    <th scope="col">CeatedOn</th>
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