<?php
//SUB CATEGORY

use Database\Db;
class SubCategory{
    //MESSAGES HANDLER
    private $messages;


    //CREATE A NEW SUB CATEGORY
    //this function , create a sub category and return this sub category id
    public static function create(array $params,&$message=null){

        //messages handler
        $message=new Message();

        $name=$params['name'];
        if(!Db::checkExists(SUB_CATEGORY_TABLE_NAME,"name='$name'")){
            $subCategoryId=Db::insert(SUB_CATEGORY_TABLE_NAME,$params);
            if($subCategoryId){
                $message->setSuccessMessage(SUCCESS_CREATE_SUB_CATEGORY);
                return $subCategoryId;
            }else{
                $message->setErrorMessage(ERR_SUB_CATEGORY_CREATE);
                return false;
            }
        }else{
            $message->setErrorMessage(ERR_SUB_CATEGORY_EXISTS);
            return false;
        }

    }

    private function message(){
        $this->messages= new Message();
    }

    public function getMessages(){
        return $this->messages;
    }
}