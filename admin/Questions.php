<?php
require_once(dirname(__FILE__, 2) . '/MySql.php');
class Questions extends MySQL
{
    public $table = 'tbl_questions';

    public function __construct()
    {
        parent::__construct();
    }

    public function listQuestion()
    {
        $this->response = [];
        try {
            $this->questionData = $this->Select($this->table);
            $this->response = [
                "status" => "success",
                "message" => count($this->questionData) . " list fetched.",
                "data" =>   $this->questionData
            ];
        } catch (Exception $e) {
            $this->response = [
                "status" => "error",
                "message" => "Error found: " . $e->getMessage(), "\n"
            ];
        }
        return $this->response;
    }

    public function addQuestions($data)
    {
        $this->response = [];
        try {
            $this->resQuest = $this->Select(
                $this->table,
                ['question' => $data['question']]

            );
            if (count($this->resQuest) > 0) {
                return $this->response = [
                    "status" => "error",
                    "message" => "Question already exist."
                ];
            }

            $this->questionData = ['question'  => $data['question'], 'question_type' => $data['question_type'], 'created_by' => $_SESSION['admin_data']['id'], 'updated_by' => $_SESSION['admin_data']['id']];
            $this->resQuestion = $this->Insert($this->table, $this->questionData);
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
    function changeStatus($data, $set_active_all = '', $set_deactive_all = '')
    {
        $this->response = [];
        $this->q_status = '';
        try {
            $this->resQuestUpdate = $this->Select(
                $this->table,
                ['q_id' => $data['id']]

            );
            if (count($this->resQuestUpdate) == 0) {
                return $this->response = [
                    "status" => "error",
                    "message" => "Question not found , Id:" . $data['id'] . "  ."
                ];
            }
            $this->q_status = ($this->resQuestUpdate[0]['status'] == 1) ? 0 : 1;
            $res = $this->Update($this->table, ['status' =>  $this->q_status], ['q_id' => $data['id']]);
            if ($res) {
                $this->response = [
                    "status" => "success",
                    'q_status' => $this->q_status,
                    "message" => "Status updated successfully."
                ];
            } else {
                $this->response = [
                    'q_status' => $this->q_status,
                    "status" => "error",
                    "message" => "Error when updating question."
                ];
            }
        } catch (Exception $e) {
            $this->response = [
                "status" => "error",
                "message" => "Error found: " . $e->getMessage(), "\n"
            ];
        }
        return $this->response;
    }

    function deleteQuestion($data, $delete_all = '')
    {
        $this->response = [];
        $this->q_status = '';
        try {
            $res = $this->Delete($this->table, ['q_id' => $data['id']]);
            if ($res) {
                $this->response = [
                    "status" => "success",
                    "message" => "Question deleted successfully."
                ];
            } else {
                $this->response = [
                     "status" => "error",
                    "message" => "Error when deleting question."
                ];
            }
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
