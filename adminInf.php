<?php

include 'db.php';
session_start();

if (isset($_POST['adminlogin'])) {
    $admin_mail = $_POST['email'];
    $admin_password = md5($_POST['user_password']);
}
$error = "username/password incorrect";


//$logins = $db->getValue("user_info", "email", 2);
//echo $logins;
//die();
// select login from users
//$logins = $db->getValue("user_info", "user_password", 2);
// select login from users limit 5
//foreach ($logins as $login)
//    echo $login;
//die();
$passMD5 = md5($_POST['user_password']);

$db->where("email", $_POST['email'])->where("user_password", $passMD5);
$userloginInf = $db->getOne("user_info");



//$db->where("user_password", $_POST['user_password']);
//$userpassword = $db->getOne("user_info");
//echo $user['user_password'];
//die();

if (isset($userloginInf)) {

    $db->where("id", $userloginInf["user_id"]);
    $haveAdmin = $db->getOne("user");
    if ($haveAdmin['user_type_id'] == 1) {
        header('location:index.php');
    } else {
        header('location:userIndex.php');
    }
} else {

    $_SESSION["error"] = $error;
    header('location:loginAdmin.php'); ?>

  


<?php }


//$db->where("user_type_id",);
//$haveAdmin = $db->getOne("user");
//echo $haveAdmin['user_type_id'];
//die();



//echo $say = $login::rowCount();