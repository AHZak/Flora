<?php
use Database\Db;

//DO LOGOUT
if(isset($_GET['logout']) && $_GET['logout']==true){
    $account=new Account();
    $account->logout();
}

if(isset($pageUi)){
    if($pageUi=='addCategory'){
        if(isAdmin() || isMaster()){
            if(isset($_GET['rm_cat'])){
                $category=new Category($_GET['rm_cat']);
                $category->delete();
                $category->deleteSubCategories();
    
            // $category->getMessageHandler()->showMessages();
            }elseif(isset($_GET['rm_sub'])){
                $subCategory=new SubCategory($_GET['rm_sub']);
                $subCategory->delete();
                
            // $subCategory->getMessageHandler()->showMessages();
            }elseif(isset($_POST['addCategory'])){
                $catName=isset($_POST['name']) ? $_POST['name'] : "";
                $catType=isset($_POST['catType']) ? $_POST['catType'] : "";
                
                if($catType!=""){
                    if($catType=='parent'){
                        //add category
                        Category::create(['name'=>$catName,'creator_id'=>1],$message);
                        //$message->showMessages();
                    }else{
                        //add sub category
                        SubCategory::create(['name'=>$catName,'creator_id'=>1,'category_id'=>$catType]);
                    }
                }
            }
            
            //get categories and sub categories
            $categories=Category::getCategories();
        }
    }elseif($pageUi=='addProduct'){
        //check auth
        if(isAdmin() || isMaster()){
            if(isset($_POST['addProduct'])){
                //add product actions
                $title=isset($_POST['title']) ? $_POST['title'] : null;
                $price=isset($_POST['price']) ? $_POST['price'] : null;
                $description=isset($_POST['description']) ? $_POST['description'] : null;
                $image=isset($_FILES['img']) ? $_FILES['img'] : null;
                $image_alt=isset($_POST['image_alt']) ? $_POST['image_alt'] : null;
                $instock=isset($_POST['instock']) ? $_POST['instock'] : null;
                $subCategoryId=isset($_POST['subCategoryId']) ? $_POST['subCategoryId'] : null;
                //admin Id
                $creator_id=1;
                $product_id=Product::create(['title'=>$title,'price'=>$price,'description'=>$description,'image'=>$image,'image_alt'=>$image_alt,'instock'=>$instock,'creator_id'=>$creator_id],$message);
                
                //add subcategory_product
                if($product_id && $subCategoryId){
                    $subCategoryObj=new SubCategory($subCategoryId);
                    $result=Db::insert(SUB_CATEGORY_PRODUCT_TABLE_NAME,['product_id'=>$product_id,'subcategory_id'=>$subCategoryId]);
                    $result=Db::insert(CATEGORY_PRODUCT_TABLE_NAME,['product_id'=>$product_id,'category_id'=>$subCategoryObj->getCategory()->getCategoryId()]);
                }
            }

            //get categories 
            $categories=Category::getCategories();
        }
    }elseif($pageUi=='editProduct'){
        //check auth
        if(isAdmin() || isMaster()){
            if(isset($_POST['cancelEditProduct'])){
                redirectTo("products.php");
            }
            if(isset($_GET['id'])){

                $product=new Product($_GET['id']);

                if(isset($_POST['editProduct'])){
                    //add product actions
                    $title=isset($_POST['title']) ? $_POST['title'] : null;
                    $price=isset($_POST['price']) ? $_POST['price'] : null;
                    $description=isset($_POST['description']) ? $_POST['description'] : null;
                    $image=isset($_FILES['img']['name']) && $_FILES['img']['name']!="" ? $_FILES['img'] : null;
                    $image_alt=isset($_POST['image_alt']) ? $_POST['image_alt'] : null;
                    $instock=isset($_POST['instock']) ? $_POST['instock'] : null;
                    $subCategoryId=isset($_POST['subCategoryId']) ? $_POST['subCategoryId'] : null;
                    //admin Id
                    $creator_id=1;
                    $result=$product->update(['title'=>$title,'price'=>$price,'description'=>$description,'image'=>$image,'image_alt'=>$image_alt,'instock'=>$instock,'creator_id'=>$creator_id],$message);
                    
                    
                    //add subcategory_product
                    if($result && $subCategoryId){
                        $product_id=$product->getId();
                        $result=Db::update(SUB_CATEGORY_PRODUCT_TABLE_NAME,['product_id'=>$product->getId(),'subcategory_id'=>$subCategoryId],"product_id='$product_id'");
                    }
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
            if(isset($_GET['id']) ){
                //cancel edit
                if(isset($_POST['cancelEditCategory'])){
                    redirectTo("categories.php");
                }

                //do edit
                if(isset($_POST['editCategory'])){
                    $category=new Category($_GET['id']);
                    $category->update(['name'=>$_POST['name']]);
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
            }

            if(isset($_GET['term'])){
                $term=Db::correctTermFormat($_GET['term']);
                $products=Db::simpleSearch(PRODUCT_TABLE_NAME,"title LIKE '%$term%'");
            }else{
                $products=Product::getProducts();
            }
            
            $categories=Category::getCategories();
        }

    }
    //ADD ADMIN
    elseif($pageUi=='adminman'){
        //check auth
        if(isMaster()){       
            if(isset($_GET['del_admin']) && is_numeric($_GET['del_admin'])){
                $adminId=$_GET['del_admin'];
                $result=Db::delete(ADMIN_TABLE_NAME,"id='$adminId'");
                if($result){
                    redirectTo($_SERVER['PHP_SELF']);
                    //show('ادمین مورد نظر با موفقیت حذف شد');
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
                    $result=$admin->update(['FName'=>$firstName,'LName'=>$lastName,'password'=>sha1($password),'email'=>$email,'admined_by'=>1,'phone'=>$phone,'permission'=>$adminpermission]);
                }else{
                    $result=$admin->update(['FName'=>$firstName,'LName'=>$lastName,'email'=>$email,'admined_by'=>1,'phone'=>$phone,'permission'=>$adminpermission]);
                }
                
                if($result){
                    //update login data
                    $account=new Account();
                    $account->updateAdminLoginData("adminman.php");

                    $admin=new Admin($adminId);
                    //redirect to admins list
                   // redirectTo("admin.php");
                }

            }
        }else{
            $message=new Message();
            $message->setErrorMessage(ERR_ACCESS_DENIED);
        }
    }
    //LOGIN ADMIN
    elseif($pageUi=='adminlogin'){
        if(isset($_POST['adminlogin'])){
            $phone=isset($_POST['phone']) ? $_POST['phone'] : "";
            $password=isset($_POST['password']) ? sha1($_POST['password']) : "";
            $account=new Account();

            //do admin login
            $account->adminLogin($phone,$password);
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
    //INDEX
    elseif($pageUi=='index'){
        $mostSelesProducts=Product::getProducts("instock>0","sales","DESC",20);
        $indexCategories=Category::getCategories("show_index='yes'",$message);
        $latestProducts=Product::getProducts("instock>0","id","DESC",10);
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
        if(isset($_SESSION['cart']) && $_SESSION['cart']['products']){
            $productsId=$_SESSION['cart']['products'];
        }
    }
    //ENTER PHONE
    elseif($pageUi=='enterphn'){

        if(isset($_POST['phone'])){

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
                $account->createInitialaizeAccount($phone,$registerCode);

                //send register code
                //sendMessageTrez($phone,"کد ثبت نام شما: $registerCode");
                //similor
                $_SESSION['sim-code']=$registerCode;

                //redirect to check code page
                redirectTo("signup.php");
            }
        }
        
    }
    //SIGNUP USER
    elseif($pageUi=='signup'){

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
                    $result=$account->create($phone,$FName,$LName,$code,$messages);
                    if($result){
                        //do login
                        
                        //redirect to dashboard
                    }else{
                        //show err
                    }
                }else{
                    echo 'کد وارد شده اشتباه است';
                }

            }else{
                redirectTo("enterphn.php");
            }
        }
    }elseif($pageUi=='entercode'){
        if(isset($_POST['login'])){

            $phone=$_SESSION['phone'];
            $code=isset($_POST['code']) && $_POST['code'] ? $_POST['code'] : "";

            //ACCOUNT OBJECT
            $account=new Account();
            $account->login($phone,$code);
            
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
            Address::create(['user_phone'=>$userPhone,'address'=>$_POST['address'],'unit'=>$_POST['unit'],'floor'=>$_POST['floor'],'postal_code'=>$_POST['postal_code'],'title'=>$_POST['title'],'address_explain'=>$_POST['description']]);
        }

        //GET ADDRESS
        $addresses=Address::getAddresses($_SESSION['phone']);
        
    }





}
