<?php
//CATEGORY
use Database\Db;
class Category{
    //MESSAGES HANDLER
    private $messages;


    //CREATE A NEW CATEGORY
    //this function , create a category and return this category id
    public static function create(array $params,&$message=null){

        //messages handler
        $message=new Message();

        //SECURITY OPTION
        $params=validArrayInputs($params);

        //category name
        $name=$params['name'];

        //check to category already exists or not
        if(!Db::checkExists(CATEGORY_TABLE_NAME,"name='$name'")){

            //do create a category
            $category_id=Db::insert(CATEGORY_TABLE_NAME,$params);

            if($category_id){
                $message->setSuccessMessage(SUCCESS_CREATE_CATEGORY);
                return $category_id;
            }else{
                $message->setErrorMessage(ERR_CATEGORY_CREATE);
                return false;
            }
            
        }else{
            $message->setErrorMessage(ERR_CATEGORY_EXISTS);
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