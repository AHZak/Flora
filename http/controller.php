<?php
use Database\Db;

//DO LOGOUT
if(isset($_GET['logout']) && $_GET['logout']==true){
    $account=new Account();
    $account->logout();
    session_destroy();
    
}

if(isset($pageUi)){

    //PAGES CONTROLLER
    if($pageUi=='addCategory'){
        //ADD CATEGORY

        /* check is admin/owner auth */
        if(isAdmin() || isMaster()){

            //remove a category
            if(isset($_GET['rm_cat'])){

                $category=new Category($_GET['rm_cat']);
                $category->delete();

                /*delete sub categories after removing parent category*/
                $category->deleteSubCategories();
                $_SESSION['successMessage']=SUCCESS_DELETE_CATEGORY;

                //redirect to current page
                redirectTo($_SERVER['PHP_SELF']);
    
            }elseif(isset($_GET['rm_sub'])){
                //remove a sub category
                $subCategory=new SubCategory($_GET['rm_sub']);
                $subCategory->delete();

                //set a success message after remove sub category
                $_SESSION['successMessage']=SUCCESS_DELETE_SUBCATEGORY;

                //redirect to current page
                redirectTo($_SERVER['PHP_SELF']);
                
            }elseif(isset($_POST['addCategory'])){
                //add a new category

                //check inputs
                $catName=isset($_POST['name']) ? $_POST['name'] : "";
                $catType=isset($_POST['catType']) ? $_POST['catType'] : ""; //parent or sub category
                
                if($catType!=""){
                    if($catType=='parent'){
                        //add a category
                        Category::create(['name'=>$catName,'creator_id'=>1],$message);
                        
                        //set a success message
                        $_SESSION['successMessage']=SUCCESS_CREATE_CATEGORY;

                        //redirect to current page
                        redirectTo($_SERVER['PHP_SELF']);
                    }else{
                        //add sub category
                        SubCategory::create(['name'=>$catName,'creator_id'=>1,'category_id'=>$catType]);

                        //set a success message
                        $_SESSION['successMessage']=SUCCESS_CREATE_SUBCATEGORY;

                        //redirect to current page
                        redirectTo($_SERVER['PHP_SELF']);
                    }
                }
            }
            
            //get all categories and sub categories
            $categories=Category::getCategories();
        }
    }elseif($pageUi=='addProduct'){ //ADD PRODUCT PAGE

        //check admin/owner auth
        if(isAdmin() || isMaster()){

            
            if(isset($_POST['addProduct'])){

                //add product actions

                //check inputs
                $title=isset($_POST['title']) ? $_POST['title'] : null;
                $price=isset($_POST['price']) ? $_POST['price'] : null;
                $description=isset($_POST['description']) ? $_POST['description'] : null;
                $image=isset($_FILES['img']) ? $_FILES['img'] : null;
                $image_alt=isset($_POST['image_alt']) ? $_POST['image_alt'] : null;
                $instock=isset($_POST['instock']) ? $_POST['instock'] : null;
                $category=isset($_POST['categoryId']) ? $_POST['categoryId'] : null;

                //CREATE PRODUCT WITH CATEGORY
                if(strpos($category,"mcat_")!==false){

                    //product creator id
                    $creator_id=$_SESSION['userId'];
                    //create a product
                    $product_id=Product::create(['title'=>$title,'price'=>$price,'description'=>$description,'image'=>$image,'image_alt'=>$image_alt,'instock'=>$instock,'creator_id'=>$creator_id],$message);

                    //ADD PRODUCT MESSAGES
                    //MESSAGE HANDLERS
                    if(!$product_id){
                        $_SESSION['errorMessage'][]=$message->showError(ERR_PRODUCT_CREATE);
                        $_SESSION['errorMessage'][]=$message->showError(ERR_UNSUPPORT_IMAGE_FORMAT);
                        $_SESSION['errorMessage'][]=$message->showError(ERR_PRODUCT_EXISTS);
                        $_SESSION['errorMessage'][]=$message->showError(ERR_PRODUCT_EMPTY_TITLE);
                        $_SESSION['errorMessage'][]=$message->showError(ERR_PRODUCT_EMPTY_PRICE);
                        $_SESSION['errorMessage'][]=$message->showError(ERR_PRODUCT_PRICE_FORMAT);
                        $_SESSION['errorMessage'][]=$message->showError(ERR_PRODUCT_EMPTY_INSTOCK);    
                        redirectTo($_SERVER['PHP_SELF']);
                    }else{
                        $_SESSION['successMessage']=$message->showSuccess(SUCCESS_CREATE_PRODUCT);
                    }

                    //export category id in string
                    sscanf($category,"mcat_%d",$categoryId);

                    //add to category_product table ***** Database relation between category & product *****
                    if($product_id && $categoryId){
                        $categoryObj=new Category($categoryId);
                        $result=Db::insert(CATEGORY_PRODUCT_TABLE_NAME,['product_id'=>$product_id,'category_id'=>$categoryId]);
                    }else{
                        //set error message
                        $_SESSION['errorMessage']=ERR_ADD_PRODUCT;
                        //reload current page
                        redirectTo($_SERVER['PHP_SELF']);
                    }

                }
                //CREATE PRODUCT WITH SUB CATEGORY
                elseif(strpos($category,"subcat_")!==false){

                    //creator id
                    $creator_id=$_SESSION['userId'];

                    //create a product
                    $product_id=Product::create(['title'=>$title,'price'=>$price,'description'=>$description,'image'=>$image,'image_alt'=>$image_alt,'instock'=>$instock,'creator_id'=>$creator_id],$message);
                    //ADD PRODUCT MESSAGES
                    //MESSAGE HANDLERS
                    if(!$product_id){
                        $_SESSION['errorMessage'][]=$message->showError(ERR_PRODUCT_CREATE);
                        $_SESSION['errorMessage'][]=$message->showError(ERR_PRODUCT_EXISTS);
                        $_SESSION['errorMessage'][]=$message->showError(ERR_PRODUCT_EMPTY_TITLE);
                        $_SESSION['errorMessage'][]=$message->showError(ERR_PRODUCT_EMPTY_PRICE);
                        $_SESSION['errorMessage'][]=$message->showError(ERR_PRODUCT_PRICE_FORMAT);
                        $_SESSION['errorMessage'][]=$message->showError(ERR_PRODUCT_EMPTY_INSTOCK);    
                        redirectTo($_SERVER['PHP_SELF']);
                    }else{
                        $_SESSION['successMessage']=$message->showSuccess(SUCCESS_CREATE_PRODUCT);
                    }

                    //export sub category id in string
                    sscanf($category,"subcat_%d",$subCategoryId);

                    //add to subcategory_product *** relation between sub category & product ***
                    if($product_id && $subCategoryId){
                        $subCategoryObj=new SubCategory($subCategoryId);
                        $result=Db::insert(SUB_CATEGORY_PRODUCT_TABLE_NAME,['product_id'=>$product_id,'subcategory_id'=>$subCategoryId]);
                        $result=Db::insert(CATEGORY_PRODUCT_TABLE_NAME,['product_id'=>$product_id,'category_id'=>$subCategoryObj->getCategory()->getCategoryId()]);
                    }else{
                        $_SESSION['errorMessage']=ERR_ADD_PRODUCT;
                        //reload current page
                        redirectTo($_SERVER['PHP_SELF']);
                    }

                }else{
                    $_SESSION['errorMessage']=ERR_SUBCATEGORY_OR_CATEGORY_REQUIRED;
                    //reload current page
                    redirectTo($_SERVER['PHP_SELF']);
                }



                //reload current page
                redirectTo($_SERVER['PHP_SELF']);
            }

            //get categories 
            $categories=Category::getCategories();
        }
    }elseif($pageUi=='editProduct'){
        //check auth
        if(isAdmin() || isMaster()){

            //cancel edit
            if(isset($_POST['cancelEditProduct'])){
                redirectTo("products.php");
            }

            if(isset($_GET['id'])){

                $product=new Product($_GET['id']);

                if(isset($_POST['editProduct'])){
                    //add product actions

                    //check inputs
                    $title=isset($_POST['title']) ? $_POST['title'] : null;
                    $price=isset($_POST['price']) ? $_POST['price'] : null;
                    $description=isset($_POST['description']) ? $_POST['description'] : null;
                    $image=isset($_FILES['img']['name']) && $_FILES['img']['name']!="" ? $_FILES['img'] : null;
                    $image_alt=isset($_POST['image_alt']) ? $_POST['image_alt'] : null;
                    $instock=isset($_POST['instock']) ? $_POST['instock'] : null;

                    if(isset($_POST['categoryId'])){
                        if(strpos($_POST['categoryId'],"catid_")!==false){
                            sscanf($_POST['categoryId'],"catid_%d",$categoryId);
                        }
                        elseif(strpos($_POST['categoryId'],"subid_")!==false){
                            sscanf($_POST['categoryId'],"subid_%d",$subCategoryId);
                        }
                    }
                    

                    $discount=isset($_POST['discount']) && $_POST['discount'] ? $_POST['discount'] : 0;
                    //admin Id
                    $creator_id=$_SESSION['userId'];
                    $result=$product->update(['title'=>$title,'price'=>$price,'discount'=>$discount,'description'=>$description,'image'=>$image,'image_alt'=>$image_alt,'instock'=>$instock,'creator_id'=>$creator_id],$message);
                    if(!$result){
                        $_SESSION['errorMessage'][]=$message->showError(ERR_PRODUCT_EMPTY_TITLE);
                        $_SESSION['errorMessage'][]=$message->showError(ERR_PRODUCT_EMPTY_PRICE);
                        $_SESSION['errorMessage'][]=$message->showError(ERR_PRODUCT_PRICE_FORMAT);
                        $_SESSION['errorMessage'][]=$message->showError(ERR_PRODUCT_EMPTY_INSTOCK);    
                        redirectTo($_SERVER['PHP_SELF']."?id=".$_GET['id']);
                    }
                    
                    //add subcategory_product
                    if($result && isset($subCategoryId) && $subCategoryId){
                        $product_id=$product->getId();
                        if(Db::checkExists(SUB_CATEGORY_PRODUCT_TABLE_NAME,"product_id='$product_id'",'id')){
                            $result=Db::update(SUB_CATEGORY_PRODUCT_TABLE_NAME,['subcategory_id'=>$subCategoryId],"product_id='$product_id'");
                            if($result){
                                $mcategoryId=Db::select(SUB_CATEGORY_TABLE_NAME,"id='$subCategoryId'",'single','category_id')['category_id'];
                                $result=Db::update(CATEGORY_PRODUCT_TABLE_NAME,['category_id'=>$mcategoryId],"product_id='$product_id'");
                            }
                        }else{
                            $result=Db::insert(SUB_CATEGORY_PRODUCT_TABLE_NAME,['product_id'=>$product_id,'subcategory_id'=>$subCategoryId]);
                            if($result){
                                $mcategoryId=Db::select(SUB_CATEGORY_TABLE_NAME,"id='$subCategoryId'",'single','category_id')['category_id'];
                                $result=Db::update(CATEGORY_PRODUCT_TABLE_NAME,['category_id'=>$mcategoryId],"product_id='$product_id'");
                            }
                        }
                        
                    }

                    if($result && isset($categoryId) && $categoryId){
                        $product_id=$product->getId();
                        $result=Db::update(CATEGORY_PRODUCT_TABLE_NAME,['product_id'=>$product->getId(),'category_id'=>$categoryId],"product_id='$product_id'");
                        if($result){
                            $product->deleteSubCategory();
                        }
                    }

                    $_SESSION['successMessage']=SUCCESS_UPDATE_PRODUCT;
                    //or redirect to list
                    redirectTo("products.php");
                }


                //get categories 
                $categories=Category::getCategories();
            }
        }
    }elseif($pageUi=='editCategory'){
       
        //check auth
        if(isAdmin() || isMaster()){

            //remove a category
            if(isset($_GET['rm_cat'])){

                $category=new Category($_GET['rm_cat']);
                $category->delete();

                /*delete sub categories after removing parent category*/
                $category->deleteSubCategories();
                $_SESSION['successMessage']=SUCCESS_DELETE_CATEGORY;

                redirectTo("categories.php");
    
            }elseif(isset($_GET['rm_sub'])){
                //remove a sub category
                $subCategory=new SubCategory($_GET['rm_sub']);
                $subCategory->delete();

                //set a success message after remove sub category
                $_SESSION['successMessage']=SUCCESS_DELETE_SUBCATEGORY;
                redirectTo("categories.php");
                
            }

            if(isset($_GET['id']) ){
                //cancel edit
                if(isset($_POST['cancelEditCategory'])){
                    redirectTo("categories.php");
                }

                //do edit
                if(isset($_POST['editCategory'])){
                    $category=new Category($_GET['id']);
                    if(isset($_POST['showindex'])){
                        $showindex="yes";
                    }else{
                        $showindex="no";
                    }
                    
                    $category->update(['name'=>$_POST['name'],'show_index'=>$showindex]);
                    redirectTo("categories.php");
                }
            }

            //get updated category
            $category=new Category($_GET['id']);

            //get categories 
            $categories=Category::getCategories();
        }
    }elseif($pageUi=='editSubCategory'){
        //check auth
        if(isAdmin() || isMaster()){
            //cancel edit sub category
            if(isset($_POST['cancelEditSubCategory'])){
                redirectTo("categories.php");
            }

            //remove a category
            if(isset($_GET['rm_cat'])){

                $category=new Category($_GET['rm_cat']);
                $category->delete();

                /*delete sub categories after removing parent category*/
                $category->deleteSubCategories();
                $_SESSION['successMessage']=SUCCESS_DELETE_CATEGORY;

                redirectTo("categories.php");

            }elseif(isset($_GET['rm_sub'])){
                //remove a sub category
                $subCategory=new SubCategory($_GET['rm_sub']);
                $subCategory->delete();

                //set a success message after remove sub category
                $_SESSION['successMessage']=SUCCESS_DELETE_SUBCATEGORY;

                redirectTo("categories.php");
                
            }

            if(isset($_POST['editSubCategory']) ){
                $subCategory=new SubCategory($_GET['id']);
                $subCategory->update(['name'=>$_POST['name'],'category_id'=>$_POST['category_id']]);     
            }
            $subCategory=new SubCategory($_GET['id']);

            //get categories 
            $categories=Category::getCategories();
        }
    }elseif($pageUi=='listProducts'){
        //check auth
        if(isAdmin() || isMaster()){
            if(isset($_GET['del_pro'])){
                $productObj=new Product($_GET['del_pro']);
                $productObj->delete();
                $_SESSION['successMessage']=SUCCESS_DELETE_PRODUCT;
                redirectTo($_SERVER['PHP_SELF']);
            }

            if(isset($_GET['term'])){
                $term=Db::correctTermFormat($_GET['term'],'simple');
                $products=Db::simpleSearch(PRODUCT_TABLE_NAME,"title LIKE '%$term%'");
            }else{
                $products=Product::getProducts();
            }
            
            $categories=Category::getCategories();
        }

    }
    //ADD ADMIN
    elseif($pageUi=='adminman'){
        //message object init
        $messageObject=new Message();
        $messages=null;


        //check auth
        if(isMaster()){     
            
            //DELETE AN ADMIN
            if(isset($_GET['del_admin']) && is_numeric($_GET['del_admin'])){

                $adminId=$_GET['del_admin'];

                //check admin exists
                $admin=Db::checkExists(ADMIN_TABLE_NAME,"id='$adminId'");
                if($admin){
                    //do delete admin
                    $result=Db::delete(ADMIN_TABLE_NAME,"id='$adminId'");

                    if($result){
                        //set message
                        $_SESSION['successMessage']=SUCCESS_REMOVE_ADMIN;
                        redirectTo($_SERVER['PHP_SELF']);
                        //show('ادمین مورد نظر با موفقیت حذف شد');
                    }else{
                        //set message
                        $_SESSION['errorMessage']=ERR_REMOVE_ADMIN;
                        redirectTo($_SERVER['PHP_SELF']);
                    }
                }else{
                    //set message
                    $_SESSION['errorMessage']=ERR_REMOVE_ADMIN;
                    redirectTo($_SERVER['PHP_SELF']);
                }

            }

            if(isset($_POST['addadmin'])){
                $firstName=isset($_POST['first_name']) && $_POST['first_name'] ? $_POST['first_name'] : "";
                $lastName=isset($_POST['last_name']) && $_POST['last_name'] ? $_POST['last_name'] : "";
                $password=isset($_POST['password']) && $_POST['password'] ? sha1($_POST['password']) : "";
                $email=isset($_POST['email']) && $_POST['email'] ? $_POST['email'] : "";
                $phone=isset($_POST['phone']) && $_POST['phone'] ? $_POST['phone'] : "";
                $adminpermission=isset($_POST['adminpermission']) && $_POST['adminpermission'] ? $_POST['adminpermission'] : "";
                //create a nee admin
                Admin::create(['FName'=>$firstName,'LName'=>$lastName,'email'=>$email,'admined_by'=>1,'phone'=>$phone,'password'=>$password,'permission'=>$adminpermission],$messages);
                //$messages->showMessages();
                $_SESSION['errorMessage'][]=$messages->showError(ERR_EMPTY_LAST_NAME);
                $_SESSION['errorMessage'][]=$messages->showError(ERR_EMPTY_FIRST_NAME);
                $_SESSION['errorMessage'][]=$messages->showError(ERR_EMAIL_EMPTY);
                $_SESSION['errorMessage'][]=$messages->showError(ERR_EMAIL_EXISTS);
                $_SESSION['errorMessage'][]=$messages->showError(ERR_PHONE_EXISTS);
                $_SESSION['errorMessage'][]=$messages->showError(ERR_PHONE_NUMBER_LEN);
                $_SESSION['errorMessage'][]=$messages->showError(ERR_CREATE_ADMIN);
                $_SESSION['successMessage']=$messages->showSuccess(SUCCESS_CREATE_ADMIN);
                redirectTo($_SERVER['PHP_SELF']);

            }

            //get admins
            $admins=Admin::getAdmins();
        }else{
            $message=new Message();
            $message->setErrorMessage(ERR_ACCESS_DENIED);
            $message->showError(ERR_ACCESS_DENIED);
            die();
        }
    }
    //EDIT ADMIN
    elseif($pageUi=='editadmin'){
        $messages=null;
        //check auth
        if(isMaster()){
            if(isset($_GET['aid'])){
                $admin=new Admin($_GET['aid']);
            }
            if(isset($_POST['editadmin'])){
                $adminId=$_POST['admin_id'];
                $firstName=isset($_POST['first_name']) && $_POST['first_name'] ? $_POST['first_name'] : "";
                $lastName=isset($_POST['last_name']) && $_POST['last_name'] ? $_POST['last_name'] : "";
                $password=isset($_POST['password']) && $_POST['password'] ? $_POST['password'] : "";
                $email=isset($_POST['email']) && $_POST['email'] ? $_POST['email'] : "";
                $phone=isset($_POST['phone']) && $_POST['phone'] ? $_POST['phone'] : "";
                $adminpermission=isset($_POST['adminpermission']) && $_POST['adminpermission'] ? $_POST['adminpermission'] : "";

                $admin=new Admin($adminId);
                if($password && $password!=""){
                    $result=$admin->update(['FName'=>$firstName,'LName'=>$lastName,'password'=>sha1($password),'email'=>$email,'admined_by'=>1,'phone'=>$phone,'permission'=>$adminpermission],$messages);
                }else{
                    $result=$admin->update(['FName'=>$firstName,'LName'=>$lastName,'email'=>$email,'admined_by'=>1,'phone'=>$phone,'permission'=>$adminpermission],$messages);
                }
                
                if($result){
                    //update login data
                    $account=new Account();
                    $_SESSION['successMessage']=SUCCESS_UPDATE_ADMIN;
                    $account->updateAdminLoginData("adminman.php");
                    
                }else{
                    $_SESSION['errorMessage'][]=$messages->showError(ERR_EMPTY_LAST_NAME);
                    $_SESSION['errorMessage'][]=$messages->showError(ERR_EMPTY_FIRST_NAME);
                    $_SESSION['errorMessage'][]=$messages->showError(ERR_EMAIL_EMPTY);
                    $_SESSION['errorMessage'][]=$messages->showError(ERR_EMAIL_EXISTS);
                    $_SESSION['errorMessage'][]=$messages->showError(ERR_PHONE_EXISTS);
                    $_SESSION['errorMessage'][]=$messages->showError(ERR_PHONE_NUMBER_LEN);
                    $_SESSION['errorMessage'][]=$messages->showError(ERR_CREATE_ADMIN);
                    $_SESSION['errorMessage'][]=$messages->showError(SUCCESS_CREATE_ADMIN);
                    redirectTo($_SERVER['PHP_SELF']."?aid=$adminId");

                }

            }elseif(isset($_POST['cancel'])){
                redirectTo("adminman.php");
            }
        }else{
            $message=new Message();
            $message->setErrorMessage(ERR_ACCESS_DENIED);
        }
    }//TERMS SETTINGS
    elseif($pageUi=='termsdraft'){
        //check auth
        if(isMaster() || isAdmin()){

            if(isset($_POST['law'])){

                //replace law text
                $result=file_put_contents("../law.txt",$_POST['lawtxt']);
                if($result){
                    $_SESSION['successMessage']=SUCCESS_UPDATE_LAW_TXT;
                }else{
                    $_SESSION['errorMessage']=WARNING_UPDATE_LAW_TXT;
                }
                //reload page
                redirectTo($_SERVER['PHP_SELF']);
            }elseif(isset($_POST['term'])){

                //replace term text
                $result=file_put_contents("../term_service.txt",$_POST['termtxt']);

                if($result){
                    $_SESSION['successMessage']=SUCCESS_UPDATE_TERM_TXT;
                }else{
                    $_SESSION['errorMessage']=WARNING_UPDATE_TERM_TXT;
                }
                //reload page
                redirectTo($_SERVER['PHP_SELF']);
            }elseif(isset($_POST['about'])){

                //replace about text
                $result=file_put_contents("../about.txt",$_POST['abouttxt']);
                if($result){
                    $_SESSION['successMessage']=SUCCESS_UPDATE_ABOUT_TXT;
                }else{
                    $_SESSION['errorMessage']=WARNING_UPDATE_ABOUT_TXT;
                }
                //reload page
                redirectTo($_SERVER['PHP_SELF']);
            }
        }

    }
    //LOGIN ADMIN
    elseif($pageUi=='adminlogin'){

        //message handler object init
        $messageObject=null;

        if(isset($_POST['adminlogin'])){

            $phone=isset($_POST['phone']) ? $_POST['phone'] : "";
            $password=isset($_POST['password']) ? sha1($_POST['password']) : "";

            //instance of Account Class
            $account=new Account();

            //do admin login
            $account->adminLogin($phone,$password);

            //set message object
            $messageObject=$account->getMessageHandler();
        }

    }
    //MANAGE USERS 
    elseif($pageUi=='users'){
        if(isAdmin() || isMaster()){
            if(isset($_GET['rm_user'])){
                //DELETE A USER
                $user=new User($_GET['rm_user']);
                if($user){
                    $user->delete();
                    $_SESSION['successMessage']=SUCCESS_REMOVE_USER;
                    redirectTo($_SERVER['PHP_SELF']);
                }
                
            }
            //get users id
            $users=User::getUsesrs("ORDER BY created_at DESC","id");
        }else{
            $message=new Message();
            $message->setErrorMessage(ERR_ACCESS_DENIED);
            $message->showError(ERR_ACCESS_DENIED);
            die();
        }

    }
    //UPLOAD GEOJSON file
    elseif($pageUi=="geojson"){
        if(isAdmin() || isMaster()){
            if(isset($_FILES['geojson']) && $_FILES['geojson']){

                //CHECK FILE FORMAT
                if($_FILES['geojson']['type']!="application/geo+json"){
                    $_SESSION['errorMessage']=ERR_GEOJSON_FORMAT;
                    redirectTo($_SERVER['PHP_SELF']);
                }

                $result=uploadFile($_FILES['geojson'],$msg,"/","map(2).geojson");
                if($result){
                    $_SESSION['successMessage']=SUCCESS_UPLOAD_GEOJSON;
                    redirectTo($_SERVER['PHP_SELF']);
                }else{
                    $_SESSION['errorMessage']=$msg;
                    redirectTo($_SERVER['PHP_SELF']);
                }
            }
        }
    }
    //SLIDER SETTINGS
    elseif($pageUi=='sliders'){
        if(isAdmin() || isMaster()){
            if(isset($_POST['edit'])){
                if(isset($_FILES['slider1'])){
                    //slider 1
                    $slider=new Slider(1);

                    if($_FILES['slider1']){

                        //upload new picture
                        $image_path=uploadImage($_FILES['slider1'],$message,"assets/images/slider/");

                        if($image_path){
                            $old_image_path=$slider->getImgUrl();
                            $result=$slider->update(['image_url'=>$image_path]);
                            //set new path in class
                            $slider->setImgUrl($image_path);
                            if($result){
                                //delete old image from host directory
                                unlink($old_image_path);
                            }
                        }else {
                            # code...
                        }
                    }
                }elseif(isset($_FILES['slider2'])){
                    //slider 2
                    $slider=new Slider(2);
                    
                    if($_FILES['slider2']){

                        //upload new picture
                        $image_path=uploadImage($_FILES['slider2'],$message,"assets/images/slider/");

                        if($image_path){
                            $old_image_path=$slider->getImgUrl();
                            $result=$slider->update(['image_url'=>$image_path]);
                            //set new path in class
                            $slider->setImgUrl($image_path);
                            if($result){
                                //delete old image from host directory
                                unlink($old_image_path);
                            }
                        }else {
                            # code...
                        }
                    }
                }elseif(isset($_FILES['slider3'])){
                    //slider 3
                    $slider=new Slider(3);
                    
                    if($_FILES['slider3']){

                        //upload new picture
                        $image_path=uploadImage($_FILES['slider3'],$message,"assets/images/slider/");

                        if($image_path){
                            $old_image_path=$slider->getImgUrl();
                            $result=$slider->update(['image_url'=>$image_path]);
                            //set new path in class
                            $slider->setImgUrl($image_path);
                            if($result){
                                //delete old image from host directory
                                unlink($old_image_path);
                            }
                        }else {
                            # code...
                        }
                    }
                }
            }

            //fetch sliders
            $slider1=new Slider(1);
            $slider2=new Slider(2);
            $slider3=new Slider(3);
        }
    }
    //INDEX
    elseif($pageUi=='index'){
        $mostSelesProducts=Product::getProducts("instock>0","sales","DESC",20);
        $indexCategories=Category::getCategories("show_index='yes'",$message);
        $latestProducts=Product::getProducts("instock>0","id","DESC",10);
        


        //fetch sliders
        $slider1=new Slider(1);
        $slider2=new Slider(2);
        $slider3=new Slider(3);
    }
    //PRODUCT DETAILS
    elseif($pageUi=='product'){
        if(isset($_GET['pid']) && isset($_GET['slug'])){
            $slug=$_GET['slug'];
            $productId=$_GET['pid'];

            $findProduct=Db::select(PRODUCT_TABLE_NAME,"title='$slug' AND id='$productId'",'single');
            if($findProduct){
                $product=new Product($findProduct['id']);
            }else{
                $product=false;
            }    
        }
    }
    //CART
    elseif($pageUi=='cart'){
        if(isset($_SESSION['cart']) && isset($_SESSION['cart']['products']) && $_SESSION['cart']['products']){
            $productsId=$_SESSION['cart']['products'];
        }
    }
    //ENTER PHONE
    elseif($pageUi=='enterphn'){

        //def variable
        $messageObject=null;


        if(isset($_POST['phone'])){

            if($_POST['phone']){
                $_SESSION['phone']=$_POST['phone'];
                $phone=$_POST['phone'];
                
                //check user sign up or not
                $checkUserExistsOrNot=Db::checkExists('users',"phone='$phone'","is_varified");
    
                if($checkUserExistsOrNot==true){
                    //create a register code
                    $registerCode=rand(1000,9999);
    
                    //update register code in db
                    Db::update(USER_TABLE_NAME,['register_code'=>$registerCode],"phone='$phone'");
    
                    //send register code
                   // sendMessageTrez($phone,"کد شما: $registerCode");
                   //similor
                   $_SESSION['sim-code']=$registerCode;
    
                    //redirect to check code page
                    redirectTo("entercode.php");
                }else{
                    //create register code
                    $registerCode=rand(1000,9999);
    
                    //create init account
                    $account=new Account();
                    $check=$account->createInitialaizeAccount($phone,$registerCode,$messageObject);
                    if($check){
                        //send register code
                        //sendMessageTrez($phone,"کد ثبت نام شما: $registerCode");
                        //similor
                        $_SESSION['sim-code']=$registerCode;
        
                        //redirect to check code page
                        redirectTo("signup.php");
                    }
    

                }
            }else{
                $messageObject=new Message();
                $messageObject->setErrorMessage(ERR_PHONE_NUMBER_EMPTY);
            }
        }
        
    }
    //SIGNUP USER
    elseif($pageUi=='signup'){

        //def variable
        $messageObject=null;
        
        if(isset($_POST['signup'])){
            
            if(isset($_SESSION['phone'])){

                $phone=$_SESSION['phone'];
                $code=isset($_POST['code']) && $_POST['code'] ? $_POST['code'] : "";
                $FName=isset($_POST['first_name']) && $_POST['first_name'] ? $_POST['first_name'] : "";
                $LName=isset($_POST['last_name']) && $_POST['last_name'] ? $_POST['last_name'] : "";

                //get init account data
                $initAccount=Db::select(USER_TABLE_NAME,"phone='$phone'","single");
                if(!$initAccount){
                    redirectTo("enterphn.php");
                }

                if($code==$initAccount['register_code']){
                    //ACCOUNT OBJECT
                    $account=new Account();
                    $result=$account->create($phone,$FName,$LName,$code,$messageObject);

                }else{
                    $messageObject=new Message();
                    $messageObject->setErrorMessage(ERR_REGISTER_CODE_INCORRECT);
                }
                


            }else{
                redirectTo("enterphn.php");
            }
        }
    }elseif($pageUi=='entercode'){
        $messageObject=null;

        if(isset($_POST['login'])){
            if($_POST['code'] && $_POST['code']){
                $phone=isset($_SESSION['phone']) ? $_SESSION['phone'] : "";
                $code=isset($_POST['code']) && $_POST['code'] ? $_POST['code'] : "";
                if(!$phone){
                    $_SESSION['phone']=$phone;
                    $_SESSION['errorMessage']=ERR_REGISTER_CODE_INCORRECT;

                }else{
                //ACCOUNT OBJECT
                $account=new Account();
                $messageObject=$account->getMessageHandler();
                $account->login($phone,$code);
                }
    

            }else{
                $messageObject=new Message();
                $messageObject->setErrorMessage(ERR_REGISTER_CODE_INCORRECT);
            }

            
        }
    }
    //USER PROFILE
    elseif($pageUi=='userProfile'){
       

        $account=new Account();
        //AUTHENTICATION
        $account->checkAuth();
        if(isset($_SESSION['permission'])){
            $user=new Admin($_SESSION['userId']);
        }else{
            $user=new User($_SESSION['userId']);
        }

        //GET ADDRESS
        $addresses=Address::getAddresses($_SESSION['phone']);

        if(isset($_POST['edit'])){
            //edit user data
            $firstName=isset($_POST['first_name']) && $_POST['first_name'] ? $_POST['first_name'] : "";
            $lastName=isset($_POST['last_name']) && $_POST['last_name'] ? $_POST['last_name'] : "";
            $email=isset($_POST['email']) && $_POST['email'] ? $_POST['email'] : "";

            //check email 
            if(isset($_SESSION['permission'])){
                $res=Db::checkExists(ADMIN_TABLE_NAME,"email='$email'");
            }else{
                $res=Db::checkExists(USER_TABLE_NAME,"email='$email'");
            }

            if($res){
                if($res['id']!=$_SESSION['userId']){
                    $email="";
                    echo "این ایمیل قبلا ثبت شده است";
                }

            }

            //update user data
            $result=$user->update(['FName'=>$firstName,'LName'=>$lastName,'email'=>$email]);



            if($result){

                $_SESSION['successMessage']=SUCCESS_DATA_UPDATED;

                //update loged session data
                $_SESSION['FName']=$firstName;
                $_SESSION['LName']=$lastName;
                $_SESSION['email']=$email;
                redirectTo($_SERVER['PHP_SELF']);
            }else{

                $_SESSION['errorMessage']=ERR_DATA_UPDATED;
                redirectTo($_SERVER['PHP_SELF']);
            }


        }

        //refresh update data
        if(isset($_SESSION['permission'])){
            $user=new Admin($_SESSION['userId']);
        }else{
            $user=new User($_SESSION['userId']);
        }
        

    }elseif($pageUi=='userAddress'){
        $account=new Account();
        //AUTHENTICATION
        $account->checkAuth();
        
        if(isset($_POST['addAddress'])){

            //ADD NEW ADDRESS
            $userPhone=$_SESSION['phone'];

            if(!isset($_POST['address']) || empty($_POST['address'])){
                $_SESSION['errorMessage']=ERR_ADDRESS_NAME_EMPTY;
                redirectTo($_SERVER['PHP_SELF']);
            }

            if(!isset($_POST['postal_code']) || empty($_POST['postal_code'])){
                $_SESSION['errorMessage']=ERR_POSTAL_CODE_EMPTY;
                redirectTo($_SERVER['PHP_SELF']);
            }

            if(!isset($_POST['title']) || empty($_POST['title'])){
                $_SESSION['errorMessage']=ERR_TITLE_EMPTY;
                redirectTo($_SERVER['PHP_SELF']);
            }

            $unit=isset($_POST['unit']) ? $_POST['unit'] : null;
            $floor=isset($_POST['floor']) ? $_POST['floor'] : null;
            $result=Address::create(['user_phone'=>$userPhone,'address'=>$_POST['address'],'unit'=>$_POST['unit'],'floor'=>$_POST['floor'],'postal_code'=>$_POST['postal_code'],'title'=>$_POST['title'],'address_explain'=>$_POST['description']]);

            if($result){
                $_SESSION['successMessage']=SUCCESS_CREATE_ADDRESS;
            }else{
                $_SESSION['errorMessage']=ERR_CREATE_ADDRESS;
            }
            
            redirectTo($_SERVER['PHP_SELF']);
        }
        if(isset($_GET['del'])){
            $address=new Address($_GET['del']);
            $address->delete();
            $_SESSION['successMessage']=SUCCESS_DELETE_ADDRESS;
            redirectTo($_SERVER['PHP_SELF']);
        }

        //GET ADDRESS
        $addresses=Address::getAddresses($_SESSION['phone']);
        
    }elseif($pageUi=='checkout'){
        $date="";
        $time="";

        $account=new Account();
        //AUTHENTICATION
        $account->checkAuth();
        //GET USER ADDRESSES
        $addresses=Address::getAddresses($_SESSION['phone']);

        //GET PAYMENT METHODS
        $payment_methods=Db::select(PAYMENT_MOTHODS_TABLE_NAME);

        //GET SHIPPINGS
        $shippings=Db::select(SHIPPING_TABLE_NAME);

        if(isset($_SESSION['cart']['products']) && $_SESSION['cart']['products']){
           
            //POSTAL PRICE
            if(isset($_SESSION['cart']['fullsum']) && $_SESSION['cart']['fullsum']>MAX_PRICE){
                $postal_price=0;
            }else{
                if(isset($_POST['shipping'])){
                    if($_POST['shipping']==1){
                        $postal_price=FAST_POSTAL_PRICE;
                    }else{
                        $postal_price=POSTAL_PRICE;
                    }

                }else{
                    $postal_price=POSTAL_PRICE;
                }
                
            }

            if(isset($_POST['shipping']) && $_POST['shipping']!=1){
                if(isset($_POST['date']) && $_POST['date'] && isset($_POST['time']) && $_POST['time']){
                    $date=$_POST['date'];
                    $time=$_POST['time'];
                }
            }


            //sum all prices
            $sum_all_price=$_SESSION['cart']['fullsum']+$postal_price;

            if(isset($_POST['pay'])){
               
                //GET PRODUCTS
                $productsId=getProductsIdFromCart();

                
                //create a new order
                $code=rand(1000,9999);
                if(isset($_SESSION['permission'])){
                    $role="admin";
                }else{
                    $role="user";
                }

                //check inputs

                if(!isset($_POST['address-item']) || !$_POST['address-item']){
                    $_SESSION['errorMessage']=ERR_ADDRESS_EMPTY;
                    redirectTo($_SERVER['PHP_SELF']);
                }


                if(!isset($_POST['shipping']) || !$_POST['shipping']){
                    $_SESSION['errorMessage']=ERR_SHIPPING_EMPTY;
                    redirectTo($_SERVER['PHP_SELF']);
                }


                if(!isset($_POST['payment']) || !$_POST['payment']){
                    $_SESSION['errorMessage']=ERR_PAYMENT_EMPTY;
                    redirectTo($_SERVER['PHP_SELF']);
                }



                
                $orderId=Order::create(['customer_id'=>$_SESSION['userId'],'code'=>$code,'payment_method_id'=>$_POST['payment'],'shipping_id'=>$_POST['shipping'],'order_date'=>$date,'order_time'=>$time,'sum_price'=>$sum_all_price,'customer_role'=>$role,'address_id'=>$_POST['address-item'],'postal_price'=>$postal_price],$message);

                if($orderId){

                    //create order detail
                    foreach($productsId as $productId){
                        //reduce product instock
                        $product=new Product($productId['id']);
                        //reduce instock after pay
                        //$product->update(['instock'=>$product->getInstock()-$_SESSION['cart']['number'][$productId['id']]]);
                        
                        //PRODUCT PRICE
                        $productId=$productId['id'];
                        $price=Db::select(PRODUCT_TABLE_NAME,"id='$productId'","single","price");
                        $price=$price['price'];



                        //create orfer detail
                        Db::insert(ORDER_DETAIL_TABLE_NAME,['order_id'=>$orderId,'product_id'=>$productId,'ordered_price'=>$price,'quantity'=>$_SESSION['cart']['number'][$productId],'sum_price'=>$_SESSION['cart']['sumprice'][$productId]]);
                    }

                    //eo empty cart
                    unset($_SESSION['cart']);

                    //redirect to orders
                    $_SESSION['code']=$code;
                    redirectTo("aftercheckout.php");
                }
            }
 
        }else{
            //redirect to index
            redirectTo("index.php");
        }
    }elseif($pageUi=='aftercheckout'){

        $account=new Account();
        //AUTHENTICATION
        $account->checkAuth();

        if(isset($_SESSION['code']) && $_SESSION['code']){
            $code=$_SESSION['code'];
            unset($_SESSION['code']);
        }else{
            redirectTo('index.php');
        }

    }elseif($pageUi=='orders'){
        if(isAdmin() || isMaster()){
            if(isset($_POST['update'])){
                $order=new Order($_POST['orderId']);
                $order->update(['status'=>$_POST['status']]);
            }
            //GET ORDERS
            $orders=Order::getOrders();
        }else{
            redirectTo("adminlogin.php");
        }
    }elseif($pageUi=='userorders'){
        $account=new Account();
        //AUTHENTICATION
        $account->checkAuth();
        if(isset($_SESSION['permission'])){
            $user=new Admin($_SESSION['userId']);
            $customerRole="admin";
        }else{
            $user=new User($_SESSION['userId']);
            $customerRole="user";
        }

        //GET ADDRESS
        $orders=Order::getOrders("customer_id='".$user->getId()."' AND customer_role='$customerRole'",'id');


    }elseif($pageUi=='shipping'){
        if(isAdmin() || isMaster()){
            if(isset($_POST['shipping_update'])){
                $shipping=new Shipping($_POST['shipping_id']);
                $shipping->update(['shipping_type'=>$_POST['shipping_type'],'price'=>$_POST['price'],'description'=>$_POST['description']]);
            }

            if(isset($_POST['updatepostalprice'])){
                updateFreePostalPrice($_POST['postalprice']);
            }

            //get shippings 
            $shippings=Shipping::getShippings();
            $freePostalPrice=getFreePostalPrice();
        }
    }elseif($pageUi=='orderdetail'){
        $account=new Account();
        //AUTHENTICATION
        $account->checkAuth();

        if(isset($_GET['id']) && is_numeric($_GET['id'])){

            $order=new Order($_GET['id']);
            $shipping=new Shipping($order->getShippingId());

            if(isset($_SESSION['permission'])){
                $user=new Admin($_SESSION['userId']);
                $customerRole="admin";
            }else{
                $user=new User($_SESSION['userId']);
                $customerRole="user";
                //AUTH
                if($order->getCustomerId()!=$_SESSION['userId'] || $order->getCustomerRole()=='admin'){
                    redirectTo('userorders.php');
                }
            }
            $address=new Address($order->getAddressId());
            $ordersDetail=$order->getOrdersDetail();

        }
    }elseif($pageUi=='orderreceipt'){

        $account=new Account();
        //AUTHENTICATION
        $account->checkAuth();

        if(isset($_GET['id'])){
            $order=new Order($_GET['id']);

            $shipping=new Shipping($order->getShippingId());

            if(isset($_SESSION['permission'])){
                $user=new Admin($_SESSION['userId']);
                $customerRole="admin";
            }else{
                $user=new User($_SESSION['userId']);
                $customerRole="user";
                //AUTH
                if($order->getCustomerId()!=$_SESSION['userId'] || $order->getCustomerRole()=='admin'){
                    redirectTo('userorders.php');
                }

            }

            $address=new Address($order->getAddressId());
            $ordersDetail=$order->getOrdersDetail();

        }
    }elseif($pageUi=='updateAddress'){
        $account=new Account();
        //AUTHENTICATION
        $account->checkAuth();

        if(isset($_POST['cancelEdit'])){
            redirectTo("useraddress.php");
        }

        //update address
        if(isset($_POST['updateAddress'])){

            $address=new Address($_GET['id']);
            $result=$address->update(['address'=>$_POST['address'],'unit'=>$_POST['unit'],'floor'=>$_POST['floor'],'postal_code'=>$_POST['postal_code'],'title'=>$_POST['title'],'address_explain'=>$_POST['description']]);
            
            if($result){
                $_SESSION['successMessage']=SUCCESS_ADDRESS_UPDATED;
                redirectTo($_SERVER['PHP_SELF']."?id=".$_GET['id']);
            }else{
                $_SESSION['errorMessage']=ERR_ADDRESS_UPDATED;
                redirectTo($_SERVER['PHP_SELF']."?id=".$_GET['id']);
            }

        }


        if(isset($_GET['id'])){
            $address=new Address($_GET['id']);
            //AUTH
            if($address->getPhone()!=$_SESSION['phone']){
                redirectTo('useraddress.php');
            }

            if(isset($_SESSION['permission'])){
                $user=new Admin($_SESSION['userId']);
                $customerRole="admin";
            }else{
                $user=new User($_SESSION['userId']);
                $customerRole="user";
            }
        }



    }elseif($pageUi=='categoryitems'){
    
        if(isset($_GET['catid']) && is_numeric($_GET['catid'])){
            //get category items
            $catId=$_GET['catid'];
            $products=Db::select(CATEGORY_PRODUCT_TABLE_NAME,"category_id=$catId",'all','product_id');

        }elseif(isset($_GET['subid']) && is_numeric($_GET['subid'])){
            $subId=$_GET['subid'];
            $products=Db::select(SUB_CATEGORY_PRODUCT_TABLE_NAME,"subcategory_id=$subId",'all','product_id');
        }elseif(isset($_GET['term'])){
            
            $term=Db::correctTermFormat($_GET['term'],'simple');
            $products=Db::simpleSearch(PRODUCT_TABLE_NAME,"title LIKE '%$term%'");
            
            if(!$products){
                $products=Db::simpleSearch(PRODUCT_TABLE_NAME,"id IN (SELECT product_id FROM category_product WHERE category_id IN(SELECT id FROM categories WHERE name LIKE '%$term%'))");

                if(!$products){
                    $products=Db::simpleSearch(PRODUCT_TABLE_NAME,"id IN (SELECT product_id FROM subcategory_product WHERE subcategory_id IN(SELECT id FROM sub_categories WHERE name LIKE '%$term%'))");
                }
            }


        }else{
            echo 'خطا! پارامتر ورودی صحیح نمی باشد';
            die();
        }
    }elseif($pageUi=='searchedfor'){
        if(isset($_GET['term'])){

            $term=Db::correctTermFormat($_GET['term'],'simple');
            $products=Db::simpleSearch(PRODUCT_TABLE_NAME,"title LIKE '%$term%'");

        }else{
            echo 'خطا! پارامتر ورودی صحیح نمی باشد';
            die();
        }
    }

}
