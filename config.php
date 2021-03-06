<?php
//SESIION
session_start();
//set coockie to 7 days
setcookie(session_name(),session_id(),time()+(7*24*3600));

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

//domain
define('DOMAIN','http://localhost/flora/');
define('HOST_ROOT','');
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
define('ADMIN_TABLE_NAME', 'admins');
define('ADDRESS_TABLE_NAME', 'users_address');
define('ORDERS_TABLE_NAME', 'orders');
define('PAYMENT_MOTHODS_TABLE_NAME', 'payment_methods');
define('SHIPPING_TABLE_NAME', 'shippings');
define('ORDER_DETAIL_TABLE_NAME', 'order_detail');
define('SLIDER_TABLE_NAME', 'sliders');




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

//SMS PANEL SETUP
define('USERNAME_TREZ','**username**');
define('PASSWORD_TREZ','**password**');
define('FROM_PHONE_TREZ', '**public-number**');


//require classes
require_once public_html().PROJECT_NAME.'/inc/classes/MessagesClass.php';
require_once public_html().PROJECT_NAME.'/inc/classes/DbClass.php';
require_once public_html().PROJECT_NAME.'/inc/classes/UserClass.php';
require_once public_html().PROJECT_NAME.'/inc/classes/CategoryClass.php';
require_once public_html().PROJECT_NAME.'/inc/classes/SubCategoryClass.php';
require_once public_html().PROJECT_NAME.'/inc/classes/AccountClass.php';
require_once public_html().PROJECT_NAME.'/inc/classes/ProductClass.php';
require_once public_html().PROJECT_NAME.'/inc/classes/server/lib/ServerClass.php';
require_once public_html().PROJECT_NAME.'/inc/classes/AdminClass.php';
require_once public_html().PROJECT_NAME.'/inc/classes/AddressClass.php';
require_once public_html().PROJECT_NAME.'/inc/classes/OrderClass.php';
require_once public_html().PROJECT_NAME.'/inc/classes/ShippingClass.php';
require_once public_html().PROJECT_NAME.'/inc/classes/OrderDetailClass.php';
require_once public_html().PROJECT_NAME.'/inc/classes/SliderClass.php';


//POSTAL PRICE
define('MAX_PRICE', getFreePostalPrice());
$fast_post=new Shipping(1);
$normal_post=new Shipping(2);
define('FAST_POSTAL_PRICE', $fast_post->getPrice());
define('POSTAL_PRICE',$normal_post->getPrice());


