<?php
//session_start();
require_once(dirname(__FILE__, 2) . '/MySql.php');
class UserCRUD extends MySQL
{
    public $table_answer = 'tbl_question_answer';
    public $table_score = 'tbl_score';
    public $table_score_details = 'tbl_score_details';

    public function __construct()
    {
        parent::__construct();
    }
    public function userLogin($data)
    {
        $this->passcode = false;
        $this->response = [];
        if(!isset($data['email']) || $data['email']=='' ){
            return  $this->response = [
                "status" => "error",
                "message" => "Email can`t be blank."
            ];
        }
        //$userData = $this->Select('tbl_user_master', ['email_id' => $data['email']]);
        $userConfig = $this->Select('tbl_config');
        foreach ($userConfig as $key => $val) {
            if ($val['config_key'] === 'PASSCODE' && $val['config_value'] === $data['passcode']) {
                $this->passcode = true;
            }
        }
        if ( $this->passcode) {
            $_SESSION['login'] = true;
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

            $score = ['email_id' => $_SESSION['email'], 'total_q' => $this->total_q, 'not_answered_q' => $this->not_answered_q, 'answered_q' => $this->answered_q, 'correct_q' => $this->correct_q, 'wrong_q' => $this->wrong_q, 'obtain_mark' => $this->obtain_mark];
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
}
$UserObj = new UserCRUD();
