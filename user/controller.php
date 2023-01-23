<?php
include 'model.php'; 

$info = User::getById();

if (isset($_POST['save_User']))        saveUser();
if (isset($_POST['update_User']))      updateUser();

if(isset($_POST['login']))        logIn();
function logIn(){
    $email = $_POST['email'];
    $password = $_POST['password'];
     User::login($email,$password);
}


function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// ********************************************User**********************************************
function saveUser()
{
    //CODE HERE

    //SQL INSERT   
    if (isset($_POST["userName"]) && isset($_POST["fullName"]) && isset($_POST["email"]) && isset($_POST["password"])) {
        $userName = test_input($_POST["userName"]);
        $fullName = test_input($_POST["fullName"]);
        $email = test_input($_POST["email"]);
        $password = password_hash(test_input($_POST["password"]), PASSWORD_BCRYPT);
        print_r($_POST);
        $user = new user($userName, $fullName, $email, $password,1);

        $req = $user->createUser();

        if ($req) {
            echo "great";
            header("Location:index.php");
            die();
        } else {
            echo "error accured";
            die();
        }
    }
}



function updateUser()
{
    //CODE HERE
    //SQL INSERT   
    $id = $_POST['User_id'];
    if (isset($_POST["userName"]) && isset($_POST["fullName"]) && isset($_POST["email"]) && isset($_POST["password"])) {
        $userName = test_input($_POST["userName"]);
        $fullName = test_input($_POST["fullName"]);
        $email = test_input($_POST["email"]);
        $password = password_hash(test_input($_POST["password"]), PASSWORD_BCRYPT);
        
        print_r($_POST);
        $user = new User($userName, $fullName, $email, $password,0);
        $req = $user->updateUser($id);
        if ($req) {
            echo "great";
            die();
        } else {
            echo "error accured";
            die();
        }
    }
}