//ERROR MESSAGES
define('ERR_CATEGORY_EXISTS', '?????? ???????? ???????? ???????? ???? ?????????? ?????? ?????? ??????');
define('ERR_SUB_CATEGORY_EXISTS', '?????? ?????????????? ???????? ???????? ???? ?????????? ?????? ?????? ??????');
define('ERR_SUB_CATEGORY_CREATE', '??????!?????? ???????? ???????? ?????????? ??????');
define('ERR_CATEGORY_CREATE', '??????!???????? ???????? ?????????? ??????');
define('ERR_GET_CATEGORIES_COLLECTION', '??????!???????? ???????? ???? ???????? ??????');
define('ERR_CATEGORY_DELETE', '??????!???????? ???????? ?????? ??????');
define('ERR_CREATE_ACCOUNT', '?????????? ???? ?????????? ???????? ???????? ???????????? ?????? ???? ???????? ??????.???????? ???????????? ???????????? ????????');
define('ERR_PHONE_NUMBER_EMPTY', '??????!?????????? ???????? ???? ???????? ????????');
define('ERR_PHONE_NUMBER_FORMAT', '??????!???????? ?????????? ???????? ???????? ?????? ???????????? ??????');
define('ERR_REGISTER_CODE_INCORRECT', '??????! ???? ???????????? ??????');
define('ERR_EMPTY_FIRST_NAME', '??????! ?????? ?????? ?????????? ???????? ????????');
define('ERR_EMPTY_LAST_NAME', '??????! ?????? ???????????????? ?????? ?????????? ???????? ????????');
define('ERR_FIRST_NAME_LEN', '??????! ?????? ?????? ???????? ?????? 3 ???? 20 ???????????? ????????');
define('ERR_LAST_NAME_LEN', '??????! ?????? ?????? ???????????????? ???????? ?????? 3 ???? 20 ???????????? ????????');
define('ERR_PHONE_NUMBER_LEN', '??????!???????? ?????????? ?????????????????? ?????? ????????');
define('ERR_CREATE_INIT_ACCOUNT', '??????!?????????? ?????? ?????????? ??????');
define('ERR_PHONE_NUMBER_ALREADY_EXISTS', '??????!?????? ?????????? ???????? ???????? ???? ?????????? ?????? ?????? ??????');
define('ERR_GET_SUB_CATEGORIES_COLLECTION', '??????!?????????????? ???????? ???? ???????? ??????');
define('ERR_PRODUCT_EXISTS', '?????? ?????????? ???????? ???? ?????????? ?????? ?????? ??????');
define('ERR_PRODUCT_CREATE', '??????!?????????? ?????????? ??????');
define('ERR_PRODUCT_COLLECTION', '??????!???????????? ???????? ??????');
define('ERR_PRODUCT_EMPTY_TITLE', '??????!?????? ?????????? ???????? ??????');
define('ERR_PRODUCT_EMPTY_PRICE', '??????!???????? ?????????? ???????? ??????');
define('ERR_PRODUCT_PRICE_FORMAT', '??????!???????? ???????? ???????? ?????? ???????? ?????? ????????');
define('ERR_PRODUCT_EMPTY_INSTOCK', '??????!???????????? ?????????? ???????? ??????');
define('ERR_PRODUCT_INSTOCK_FORMAT', '??????!???????? ???????????? ???????? ?????? ???????????? ??????');
define('ERR_UNSUPPORT_IMAGE_FORMAT', '??????!???????? ?????????????? ???? ???????? jpg ???? png ???????? ????????');
define('ERR_FAILED_UPLOAD', '??????!???????? ?????????? ??????');
define('ERR_SUB_CATEGORY_DELETE', '??????!?????????????? ???????? ?????? ??????');
define('ERR_EMAIL_EXISTS', '??????!?????? ?????????? ???? ?????? ?????????? ???????? ???? ?????????? ?????? ?????? ??????');
define('ERR_PHONE_EXISTS', '??????! ?????? ?????????? ???????? ???????? ?????? ?????? ??????');
define('ERR_CREATE_ADMIN', '??????! ?????????? ?????????? ???????? ?????? ?????????? ??????.???????? ???????????? ???????????? ????????');
define('ERR_ACCESS_DENIED', '??????!?????? ???????????? ???????? ???? ?????? ?????? ???? ????????????');
define('ERR_ADMIN_LOGIN', '??????! ?????? ???????????? ???? ?????????????? ???????????? ??????');
define('ERR_REMOVE_ADMIN', '??????!?????????? ?????????????? ?????? ??????');
define('ERR_EMAIL_EMPTY', '??????! ???????? ?????????? ?????? ???????? ??????');
define('SUCCESS_REMOVE_USER', '?????????? ?????????????? ???? ???????????? ?????? ????');
define('ERR_PHONE_REQUIRED', '??????! ???????? ?????????? ???????? ???? ???????? ????????');
define('ERR_SUBCATEGORY_OR_CATEGORY_REQUIRED', '??????! ?????????? ???????? ???? ???????? ???????? ???? ?????????????? ???????? ???????????? ????????');
define('ERR_ADD_PRODUCT', '??????! ?????????? ?????? ?????????? ?????????? ???? ???????? ??????');
define('WARNING_UPDATE_LAW_TXT', '??????????!????????? ???????????? ???????? ??????');
define('WARNING_UPDATE_ABOUT_TXT', '??????????! ?????? ???????????? ???? ???????? ??????');
define('WARNING_UPDATE_TERM_TXT', '??????????! ?????? ???????? ???????? ???????? ??????');
define('ERR_DATE_OR_TIME_EMPTY', '??????! ???????? ?????????? ?? ???????? ???????????? ?????????? ???? ???????????? ????????');
define('ERR_GEOJSON_FORMAT', '??????! ???????? ???? ???????? geojson ???????? ????????????');
define('ERR_DATA_UPDATED', '??????! ?????????????? ?????? ???????????? ??????');
define('ERR_PAYMENT_EMPTY', '??????! ???????? ?????? ???????????? ???? ???????????? ????????');
define('ERR_SHIPPING_EMPTY', '??????!??????????? ???? ?????? ?????????? ???????????? ????????');
define('ERR_ADDRESS_EMPTY', '??????! ???????? ???? ???????? ???????????? ????????');
define('ERR_ADDRESS_UPDATED', '??????! ???????? ???????????? ??????');
define('ERR_POSTAL_CODE_EMPTY', '??????! ???? ???????? ???? ???????? ????????');
define('ERR_ADDRESS_NAME_EMPTY', '??????! ???????? ???????? ???? ???????? ????????');
define('ERR_TITLE_EMPTY', '??????! ???????? ???? ?????????? ???????? ????????');
define('ERR_CREATE_ADDRESS', '??????! ???????? ?????????? ??????');



