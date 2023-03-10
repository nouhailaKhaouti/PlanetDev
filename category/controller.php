<?php
//INCLUDE DATABASE FILE
include_once 'model.php';

//ROUTING
if (isset($_POST['save_Category']))        saveCategory();
if (isset($_POST['update_Category']))      updateCategory();
if (isset($_GET['category_id']))      deleteCategory();

// ********************************************Category**********************************************
function getAllCategories()
{
    $result = Category::getAll();
    $i = 1;
    foreach ($result as $row) {

        $id = $row["id"];
        $label = $row["label"];
?>
        <tr>
            <th scope="row"><?= $i ?></th>
            <td><?= $label ?></td>
            <td>
                <button class="btn btn-primary btn-bg btn-md m-1 rounded " onclick="editCategory(<?= $id ?>,`<?= $label ?>`)"><i class="bi bi-pencil"> Edit</i></button>
                <button class="btn btn-primary btn-bg btn-md m-1 rounded" onclick="deleteCat(`<?= $id ?>`)"><i class="bi bi-trash"> Remove</i></button>
            </td>
        </tr>
    <?php
        $i++;
    }
}

function option()
{
    $result = Category::getAll();
    foreach ($result as $row) {
    ?>
        <option value="<?= $row["id"] ?>"><?= $row["label"] ?></option>
<?php

    }
}

function saveCategory()
{
    //CODE HERE
    echo "hi";
    //SQL INSERT   
    if (isset($_POST["label"])) {
        $label = $_POST["label"];

        print_r($_POST);
        $Category = new Category($label);

        $req = $Category->create();


        if (!$req) {
            $_SESSION["error"]="error accured while creating this category";
            header("location: ../public/categoryPage.php");
            
        } else {
            $_SESSION["success"]="this category has been created successfuly";
            header("location: ../public/categoryPage.php");
            die();
        }
    }
}


function deleteCategory()
{
    //CODE HERE
    $id = $_GET['category_id'];

    $req = Category::delete($id);

    if (!$req) {
        $_SESSION["error"]="error accured while deleting this category";
        header("location:../public/categoryPage.php");
        
    } else {
        $_SESSION["success"]="this category has been deleted successfuly";
        header("location:../public/categoryPage.php");
        die();
    }
}


function updateCategory()
{
    //CODE HERE
    //SQL INSERT   
    $id = $_POST['category_id'];
    if (isset($_POST["label"])) {
        $label = $_POST["label"];
        $Category = new Category($label);
        $req = $Category->update($id);
        print_r($req);
        if ($req) {
            $_SESSION["success"]="this category has been updated successfuly";
            header("location:../public/categoryPage.php");
            die();
        } else {
            $_SESSION["error"]="error accured while updating this category";
            header("location:../public/categoryPage.php");
            die();
        }
    }
}
