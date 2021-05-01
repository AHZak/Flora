<?php
//SUB CATEGORY

use Database\Db;
class SubCategory{
        //MESSAGES HANDLER
        private $messages;
        private $subCategoryId;
        private $categoryId;
        private $name;
        private $createdAt;
        private $updatedAt;
        private $visibility;
        private $category;
    
    
        public function __construct($subCategoryId)
        {
            $this->setMessageHandler();
            $this->setSubCategoryId($subCategoryId);
            $subCategory=$this->getSubCategoryFullInfo();
            if($subCategory){
                $this->setName($subCategory['name']);
                $this->setCreatedAt($subCategory['created_at']);
                $this->setUpdatedAt($subCategory['updated_at']);
                $this->setVisibility($subCategory['visibility']);
                $this->setCreatorId($subCategory['creator_id']);
                $this->setCategoryId($subCategory['category_id']);
                $this->setCategory();
            }
    
        }
    
        //SET VARIABELS
        private function setSubCategoryId($subCategoryId){
            $this->subCategoryId=$subCategoryId;
        }

        private function setCategoryId($categoryId){
            $this->categoryId=$categoryId;
        }

        private function setCategory(){
            $this->category=new Category($this->getCategoryId());
        }
    
        private function setName($categoryName){
            $this->name=$categoryName;
        }
    
        private function setCreatorId($creatorId){
            $this->creatorId=$creatorId;
        }
    
        private function setCreatedAt($createdAt){
            $this->createdAt=$createdAt;
        }
    
        private function setUpdatedAt($updatedAt){
            $this->updatedAt=$updatedAt;
        }
    
        private function setVisibility($visibility){
            $this->visibility=$visibility;
        }
    
        private function setMessageHandler(){
            $messageHandler=new Message();
            $this->messages=$messageHandler;
        }
    
    
    
        //GET VARIABELS
        public function getSubCategoryId(){
            return $this->subCategoryId;
        }
    
        public function getCreatorId(){
            return $this->creatorId;
        }
    
        public function getName(){
            return $this->name;
        }
    
        public function getCreatedAt(){
            return $this->createdAt;
        }
    
        public function getUpdatedAt(){
            return $this->updatedAt;
        }
    
        public function getVisibility(){
            return $this->visibility;
        }
    
        public function getMessageHandler(){
            return $this->messages;
        }

        public function getCategoryId(){
            return $this->categoryId;
        }

        public function getCategory(){
            return $this->category;
        }


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

    //GET A SUB CATEGORY FULL INFO
    private function getSubCategoryFullInfo(){
        return Db::select(SUB_CATEGORY_TABLE_NAME,"id='$this->subCategoryId'","single");
    }

    //DELETE A SUB CATEGORY
    public function delete(){
        $result=Db::delete(SUB_CATEGORY_TABLE_NAME,"id='$this->subCategoryId'");
        if($result){
            $this->getMessageHandler()->setErrorMessage(ERR_SUB_CATEGORY_DELETE);
            return true;
        }
        return false;
    }

    //GET COLLECTION OF SUB CATEGORIES
    public static function getSUbCategories($conditions="1",&$messages=""){
        $messages=new Message();
        $result=Db::select(SUB_CATEGORY_TABLE_NAME,$conditions);
        if($result){
            return $result;
        }
        $messages->setErrorMessage(ERR_GET_SUB_CATEGORIES_COLLECTION);
        return false;
        
    }
}