//SUCCESS MESSAGES
define('SUCCESS_CREATE_CATEGORY', '???????? ???????? ???? ???????????? ?????? ????');
define('SUCCESS_CREATE_SUB_CATEGORY', '?????? ???????? ???????? ???? ???????????? ?????????? ????');
define('SUCCESS_CREATE_ACCOUNT', '?????????? ?????? ???? ???????????? ?????????? ????');
define('SUCCES_CREATE_INIT_ACCOUNT', '?????????? ?????? ???? ???????????? ?????????? ????');
define('SUCCESS_CREATE_PRODUCT', '?????????? ???????? ?????? ???? ???????????? ?????????? ????');
define('SUCCESS_DELETE_SUB_CATEGORY', '?????????????? ???????? ???? ???????????? ?????? ????');
define('SUCCESS_DELETE_CATEGORY', '???????? ???????? ???? ???????????? ?????? ????');
define('SUCCESS_CREATE_ADMIN', '?????????? ?????????? ???????? ?????? ???? ???????????? ?????????? ????');
define('SUCCESS_REMOVE_ADMIN', '?????????? ?????????????? ???? ???????????? ?????? ????');
define('SUCCESS_UPDATE_ADMIN', '?????????????? ?????????? ???? ???????????? ???????????? ????');
define('SUCCESS_UPDATE_LAW_TXT', '?????? ???????????? ???? ???????????? ?????????? ??????');
define('SUCCESS_UPDATE_ABOUT_TXT', '?????? ???????????? ???? ???? ???????????? ?????????? ??????');
define('SUCCESS_UPDATE_TERM_TXT', '?????? ???????? ???????? ???? ???????????? ?????????? ??????');
define('SUCCESS_UPDATE_PRODUCT', '?????????? ?????????????? ???? ???????????? ???????????? ????');
define('SUCCESS_DELETE_PRODUCT', '?????????? ?????????????? ???? ???????????? ?????? ????');
define('SUCCESS_CREATE_SUBCATEGORY', '?????????????? ???????? ?????????????? ???? ???????????? ?????????? ????');
define('SUCCESS_DELETE_SUBCATEGORY', '?????????????? ???????? ?????????????? ???? ???????????? ?????? ????');
define('SUCCESS_UPLOAD_GEOJSON', '???????? geojson ???? ???????????? ?????????? ????');
define('SUCCESS_DATA_UPDATED', '?????????????? ?????? ???? ???????????? ???????????? ????');
define('SUCCESS_ADDRESS_UPDATED', '???????? ?????? ???? ???????????? ???????????? ????');
define('SUCCESS_CREATE_ADDRESS', '???????? ?????? ???? ???????????? ?????????? ????');
define('SUCCESS_DELETE_ADDRESS', '???????? ?????? ???? ???????????? ?????? ????');



//include controller 
include_once public_html().PROJECT_NAME.'/http/controller.php';