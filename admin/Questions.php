<?php
require_once(dirname(__FILE__, 2) . '/MySql.php');
class Questions extends MySQL
{
    public function __construct()
    {
        parent::__construct();
    }

    public function addQuestions($data)
    {
        echo"<pre>";print_r($data);echo"</pre>"; 
        echo 'ss ' .$this->ConnectionLastInsertId();die("done");
        $this->password = false;
        $this->response = [];
        $adminData = $this->Select(
            'tbl_user_master',
            [
                0 => ['email_id' => $data['email']],
                1 => ['user_type' => 1]
            ]
        );
        if (count($adminData) > 0 && password_verify($data['password'], $adminData[0]['password'])) {
            $_SESSION['login'] = true;
            $_SESSION['email'] = $data['email'];
            $_SESSION['admin_data'] = $adminData[0];

            $this->response = [
                "status" => "success",
                "message" => "Login Successfully."
            ];
        } else {
            $this->response = [
                "status" => "error",
                "message" => "Email id or password not matched."
            ];
        }
        return $this->response;
    }
}
$questionsObj = new Questions();
