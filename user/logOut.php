<?php
include_once ('../config/db.php');

session_destroy();
unset($_SESSION['id']);
echo $_SESSION['id'];
header("location:../public/index.php");