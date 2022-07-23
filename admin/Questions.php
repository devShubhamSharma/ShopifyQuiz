<?php
require_once(dirname(__FILE__, 2) . '/MySql.php');
class Questions extends MySQL
{
    public $table = 'tbl_questions';
    public $table_options = 'tbl_question_options';
    public $table_answer = 'tbl_question_answer';
    public $table_score = 'tbl_score';
    public $table_score_details = 'tbl_score_details';

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

    public function listQuestionByID($id)
    {
        $this->response = [];
        try {
            $this->questionData = $this->Select($this->table, ['q_id' => $id]);
            $this->questionOptnData = $this->Select($this->table_options, ['q_id' => $id]);
            $this->questionAsnwerData = $this->Select($this->table_answer, ['q_id' => $id]);
            if (count($this->questionData) == 0) {
                return $this->response = [
                    "status" => "success",
                    "message" => count($this->questionData) . " list fetched.",
                    "data" =>   []
                ];
            }
            $this->response = [
                "status" => "success",
                "message" => count($this->questionData) . " list fetched.",
                "data" =>   ['question_data' => (object)$this->questionData[0], 'option_data' => (object)$this->questionOptnData[0], 'answer_data' => (object)$this->questionAsnwerData[0]]
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
            $this->questionOptionData = ['q_id' => $this->question_id, 'q_option' => serialize($data['options']), 'created_by' => $_SESSION['admin_data']['id'], 'updated_by' => $_SESSION['admin_data']['id']];
            $this->resOptions = $this->Insert('tbl_question_options', $this->questionOptionData);
            $this->options_id = $this->ConnectionLastInsertId();

            $this->questionOptionAnswerData = ['q_id' => $this->question_id, 'answer_option' =>  serialize($data['options_answer']), 'created_by' => $_SESSION['admin_data']['id'], 'updated_by' => $_SESSION['admin_data']['id']];
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
    function changeStatus($data)
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

    function changeStatusAll($data)
    {
        $this->response = [];
        $this->q_status = ($data['update_type'] == 'set-active') ? 1 : 0;
        if (count($data['id']) == 0) {
            return 0;
        }
        try {
            for ($i = 0; $i < count($data['id']); $i++) {
                $this->resQuestUpdate = $this->Select(
                    $this->table,
                    ['q_id' => $data['id'][$i]]
                );
                if (count($this->resQuestUpdate) == 0) {
                    return $this->response = [
                        "status" => "error",
                        "message" => "Question not found , Id:" . $data['id'][$i] . "  ."
                    ];
                }
                $res = $this->Update($this->table, ['status' =>  $this->q_status], ['q_id' => $data['id'][$i]]);
            }
            if ($res) {
                $this->response = [
                    "status" => "success",
                    "message" => "Status updated successfully."
                ];
            } else {
                $this->response = [
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
            $this->Delete($this->table_answer, ['q_id' => $data['id']]);
            $this->Delete($this->table_options, ['q_id' => $data['id']]);
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
    function  updateQuestion($data)
    {
        $this->question_id = ($_POST['question_id'] > 0) ? $_POST['question_id'] : 0;
        $this->option_id = ($_POST['option_id'] > 0) ? $_POST['option_id'] : 0;
        $this->answer_id = ($_POST['answer_id'] > 0) ? $_POST['answer_id'] : 0;
        $this->question = ($_POST['question'] != '') ? $_POST['question'] : '';
        $this->question_type = ($_POST['question_type'] > 0) ? $_POST['question_type'] : 0;
        $this->options_answer = ($_POST['options_answer']) ? $_POST['options_answer'] : '';
        $this->options = ($_POST['options'] > 0) ? $_POST['options'] : [];
        $this->user_type = ($_POST['user_type']) ? $_POST['user_type'] : 1;
        $this->response = [];
        try {
            $this->resQuest = $this->Select(
                $this->table,
                ['q_id' => $this->question_id]

            );
            if (count($this->resQuest) == 0) {
                return $this->response = [
                    "status" => "error",
                    "message" => "Question not found."
                ];
            }
            $this->resQuestTitle = $this->Select(
                $this->table,
                [0 => ['q_id !' =>  $this->question_id], 1 => ['question' => $this->question]]
            );
            if (count($this->resQuestTitle) > 0) {
                return $this->response = [
                    "status" => "error",
                    "message" => "Question already exist."
                ];
            }

            $this->questionData = ['question'  => $this->question, 'question_type' => $this->question_type, 'updated_by' => $_SESSION['admin_data']['id']];
            $res = $this->Update($this->table, $this->questionData, ['q_id' => $this->question_id]);

            $this->questionOptionData = ['q_option' => serialize($this->options), 'updated_by' => $_SESSION['admin_data']['id']];
            $resUpdateOptions = $this->Update($this->table_options, $this->questionOptionData, [0 => ['q_id' => $this->question_id], 1 => ['options_id' => $this->option_id]]);

            $this->questionOptionAnswerData = ['answer_option' =>  serialize($this->options_answer), 'updated_by' => $_SESSION['admin_data']['id']];
            $resUpdateAnswer = $this->Update($this->table_answer, $this->questionOptionAnswerData, [0 => ['q_id' => $this->question_id], 1 => ['qa_id' => $this->answer_id]]);

            $this->response = [
                "status" => "success",
                "message" => "Question updated successfully."
            ];
        } catch (Exception $e) {
            $this->response = [
                "status" => "error",
                "message" => "Error found: " . $e->getMessage(), "\n"
            ];
        }
        return $this->response;
    }

    /**
     * for list test
     */
    public function listQuestionForTest()
    {
        $this->response = [];
        $questionData = [];
        try {
            $this->questionData = $this->Select($this->table, ['status' => 1]);
            foreach ($this->questionData as $key => $val) {
                $questionData[$key]['questionData'] = (object)$this->questionData[$key];

                $this->questionOptnData = $this->Select($this->table_options, ['q_id' => $val['q_id']]);
                $questionData[$key]['optionData'] =  (object)$this->questionOptnData[0];
            }
            shuffle($questionData);
            $this->response = [
                "status" => "success",
                "data" => $questionData
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
