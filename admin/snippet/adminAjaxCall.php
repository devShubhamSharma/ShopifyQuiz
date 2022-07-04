<?php
session_start();
$action = $_POST['action'];
switch ($action) {
    case 'admin/login':
        include_once("../Admin.php");
        $data = [
            'email' => $_POST['email'],
            'password' => $_POST['password'],
            'user_type' => 1
        ];
        $res = $adminObj->adminLogin($data);
        echo json_encode($res);
        break;
    case 'admin/add-questions':
        include_once("../Questions.php");
        $_POST['user_type'] = 1;
        $resaddQ = $questionsObj->addQuestions($_POST);
        echo json_encode($resaddQ);
        break;
    case 'admin/list-question':
        include_once("../Questions.php");
        $_POST['user_type'] = 1;
        $resList = $questionsObj->listQuestion();
        echo json_encode($resList);
        break;
    case 'admin/change-status-question':
        include_once("../Questions.php");
        $_POST['user_type'] = 1;
        $resList = $questionsObj->changeStatus($_POST);
        echo json_encode($resList);
        break;
    case 'admin/delete-question':
        include_once("../Questions.php");
        $_POST['user_type'] = 1;
        $resList = $questionsObj->deleteQuestion($_POST);
        echo json_encode($resList);
        break;
}
