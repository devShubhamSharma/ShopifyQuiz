<?php
//session_start();
require_once(dirname(__FILE__, 2) . '/MySql.php');

class UserCRUD extends MySQL
{
    public $table_answer = 'tbl_question_answer';
    public $table_score = 'tbl_score';
    public $table_score_details = 'tbl_score_details';
    public $table_test = 'tbl_test';

    public function __construct()
    {
        parent::__construct();
    }
    public function userLogin($data)
    {
        $this->passcode = false;
        $this->response = [];
        if (!isset($data['email']) || $data['email'] == '') {
            return  $this->response = [
                "status" => "error",
                "message" => "Email can`t be blank."
            ];
        }
        $this->test_code = base64_decode($data['test_code']);
        $userData = $this->Select('tbl_test', [0 => ['test_code' => $this->test_code], 1 => ['status' => 1]]);
        if (count($userData) == 0) {
            return  $this->response = [
                "status" => "error",
                "message" => "No any test found."
            ];
        }
        if ($userData[0]['test_code'] === $this->test_code && $userData[0]['passcode'] === $data['passcode']) {
            $this->passcode = true;
        }

        if ($this->passcode) {
            $_SESSION['login'] = true;
            $_SESSION['test_code'] = $this->test_code;
            $_SESSION['email'] = $data['email'];
            // $_SESSION['user_data'] = $userData[0];

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
    function userTestSubmit($data)
    {
        include_once("../admin/Questions.php");

        $this->response = [];
        $this->allQuestion = [];
        $this->total_q = 0;
        $this->not_answered_q = 0;
        $this->answered_q = 0;
        $this->wrong_q = 0;
        $this->correct_q = 0;
        $this->obtain_mark = 0;
        try {
            foreach ($data['question_id'] as $index => $id) {
                $resQues = $questionsObj->listQuestionByID($id);
                $this->allQuestion[$index] = $resQues['data'];
                if (isset($data['answerAll']) && array_key_exists($id, $data['answerAll'])) {
                    $this->allQuestion[$index]['given_answer'] = $data['answerAll'][$id];
                }
            }
            $this->total_q = count($this->allQuestion);
            for ($i = 0; $i < $this->total_q; $i++) {
                $correct_answer = unserialize(htmlspecialchars_decode($this->allQuestion[$i]['answer_data']->answer_option));
                sort($correct_answer);
                if (array_key_exists('given_answer', $this->allQuestion[$i])) {
                    $given_ans = $data['answerAll'][$this->allQuestion[$i]['question_data']->q_id];
                    sort($given_ans);
                    if ($given_ans == $correct_answer) {
                        $this->correct_q++;
                        $this->obtain_mark += 1;
                    } else {
                        $this->wrong_q++;
                    }
                    $this->answered_q++;
                } else {
                    $this->not_answered_q++;
                }
            }

            $score = ['test_code' => $_SESSION['test_code'], 'email_id' => $_SESSION['email'], 'total_q' => $this->total_q, 'not_answered_q' => $this->not_answered_q, 'answered_q' => $this->answered_q, 'correct_q' => $this->correct_q, 'wrong_q' => $this->wrong_q, 'obtain_mark' => $this->obtain_mark];
            $this->resQuestion = $this->Insert($this->table_score, $score);
            $this->score_id = $this->ConnectionLastInsertId();
            $score_details = ['score_id' => $this->score_id, 'question_response' => serialize($this->allQuestion)];
            $this->resQuestion = $this->Insert($this->table_score_details, $score_details);
            $this->response = [
                "status" => "success",
                "message" => "Thanks, Test submitted successfully."
            ];
        } catch (Exception $e) {
            $this->response = [
                "status" => "error",
                "message" => "Error found: " . $e->getMessage(), "\n"
            ];
        }
        return $this->response;
    }
    public function listTestByTestcode($testcode)
    {
        $this->response = [];
        try {
            $this->testData = $this->Select($this->table_test, [0 => ['test_code' => $testcode], 1 => ['status' => 1]]);
            $this->response = [
                "status" => "success",
                "message" => count($this->testData) . " list fetched.",
                "data" =>   $this->testData
            ];
        } catch (Exception $e) {
            $this->response = [
                "status" => "error",
                "message" => "Error found: " . $e->getMessage(), "\n"
            ];
        }
        return $this->response;
    }

    public function checkTestByUser($testcode)
    {
        $this->response = [];
        try {
            $sql = "SELECT * FROM `tbl_score` WHERE test_code='" . $testcode . "' AND email_id='" . $_SESSION['email'] . "' ORDER BY score_id DESC LIMIT 1";
            $resSql = $this->Execute($sql);
            // $this->testData = $this->Select($this->table_test, [0 => ['test_code' => $testcode], 1 => ['status' => 1]]);
            $this->response = [
                "status" => "success",
                "data" =>  $resSql
            ];
        } catch (Exception $e) {
            $this->response = [
                "status" => "error",
                "message" => "Error found: " . $e->getMessage(), "\n"
            ];
        }
        return $this->response;
    }
}
$UserObj = new UserCRUD();
