<?php
session_start();
$action = $_POST['action'];
switch ($action) {
    case 'user/login':
        include_once("../user/UserCRUD.php");
        $data = ['email' => $_POST['email'], "passcode" => $_POST['passcode'], 'testcode' => $_POST['passcode'], "user_type" => 2];
        $res = $UserObj->userLogin($_POST);
        echo json_encode($res);
        break;
    case 'user/test-submit':
        include_once("../user/UserCRUD.php");
        $res = $UserObj->userTestSubmit($_POST);
        echo json_encode($res);
}
