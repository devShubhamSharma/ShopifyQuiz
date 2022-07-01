<?php
require_once(dirname(__FILE__, 2) . '/MySql.php');
class Questions extends MySQL
{
    public function __construct()
    {
        parent::__construct();
    }

    public function listQuestion()
    {
        $this->response = [];
        $this->questionData = $this->Select("tbl_questions");
        echo "<pre>";
        print_r($this->questionData);
        echo "</pre>";
    }

    public function addQuestions($data)
    {
        $this->response = [];
        try {
            $this->resQuest = $this->Select(
                'tbl_questions',
                ['question' => $data['question']]

            );
            if (count($this->resQuest) > 0) {
                return $this->response = [
                    "status" => "error",
                    "message" => "Question already exist."
                ];
            }

            $this->questionData = ['question'  => $data['question'], 'question_type' => $data['question_type'], 'created_by' => $_SESSION['admin_data']['id'], 'updated_by' => $_SESSION['admin_data']['id']];
            $this->resQuestion = $this->Insert('tbl_questions', $this->questionData);
            $this->question_id = $this->ConnectionLastInsertId();

            $this->questionOptionData = ['q_id' => $this->question_id, 'q_option' => json_encode($data['options']), 'created_by' => $_SESSION['admin_data']['id'], 'updated_by' => $_SESSION['admin_data']['id']];
            $this->resOptions = $this->Insert('tbl_question_options', $this->questionOptionData);
            $this->options_id = $this->ConnectionLastInsertId();

            $this->questionOptionAnswerData = ['q_id' => $this->question_id, 'answer_option' =>  json_encode($data['options_answer']), 'created_by' => $_SESSION['admin_data']['id'], 'updated_by' => $_SESSION['admin_data']['id']];
            $this->resAnswer = $this->Insert('tbl_question_answer', $this->questionOptionAnswerData);
            $this->answer_id = $this->ConnectionLastInsertId();
            $this->response = [
                "status" => "success",
                "message" => "Question added successfully."
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
$questionsObj = new Questions();
