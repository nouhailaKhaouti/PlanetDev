<?php
//INCLUDE DATABASE FILE
include_once('model.php');
include_once('../config/db.php');
//ROUTING
if (isset($_POST['save_article']))        saveArticle();
if (isset($_POST['update_article']))      updateArticle();
if (isset($_GET['article_id']))      deleteArticle();
// if (isset($_GET['bookId']))      getOneBook();


function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// ********************************************Article**********************************************

function getAllArticles()
{
    $result = article::getAll();
    $i = 1;
    foreach ($result as $row) {

        $id = $row["id"];
        $title = $row["title"];
        $icon = $row["icon"];
        $category = $row["category"];
        $createdOn = $row["createOn"];
        $content = $row["content"];
?>
        <tr>
            <th scope="row"><?= $i ?></th>
            <td><?= $title ?></td>
            <td><?= $category ?></td>
            <td><?= $createdOn ?></td>
            <td>
                <button class="btn btn-success btn-bg btn-md m-1 rounded " onclick="editArticle(<?= $id ?>,`<?= $title ?>`,`<?= $content ?>`,`<?= $category ?>`,`<?= $icon ?>`)"><i class="bi bi-pencil"> Edit</i></button>
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
    if (isset($_POST["title"]) && isset($_POST["content"]) && isset($_POST["category"])) {
        foreach ($_POST["title"] as $key => $value) {
            $title = test_input($value);
            $content = test_input($_POST["content"][$key]);
            $category = test_input($_POST["category"][$key]);
            if (isset($_FILES['icon'][$key]['name'])) {
                print_r($_FILES);
                $image_name = $_FILES['icon'][$key]['name'];
                $tmp_name = $_FILES['icon'][$key]['tmp_name'];
                $img_ex = pathinfo($image_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
                // $allowed_exs = array("jpg", "jpeg", "png");

                // if (in_array($img_ex_lc, $allowed_exs)) {
                    $new_img_name = uniqid("Article", true) . '.' . $img_ex_lc;
                    $img_upload_path = 'asset/Articles/' . $new_img_name;
                    $upload = move_uploaded_file($tmp_name, '../' . $img_upload_path);
                    if ($upload == FALSE) {
                        $_SESSION["error"] = "Sorry ,";
                        echo "error image";
                        die();
                    }
                // } else {
                //     $_SESSION["error"] = "Sorry , you can't upload this type of files";
                //     echo "Sorry , you can't upload this type of files";
                //     die();
                // }
            } else {
                $img_upload_path = 'asset/Articles/default.jpg';
            }

            $createdOn = date('d-m-y h:i:s');

            print_r($_POST);
            // if($category==0){
            //     $new=$_POST["categoryNew"];
            //     $Category=new Category($new);
            //     $Category->create();
            //     $stmt = $bdd->query("SELECT LAST_INSERT_ID(id) from user order by LAST_INSERT_ID(id) desc limit 1;");
            //     $category = $stmt->fetchColumn();
            // }
            $Article = new Article($title, $content, $img_upload_path, $category, $createdOn, 1);
             $Article->create();
        }
    }
}



function deleteArticle()
{
    //CODE HERE
    $id = $_GET['article_id'];

    $req = Article::delete($id);

    if (!$req) {
        echo "error";
    } else {
        echo "good";
        die();
    }
}


function updateArticle()
{
    //CODE HERE
    //SQL INSERT   

    if (isset($_POST["title"]) && isset($_POST["content"]) && isset($_POST["category"])) {
        foreach ($_POST["title"] as $key => $value) {
            $id = $_POST['Article_id'][$key];
            $title = test_input($value);
            $content = test_input($_POST["content"][$key]);
            $category = test_input($_POST["category"][$key]);
            $createdOn = date('d-m-y h:i:s');
            $icon = $_POST["icon"][$key];
            if (isset($_FILES['icon']['name'][$key])) {
                $image_name = $_FILES['icon']['name'][$key];
                if ($image_name != "") {
                    $image_name = $_FILES['icon']['name'][$key];
                    $tmp_name = $_FILES['icon']['tmp_name'][$key];
                    $img_ex = pathinfo($image_name, PATHINFO_EXTENSION);
                    $img_ex_lc = strtolower($img_ex);
                    $allowed_exs = array("jpg", "jpeg", "png");

                    if (in_array($img_ex_lc, $allowed_exs)) {
                        $new_img_name = uniqid("Article", true) . '.' . $img_ex_lc;
                        $img_upload_path = 'asset/Articles/' . $new_img_name;
                        $upload = move_uploaded_file($tmp_name, '../' . $img_upload_path);
                        if ($upload == FALSE) {
                            $_SESSION["error"] = "Sorry ,";
                            echo "error image";
                            die();
                        }
                    } else {
                        $_SESSION["error"] = "Sorry , you can't upload this type of files";
                        echo "Sorry , you can't upload this type of files";
                        die();
                    }
                } else {
                    $img_upload_path = $icon;
                }
            } else {
                $img_upload_path = $icon;
            }
            $Article = new Article($title, $content, $img_upload_path, $category, $createdOn, 1);
            $Article->update($id);
        }
    }
}
