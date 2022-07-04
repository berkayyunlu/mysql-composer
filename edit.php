<?php
include 'datamodel.php';

/*$listInf =$conn-> prepare("SELECT * from user where id=:user_id");
$listInf -> execute(array('user_id' =>$_GET['id']));

$checkInf=$listInf->fetchAll(\PDO::FETCH_ASSOC);*/

//echo $_GET['user'];
//echo $_REQUEST['user'];

if (!isset($_GET['id'])) {
    echo "User id is required";
}
//$user = selectGetAllTable($db, 'user');
//$userInf = selectGetAllTable($db, 'user_info');
$db->where("id", $_GET['id']);
$user = $db->getOne("user");
$userInf = $db->getOne("user_info")

//printArray($user);
?>

<h1>Database PDO Registration Procedures </h1>
<form action="datamodel.php" method="POST">

    <input type="text" name="full_name" value="<?php echo $user['full_name'] ?>" required>
    <input type="email" name="email" value="<?php echo $userInf['email'] ?>" required>
    <input type="text" name="age" value="<?php echo $user['age'] ?>" required>
    <input type="text" name="address" value="<?php echo $userInf['address'] ?>" required>
    <input type="text" name="phone" value="<?php echo $userInf['phone'] ?>" required>
    <input type="hidden" name="id" value="<?php echo $user['id'] ?>" required>
    <input type="hidden" name="user_type_id" value="<?php echo $user['user_type_id'] ?>" required>
    <button type="submit" name="update">Send</button>


</form>

<form action="index.php">

    <button type="submit" name="return">Return</button>

</form>