<?php
include_once("../Admin.php");
$action=$_POST['action'];
switch ($action){
    case 'admin/login':
        $data=[
            'email'=>$_POST['email'],
            'password' => $_POST['password'],
            'user_type' => 1
        ];
        $res=$adminObj->adminLogin($data);
        echo json_encode($res);
       
}
