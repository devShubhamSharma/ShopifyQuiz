<?php
require_once(dirname(__FILE__, 2) . '/MySql.php');
class Test extends MySQL
{
    public $table_score = 'tbl_score';
    public $table_score_details = 'tbl_score_details';
    public $table_test = 'tbl_test';
    public function __construct()
    {
        parent::__construct();
    }
    function listAllTest()
    {
        $this->response = [];
        try {
            $this->testData = $this->Select($this->table_test, '', 'test_id', "DESC");
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

    function listTestByCode($testcode)
    {
        $testcode = base64_decode($testcode);
        $this->response = [];
        $this->is_allow = [];
        $this->is_allow_id = [];
        $this->testByUserData = [];
        try {
            $this->testScoreData = $this->Select($this->table_score, ['test_code' => $testcode]);
            $email_group = array();
            foreach ($this->testScoreData as $a) {
                $email_group[] = $a['email_id'];
            }
            $email_group = array_count_values($email_group);
            $is_allow_count = 0;
            foreach ($email_group as $key => $mail) {
               // $sql = "SELECT * FROM `tbl_score` WHERE email_id='" . $key . "' ORDER BY score_id DESC LIMIT 1";
                $sql = "SELECT * FROM `tbl_score` WHERE test_code='" . $testcode . "' AND email_id='" . $key . "' ORDER BY score_id DESC LIMIT 1";
                $resSql = $this->Execute($sql);
                $this->is_allow[$is_allow_count] = $resSql[0]['is_allow_retest'];
                $this->is_allow_id[$is_allow_count] = $resSql[0]['score_id'];
                $is_allow_count++;
            }

            $count_ss = 0;
            foreach ($email_group as $index => $val) {
                $this->testByUserData[$count_ss] = [
                    "last_test_id" => $this->is_allow_id[$count_ss],
                    'test_code' => $testcode,
                    'email_id' => $index,
                    'times' => $val,
                    'is_allow' => $this->is_allow[$count_ss]
                ];
                $count_ss++;
            }
            $this->response = [
                "status" => "success",
                "data" =>  $this->testByUserData
            ];
        } catch (Exception $e) {
            $this->response = [
                "status" => "error",
                "message" => "Error found: " . $e->getMessage(), "\n"
            ];
        }
        return $this->response;
    }

    function createTest($data)
    {

        $this->response = [];
        $this->testData = [];
        try {
            $this->res = $this->Select($this->table_test, [0 =>['test_code' => $data['test_code']], 1 =>['topic' => $data['topic']]],'','', "OR");
            if (count($this->res) > 0) {
                return $this->response = [
                    "status" => "error",
                    "message" => "Test already exist"
                ];
            }

            $this->testData = ['test_code' => $data['test_code'], 'topic' => $data['topic'], 'test_instruction' => $data['test_instruction'], 'test_time' => ($data['test_time'] != '') ? $data['test_time'] : 20, 'test_marks' => ($data['test_marks'] != '') ? $data['test_marks'] : 1, 'passcode' => ($data['passcode'] != '') ? $data['passcode'] : 'TEST'];
            $this->resTest = $this->Insert($this->table_test, $this->testData);
            $this->test_id = $this->ConnectionLastInsertId();

            if ($this->test_id) {
                $this->response = [
                    "status" => "success",
                    "message" => "Test created successfully."
                ];
            } else {
                $this->response = [
                    "status" => "error",
                    "message" => "Error when creating test."
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

    function changeStatus($data)
    {
        $this->response = [];
        $this->q_status = '';
        try {
            $this->resQuestUpdate = $this->Select(
                $this->table_test,
                ['test_id' => $data['id']]

            );
            if (count($this->resQuestUpdate) == 0) {
                return $this->response = [
                    "status" => "error",
                    "message" => "Question not found , Id:" . $data['id'] . "  ."
                ];
            }
            $this->q_status = ($this->resQuestUpdate[0]['status'] == 1) ? 0 : 1;
            $res = $this->Update($this->table_test, ['status' =>  $this->q_status], ['test_id' => $data['id']]);
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
    function changeStatusAllow($data)
    {
        $this->response = [];
        $this->q_status = '';
        try {
            $this->resQuestUpdate = $this->Select(
                $this->table_score,
                ['score_id' => $data['id']]

            );
            if (count($this->resQuestUpdate) == 0) {
                return $this->response = [
                    "status" => "error",
                    "message" => "Test record not found , Id:" . $data['id'] . "  ."
                ];
            }
            $this->q_status = ($this->resQuestUpdate[0]['is_allow_retest'] == 1) ? 0 : 1;

            // $sql = "SELECT * FROM `tbl_score` WHERE test_code='" . $testcode . "' AND email_id='" . $_SESSION['email'] . "' ORDER BY score_id DESC LIMIT 1";
            //$resSql = $this->Execute($sql);

            $res = $this->Update($this->table_score, ['is_allow_retest' =>  $this->q_status], ['score_id' => $data['id']]);
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

    function getTestorUser($data)
    {

        $this->response = [];
        try {
            $this->data = $this->Select(
                $this->table_score,
                [
                    0 => ['test_code' => $data['test_code']],
                    1 => ['email_id' => $data['email_id']]
                ],
                "created_at",
                "DESC"
            );
            $this->response = [
                "status" => "success",
                'data' => $this->data,
                "message" => "Total " . count($this->data) . " found."
            ];
        } catch (Exception $e) {
            $this->response = [
                "status" => "error",
                "message" => "Error found: " . $e->getMessage(), "\n"
            ];
        }
        return $this->response;
    }
    function listTestResponse($data)
    {
        $this->response = [];
        try {
            $this->data = $this->Select(
                $this->table_score_details,
                ['score_id' => $data['score_id']]
            );
            
            $this->data['question_response'] = unserialize(html_entity_decode($this->data[0]['question_response']));
            $this->response = [
                "status" => "success",
                'data' => $this->data,
                "message" => "Total " . count($this->data) . " found."
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
$testObj = new Test();
