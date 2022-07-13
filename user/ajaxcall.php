<?php

$action=$_POST['action'];
switch ($action){
    case 'user/login':
        include_once("../user/UserCRUD.php");
        $data=['email'=>$_POST['email'], "passcode"=>$_POST['passcode'], "user_type" => 2];
        $res=$UserObj->userLogin($data);
        echo json_encode($res);
        break;
    case 'user/test-submit':

        include_once("../admin/Questions.php");
        $res=$questionsObj->userTestSubmit($_POST);
        echo json_encode($res);
       
}
