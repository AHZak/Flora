<?php
//DEFINE

//domain
define('DOMAIN','http://localhost/flora/');
define('HOST_ROOT','/home/aabotsir/public_html/');
define('PROJECT_NAME', 'flora');



//my public_html function here
function public_html(){
    
    //count directory of current path
    $countSlashes=substr_count($_SERVER['PHP_SELF'],'/')-1;
    $backStr="";

    //make ../ to back before directories

    while($countSlashes>0){
        $backStr.="../";
        $countSlashes--;
    }

    global $root;
    if(isset($root) && $root==true){
        return HOST_ROOT;
    }else{
        return $backStr;
    }
    
}

//DATABASE SETUP
define('DB_USERNAME', 'root');
define('DB_SERVER', 'localhost');
define('DB_PASSWORD', '');
define('DB_NAME', PROJECT_NAME);

//TABELS
define('CATEGORY_TABLE_NAME', 'categories');
define('SUB_CATEGORY_TABLE_NAME', 'sub_categories');
define('USER_TABLE_NAME', 'users');





//include functions
include_once(public_html().PROJECT_NAME.'/inc/functions.php');

//require classes
require_once public_html().PROJECT_NAME.'/inc/classes/MessagesClass.php';
require_once public_html().PROJECT_NAME.'/inc/classes/DbClass.php';
require_once public_html().PROJECT_NAME.'/inc/classes/UserClass.php';
require_once public_html().PROJECT_NAME.'/inc/classes/CategoryClass.php';
require_once public_html().PROJECT_NAME.'/inc/classes/SubCategoryClass.php';

//ERROR MESSAGES
define('ERR_CATEGORY_EXISTS', 'این دسته بندی قبلا در سیستم ثبت شده است');
define('ERR_SUB_CATEGORY_EXISTS', 'این زیردسته بندی قبلا در سیستم ثبت شده است');
define('ERR_SUB_CATEGORY_CREATE', 'خطا!زیر دسته بندی ساخته نشد');
define('ERR_CATEGORY_CREATE', 'خطا!دسته بندی ساخته نشد');




//SUCCESS MESSAGES
define('SUCCESS_CREATE_CATEGORY', 'دسته بندی با موفقیت ثبت شد');
define('SUCCESS_CREATE_SUB_CATEGORY', 'زیر دسته بندی با موفقیت ساخته شد');


