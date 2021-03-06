<?php
//CATEGORY
use Database\Db;
class Category{
    //MESSAGES HANDLER
    private $messages;
    private $categoryId;
    private $name;
    private $createdAt;
    private $updatedAt;
    private $visibility;
    private $creatorId;
    private $subCategories;
    private $showIndex;

    public function __construct($categoryId)
    {
        $this->setMessageHandler();
        $this->setCategoryId($categoryId);
        $category=$this->getCategoryFullInfo();
        if($category){
            $this->setName($category['name']);
            $this->setCreatedAt($category['created_at']);
            $this->setUpdatedAt($category['updated_at']);
            $this->setVisibility($category['visibility']);
            $this->setCreatorId($category['creator_id']);
            $this->setShowIndex($category['show_index']);
            $this->setSubCategories();
        }

    }

    //SET VARIABELS
    private function setCategoryId($categoryId){
        $this->categoryId=$categoryId;
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

    private function setShowIndex($value){
        $this->showIndex=$value;
    }

    private function setSubCategories(){
        $this->subCategories=SubCategory::getSUbCategories("category_id='$this->categoryId'");
    }

    public function getProducts($conditionsQuery="1"){
            
        //get product details by subcategory id
        $products=Db::query("SELECT * FROM ".PRODUCT_TABLE_NAME." WHERE id IN ( SELECT product_id FROM ".CATEGORY_PRODUCT_TABLE_NAME." WHERE category_id='$this->categoryId') AND $conditionsQuery");

        if($products=$products->fetchAll(PDO::FETCH_NAMED)){
            return $products;
        }else{
            return false;
        }
    }

    //count categories
    public static function getCount(){
        $result=Db::query("SELECT COUNT(id) FROM categories");
        return $result->fetchColumn();
    }

    //GET VARIABELS
    public function getCategoryId(){
        return $this->categoryId;
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

    public function getShowIndex(){
        return $this->showIndex;
    }

    public function getSubCategories(){
        return $this->subCategories;
    }

    //CREATE A NEW CATEGORY
    //this function , create a category and return this category id
    public static function create(array $params,&$message=null){

        //messages handler
        $message=new Message();

        //SECURITY OPTION
        $params=validArrayInputs($params);

        //category name
        $name=str_replace("'","\'",$params['name']);

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

    //GET A CATEGORY FULL INFO
    private function getCategoryFullInfo(){
        return Db::select(CATEGORY_TABLE_NAME,"id='$this->categoryId'","single");
    }

    //DELETE A CATEGORY
    public function delete(){
        $result=Db::delete(CATEGORY_TABLE_NAME,"id='$this->categoryId'");
        if($result){
            $this->getMessageHandler()->setSuccessMessage(SUCCESS_DELETE_CATEGORY);
            return true;
        }
        $this->getMessageHandler()->setErrorMessage(ERR_CATEGORY_DELETE);
        return false;
    }

    //UPDATE A CATEGORY
    public function update(array $params){
        //SECURITY OPTION
        $params=validArrayInputs($params);
        return Db::update(CATEGORY_TABLE_NAME,$params,"id='$this->categoryId'");
    }

    //GET COLLECTION OF CATEGORIES
    public static function getCategories($conditions='1',&$messages=""){
        $messages=new Message();
        $result=Db::select(CATEGORY_TABLE_NAME,$conditions);
        if($result){
            return $result;
        }
        $messages->setErrorMessage(ERR_GET_CATEGORIES_COLLECTION);
        return false;
    }

    //DELETE SUBCATEGORIES
    public function deleteSubCategories(){
        $result=Db::delete(SUB_CATEGORY_TABLE_NAME,"category_id='$this->categoryId'");
        if($result){
            return true;
        }
        
        return false;
    }
    

    //+++++++++++ TOOLS ++++++++++++++

    
}