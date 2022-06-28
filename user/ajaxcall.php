<?php
include_once("../user/UserCRUD.php");
$action=$_POST['action'];
switch ($action){
    case 'user/login':
        $data=['email'=>$_POST['email'], "passcode"=>$_POST['passcode'], "user_type" => 2];
        $res=$UserObj->userLogin($data);
        echo json_encode($res);
       
}
