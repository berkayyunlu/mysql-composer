<?php

require_once 'vendor/autoload.php';



$db = new MysqliDb('kubernetes.docker.internal', 'sail', 'password', 'test_db');



$db->join("user_info ui", "u.id=ui.user_id", "INNER")->join('user_type ut', 'ut.id =u.user_type_id', 'INNER');
$users = $db->get("user u", null);
//print_r($users);

//$db->join("user_type ut", "ut.id=u.user_type_id", "INNER");
//$users = $db->get("user u", null);



//print_r($users);
//die();
