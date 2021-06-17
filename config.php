<?php
//SESIION
session_start();
setcookie(session_name(),session_id(),time()+(7*24*3600));
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
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


//POSTAL PRICD
define('MAX_PRICE', getFreePostalPrice());
$fast_post=new Shipping(1);
$normal_post=new Shipping(2);
define('FAST_POSTAL_PRICE', $fast_post->getPrice());
define('POSTAL_PRICE',$normal_post->getPrice());


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
define('ERR_REGISTER_CODE_INCORRECT', 'خطا! کد اشتباه است');
define('ERR_EMPTY_FIRST_NAME', 'خطا! نام نمی تواند خالی باشد');
define('ERR_EMPTY_LAST_NAME', 'خطا! نام خانوادگی نمی تواند خالی باشد');
define('ERR_FIRST_NAME_LEN', 'خطا! طول نام باید بین 3 تا 20 کارکتر باشد');
define('ERR_LAST_NAME_LEN', 'خطا! طول نام خانوادگی باید بین 3 تا 20 کارکتر باشد');
define('ERR_PHONE_NUMBER_LEN', 'خطا!فرمت شماره تلفن،صحیح نمی باشد');
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
define('ERR_EMAIL_EXISTS', 'خطا!این ادمین با این ایمیل قبلا در سیستم ثبت شده است');
define('ERR_PHONE_EXISTS', 'خطا! این شماره تلفن قبلا ثبت شده است');
define('ERR_CREATE_ADMIN', 'خطا! اکانت ادمین مورد نظر ساخته نشد.لطفا دوباره امتحان کنید');
define('ERR_ACCESS_DENIED', 'خطا!شما دسترسی لازم به این بخش را ندارید');
define('ERR_ADMIN_LOGIN', 'خطا! نام کاربری یا رمزعبور اشتباه است');
define('ERR_REMOVE_ADMIN', 'خطا!ادمین موردنظر حذف نشد');
define('ERR_EMAIL_EMPTY', 'خطا! فیلد ایمیل شما خالی است');
define('SUCCESS_REMOVE_USER', 'کاربر موردنظر با موفقیت حذف شد');
define('ERR_PHONE_REQUIRED', 'خطا! لطفا شماره تلفن را وارد کنید');
define('ERR_SUBCATEGORY_OR_CATEGORY_REQUIRED', 'خطا! حداقل باید یک دسته بندی یا زیردسته بندی انتخاب کنید');
define('ERR_ADD_PRODUCT', 'خطا! هنگام ثبت محصول خطایی رخ داده است');
define('WARNING_UPDATE_LAW_TXT', 'هشدار!‌متن قوانین خالی است');
define('WARNING_UPDATE_ABOUT_TXT', 'هشدار! متن درباره ما خالی است');
define('WARNING_UPDATE_TERM_TXT', 'هشدار! متن حریم شخصی خالی است');

















//SUCCESS MESSAGES
define('SUCCESS_CREATE_CATEGORY', 'دسته بندی با موفقیت ثبت شد');
define('SUCCESS_CREATE_SUB_CATEGORY', 'زیر دسته بندی با موفقیت ساخته شد');
define('SUCCESS_CREATE_ACCOUNT', 'اکانت شما با موفقیت ساخته شد');
define('SUCCES_CREATE_INIT_ACCOUNT', 'اکانت شما با موفقیت ایجاد شد');
define('SUCCESS_CREATE_PRODUCT', 'محصول مورد نظر با موفقیت ساخته شد');
define('SUCCESS_DELETE_SUB_CATEGORY', 'زیردسته بندی با موفقیت حذف شد');
define('SUCCESS_DELETE_CATEGORY', 'دسته بندی با موفقیت حذف شد');
define('SUCCESS_CREATE_ADMIN', 'اکانت ادمین مورد نظر با موفقیت ایجاد شد');
define('SUCCESS_REMOVE_ADMIN', 'ادمین موردنظر با موفقیت حذف شد');
define('SUCCESS_UPDATE_ADMIN', 'اطلاعات ادمین با موفقیت ویرایش شد');
define('SUCCESS_UPDATE_LAW_TXT', 'متن قوانین با موفقیت تغییر کرد');
define('SUCCESS_UPDATE_ABOUT_TXT', 'متن درباره ما با موفقیت تغییر کرد');
define('SUCCESS_UPDATE_TERM_TXT', 'متن حریم شخصی با موفقیت تغییر کرد');
define('SUCCESS_UPDATE_PRODUCT', 'محصول موردنظر با موفقیت ویرایش شد');
define('SUCCESS_DELETE_PRODUCT', 'محصول موردنظر با موفقیت حذف شد');
define('SUCCESS_CREATE_SUBCATEGORY', 'زیردسته بندی موردنظر با موفقیت ایجاد شد');
define('SUCCESS_DELETE_SUBCATEGORY', 'زیردسته بندی موردنظر با موفقیت حذف شد');






//include controller 
include_once public_html().PROJECT_NAME.'/http/controller.php';