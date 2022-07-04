<?php

include 'db.php';
function dd($string)
{
    echo "<pre>";
    print_r($string);
    echo "</pre>";
    die();
}




if (isset($_POST['insert'])) {
    $userdata = array(
        "full_name" => $_POST['full_name'],
        "age" => $_POST['age'],
        "user_type_id" => $_POST['user_type_id']

    );

    $id = $db->insert('user', $userdata);

    $userInfdata = array(
        'user_id' => $id,
        'email' => $_POST['email'],
        'phone' => $_POST['phone'],
        'address' => $_POST['address']
    );
    $ida = $db->insert('user_info', $userInfdata);
    if ($ida)
        Header("Location:index.php");
    else
        echo 'insert failed: ' . $db->getLastError();
}


if (isset($_POST['update'])) {
    $userData = array(
        "full_name" => $_POST['full_name'],
        "age" => $_POST['age'],
    );
    $db->where('id', $_POST['id']);

    $idInf = $db->update('user', $userData);

    $userInfData = array(
        'email' => $_POST['email'],
        'phone' => $_POST['phone'],
        'address' => $_POST['address'],


    );
    $db->where('user_id', $_POST['id']);

    $ida = $db->update('user_info', $userInfData);

    if ($ida)
        header("Location:index.php");
    else
        echo 'update failed: ' . $db->getLastError();
}

if (isset($_GET['deleteinf']) && $_GET['deleteinf'] == "ok") {


    //$userId = $_GET['id'] ?? dd("not found user id");
    $userId = $_GET['id'];

    $db->where('user_id', $userId);
    $deleteUserInf = $db->delete('user_info');
    $db->where('id', $userId);
    $deleteUser = $db->delete('user');

    if ($deleteUser && $deleteUserInf) {
        Header("Location:index.php");
    }
}
