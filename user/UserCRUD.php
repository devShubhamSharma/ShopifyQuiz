<?php
session_start();
require_once(dirname(__FILE__, 2) . '/MySql.php');
class UserCRUD extends MySQL
{

    public function __construct()
    {
        parent::__construct();
    }
    public function userLogin($data)
    {
        $this->passcode = false;
        $this->response = [];
        $userData = $this->Select('tbl_user_master', ['email_id' => $data['email']]);
        $userConfig = $this->Select('tbl_config');
        foreach ($userConfig as $key => $val) {
            if ($val['config_key'] === 'PASSCODE' && $val['config_value'] === $data['passcode']) {
                $this->passcode = true;
            }
        }
        if (count($userData) > 0 && $this->passcode && $data["user_type"] == $userData[0]['user_type']) {
            $_SESSION['login'] = true;
            $_SESSION['email'] = $data['email'];
            $_SESSION['user_data'] = $userData[0];

            $this->response = [
                "status" => "success",
                "message" => "Login Successfully."
            ];
        } else {
            $this->response = [
                "status" => "error",
                "message" => "Email id or passcode not matched."
            ];
        }
        return $this->response;
    }
}
$UserObj = new UserCRUD();
