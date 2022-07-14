<?php
require_once(dirname(__FILE__, 2) . '/MySql.php');
class Test extends MySQL
{
    public $table_score = 'tbl_score';
    public $table_score_details = 'tbl_score_details';
    public function __construct()
    {
        parent::__construct();
    }
    function listAllTest()
    {
        $this->response = [];
        try {
            $sql = "SELECT *, COUNT(*) as count FROM `tbl_score` GROUP BY `email_id` ORDER BY `created_at` DESC";
            $res = $this->Execute($sql);
           
            $this->questionData = $this->Select($this->table_score);
            $this->response = [
                "status" => "success",
                "message" => count( $res) . " list fetched.",
                "data" =>   $res
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
