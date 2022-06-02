<?php
require_once(dirname(__FILE__,2) . '/MySql.php');
class UserCRUD extends MySQL{
   
   public static function test(){
        echo "hello";
    }
}
$UserObj =new UserCRUD();