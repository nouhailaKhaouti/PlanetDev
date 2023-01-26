<?php
//INCLUDE DATABASE FILE
include_once('model.php');
include_once('../config/db.php');
include_once '../includes/trim.php';
//ROUTING
if (isset($_POST['save_article']))        saveArticle();
if (isset($_POST['update_article']))      updateArticle();
if (isset($_GET['article_id']))      deleteArticle();
// if (isset($_GET['bookId']))      getOneBook();

$maxCategory = Article::nbreArticleByMaxCat();
$nbrArt = Article::nbreArticle();

// ********************************************Article**********************************************

function getArticles()
{
    $result = article::getAll();
    foreach ($result as $row) {
        $id = $row["id"];
        $title = $row["title"];
        $icon = $row["icon"];
        $category = $row["label"];
        $category_id = $row["category"];
        $createdOn = $row["createOn"];
?> <a href="articleView.php?id=<?= $id ?>" class="text-decoration-none" name="table">
            <div class="card mt-5 shadow-lg ms-3" data-label="   <?= $category ?>">
                <input type="hidden" class="categoryType" value="<?= $category_id ?>">
                <div class="card-container text-white" style="background: url('../<?= $icon ?>') no-repeat; background-size:cover">
                    <br>
                    <br>
                    <br>
                    <br>
                    <h5><?= $title ?></h5>
                    <p><?= $createdOn ?></p>
                </div>
            </div>
        </a>
    <?php

    }
}


function getAllArticles()
{
    $result = article::getAll();
    $i = 1;
    foreach ($result as $row) {

        $id = $row["id"];
        $title = $row["title"];
        $icon = $row["icon"];
        $category = $row["label"];
        $category_id = $row["category"];
        $createdOn = $row["createOn"];
        $content = $row["content"];
    ?>
        <tr name="table">
            <th scope="row"><?= $i ?></th>
            <td><?= $title ?></td>
            <td><?= $category ?></td>
            <td><?= $createdOn ?></td>
            <td>
                <input type="hidden" class="categoryType" value="<?= $category_id ?>">
                <button class="btn btn-success btn-bg btn-md m-1 rounded " onclick="editArticle(<?= $id ?>,`<?= $title ?>`,`<?= $content ?>`,`<?= $category_id ?>`,`<?= $icon ?>`)"><i class="bi bi-pencil"> Edit</i></button>
                <button class="btn btn-primary btn-bg btn-md m-1 rounded" onclick="viewArticle(`<?= $title  ?>`,`<?= $content ?>`,`<?= $icon ?>`,`<?= $createdOn ?>`)"><i class="bi bi-eye"> View</i></button>
                <button class="btn btn-danger btn-bg btn-md m-1 rounded" onclick="deleteArticle(<?= $id ?>)"><i class="bi bi-trash"> Remove</i></button>
            </td>
        </tr>
<?php
        $i++;
    }
}


function saveArticle()
{
    //CODE HERE
    print_r($_POST);
    //SQL INSERT   
    if (!empty($_POST["title"]) && !empty($_POST["content"]) && !empty($_POST["category"])) {
        foreach ($_POST["title"] as $key => $value) {
            $title = test_input($value);
            $content = test_input($_POST["content"][$key]);
            $category = test_input($_POST["category"][$key]);
            if (isset($_FILES['icon']['name'][$key])) {
                print_r($_FILES);
                $image_name = $_FILES['icon']['name'][$key];
                $tmp_name = $_FILES['icon']['tmp_name'][$key];
                $img_ex = pathinfo($image_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
                // $allowed_exs = array("jpg", "jpeg", "png");

                // if (in_array($img_ex_lc, $allowed_exs)) {
                $new_img_name = uniqid("Article", true) . '.' . $img_ex_lc;
                $img_upload_path = 'asset/Articles/' . $new_img_name;
                $upload = move_uploaded_file($tmp_name, '../' . $img_upload_path);
                if ($upload == FALSE) {
                    $_SESSION["error"] = "error accured while adding this article";
                    header("location:../public/article.php");
                    die();
                }
                // } else {
                //     $_SESSION["error"] = "Sorry , you can't upload this type of files";
                //     echo "Sorry , you can't upload this type of files";
                //     die();
                // }
            } else {
                $img_upload_path = 'asset/Articles/default.jfif';
            }

            $createdOn = date('d-m-y h:i:s');
            print_r($_POST);
            $Article = new Article($title, $content, $img_upload_path, $category, $createdOn, 1);
            $req = $Article->create();
            if (!$req) {
                $_SESSION["error"] = "error accured while adding this article";
                header("location:../public/article.php");
            }
        }
        header("location:../public/article.php");
    }
}


function deleteArticle()
{
    //CODE HERE
    $id = $_GET['article_id'];

    $req = Article::delete($id);
    if (!$req) {

        $_SESSION["error"] = "error accured while deleting this article";
        header("location:../public/articlePage.php");
    } else {

        $_SESSION["success"] = "this category has been deleted successfuly";
        header("location:../public/articlePage.php");
        die();
    }
}


function updateArticle()
{
    print_r($_POST);
    $id = $_POST['article_id'];
    $title = test_input($_POST["title"]);
    $content = test_input($_POST["content"]);
    $category = test_input($_POST["category"]);
    $createdOn = date('d-m-y h:i:s');
    $icon = $_POST["img"];
    if (isset($_FILES['icon']['name'])) {
        $image_name = $_FILES['icon']['name'];
        if ($image_name != "") {
            $image_name = $_FILES['icon']['name'];
            $tmp_name = $_FILES['icon']['tmp_name'];
            $img_ex = pathinfo($image_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);
            $allowed_exs = array("jpg", "jpeg", "png");

            if (in_array($img_ex_lc, $allowed_exs)) {
                $new_img_name = uniqid("Article", true) . '.' . $img_ex_lc;
                $img_upload_path = 'asset/Articles/' . $new_img_name;
                $upload = move_uploaded_file($tmp_name, '../' . $img_upload_path);
                if ($upload == FALSE) {
                    $_SESSION["error"] = "Sorry ,";
                    header("location:../public/articlePage.php");
                    die();
                }
            } else {
                $_SESSION["error"] = "Sorry , you can't upload this type of files";
                header("location:../public/articlePage.php");
                die();
            }
        } else {
            $img_upload_path = $icon;
        }
    } else {
        $img_upload_path = $icon;
    }
    $Article = new Article($title, $content, $img_upload_path, $category, $createdOn, 1);
    $req = $Article->update($id);
    if (!$req) {
        // $_SESSION["error"] = "error accured while updating this article";
        // header("location:../public/articlePage.php");
        echo "error";
    } else {
        $_SESSION["success"] = "this category has been updated successfuly";
        header("location:../public/articlePage.php");
        echo "hi";
        // die();
    }
}
