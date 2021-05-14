<?php
//SESIION
session_start();

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
define('PRODUCT_TABLE_NAME', 'products');
define('CATEGORY_PRODUCT_TABLE_NAME', 'category_product');
define('SUB_CATEGORY_PRODUCT_TABLE_NAME', 'subcategory_product');

//ACCESS FILE TYPES
define('ACCESS_IMAGES_MIME_TYPE',['image/jpeg','image/png']);

//UPLOAD PATH
define('UPLOAD_PATH', 'upload/images/');


//VARIABELS
define('PHONE_NUMBER_LEN', 11);


//require libs
require_once public_html().PROJECT_NAME.'/inc/libs/jdf.php';

//include functions
include_once(public_html().PROJECT_NAME.'/inc/functions.php');

//require classes
require_once public_html().PROJECT_NAME.'/inc/classes/MessagesClass.php';
require_once public_html().PROJECT_NAME.'/inc/classes/DbClass.php';
require_once public_html().PROJECT_NAME.'/inc/classes/UserClass.php';
require_once public_html().PROJECT_NAME.'/inc/classes/CategoryClass.php';
require_once public_html().PROJECT_NAME.'/inc/classes/SubCategoryClass.php';
require_once public_html().PROJECT_NAME.'/inc/classes/AccountClass.php';
require_once public_html().PROJECT_NAME.'/inc/classes/ProductClass.php';



//ERROR MESSAGES
define('ERR_CATEGORY_EXISTS', 'این دسته بندی قبلا در سیستم ثبت شده است');
define('ERR_SUB_CATEGORY_EXISTS', 'این زیردسته بندی قبلا در سیستم ثبت شده است');
define('ERR_SUB_CATEGORY_CREATE', 'خطا!زیر دسته بندی ساخته نشد');
define('ERR_CATEGORY_CREATE', 'خطا!دسته بندی ساخته نشد');
define('ERR_GET_CATEGORIES_COLLECTION', 'خطا!دسته بندی ای پیدا نشد');
define('ERR_CATEGORY_DELETE', 'خطا!دسته بندی حذف نشد');
define('ERR_CREATE_ACCOUNT', 'خطایی در هنگام ساخت حساب کاربری شما رخ داده است.لطفا دوباره امتحان کنید');
define('ERR_PHONE_NUMBER_EMPTY', 'حطا!شماره تلفن را وارد کنید');
define('ERR_PHONE_NUMBER_FORMAT', 'خطا!فرمت شماره تلفن وارد شده اشتباه است');
define('ERR_PHONE_NUMBER_LEN', 'خطا!تعداد اعداد وارد شده شماره تلفن،صحیح نمی باشد');
define('ERR_CREATE_INIT_ACCOUNT', 'خطا!اکانت شما ساخته نشد');
define('ERR_PHONE_NUMBER_ALREADY_EXISTS', 'خطا!این شماره تلفن قبلا در سیستم ثبت شده است');
define('ERR_GET_SUB_CATEGORIES_COLLECTION', 'خطا!زیردسته بندی ای پیدا نشد');
define('ERR_PRODUCT_EXISTS', 'این محصول قبلا در سیستم ثبت شده است');
define('ERR_PRODUCT_CREATE', 'خطا!محصول اضافه نشد');
define('ERR_PRODUCT_COLLECTION', 'خطا!محصولی یافت نشد');
define('ERR_PRODUCT_EMPTY_TITLE', 'خطا!نام محصول خالی است');
define('ERR_PRODUCT_EMPTY_PRICE', 'خطا!قیمت محصول خالی است');
define('ERR_PRODUCT_PRICE_FORMAT', 'خطا!فرمت قیمت وارد شده صحیح نمی باشد');
define('ERR_PRODUCT_EMPTY_INSTOCK', 'خطا!موجودی محصول خالی است');
define('ERR_PRODUCT_INSTOCK_FORMAT', 'خطا!فرمت موجودی وارد شده اشتباه است');
define('ERR_UNSUPPORT_IMAGE_FORMAT', 'خطا!لطفا تصاویری با فرمت jpg یا png وارد کنید');
define('ERR_FAILED_UPLOAD', 'خطا!فایل آپلود نشد');
define('ERR_SUB_CATEGORY_DELETE', 'خطا!زیردسته بندی حذف نشد');





//SUCCESS MESSAGES
define('SUCCESS_CREATE_CATEGORY', 'دسته بندی با موفقیت ثبت شد');
define('SUCCESS_CREATE_SUB_CATEGORY', 'زیر دسته بندی با موفقیت ساخته شد');
define('SUCCESS_CREATE_ACCOUNT', 'اکانت شما با موفقیت ساخته شد');
define('SUCCES_CREATE_INIT_ACCOUNT', 'اکانت شما با موفقیت ایجاد شد');
define('SUCCESS_CREATE_PRODUCT', 'محصول مورد نظر با موفقیت ساخته شد');
define('SUCCESS_DELETE_SUB_CATEGORY', 'زیردسته بندی با موفقیت حذف شد');
define('SUCCESS_DELETE_CATEGORY', 'دسته بندی با موفقیت حذف شد');



//include controller 
include_once public_html().PROJECT_NAME.'/http/controller.php';