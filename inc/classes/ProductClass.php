<?php

//this is product class

use Database\Db;
class Product{
    
    private $id;
    private $price;
    private $description;
    private $instock;
    private $title;
    private $created_at;
    private $updated_at;
    private $creator_id;
    private $image;
    private $visibility;
    private $category;
    private $subCategory;

    public function __construct($productId)
    {
        $product=$this->getProductFullInfo($productId);
        if($product){
            $this->setId($product['id']);
            $this->setPrice($product['price']);
            $this->setDescription($product['description']);
            $this->setInstock($product['instock']);
            $this->setCreated_at($product['created_at']);
            $this->setUpdated_at($product['updated_at']);
            $this->setCreatorId($product['creator_id']);
            $this->setImage($product['image']);
            $this->setVisibility($product['visibility']);
            $this->setCategory();
            $this->setSubCategory();

        }
    }


    //SET PROPERTIES
    public function setId($productId){
        $this->id=$productId;
    }

    public function setPrice($price){
        $this->price=$price;
    }
    public function setDescription($description){
        $this->description=$description;
    }

    public function setInstock($instock){
        $this->instock=$instock;
    }

    public function setTitle($title){
        $this->title=$title;
    }

    public function setCreated_at($created_at){
        $this->created_at=$created_at;
    }

    public function setUpdated_at($updated_at){
        $this->updated_at=$updated_at;
    }

    public function setImage($image){
        $this->image=$image;
    }

    public function setVisibility($visibility){
        $this->visibility=$visibility;
    }

    public function setCreatorId($creatorId){
        $this->creator_id=$creatorId;
    }

    public function setCategory(){
        $category_product=Db::select('category_product',"product_id='$this->id'",'single','*',1);
        if($category_product){
            $this->category=new Category($category_product['category_id']);
        }
        
    }

    public function setSubCategory(){
        $subCategory_product=Db::select(SUB_CATEGORY_PRODUCT_TABLE_NAME,"product_id='$this->id'",'single','*',1);
        if($subCategory_product){
            $this->subCategory=new SubCategory($subCategory_product['subcategory_id']);
        }
        
    }



    //GET PROPERTIES
    public function getId(){
        return $this->id;
    }

    public function getPrice(){
        return $this->price;
    }

    public function getTitle(){
        return $this->title;
    }
    
    public function getDescription(){
        return $this->description;
    }

    public function getCreatedAt(){
        return $this->created_at;
    }

    public function getUpdatedAt(){
        return $this->updated_at;
    }

    public function getCreatorId(){
        return $this->creator_id;
    }

    public function getInstock(){
        return $this->instock;
    }

    public function getVisibility(){
        return $this->visibility;
    }

    public function getImage(){
        return $this->image;
    }

    public function getCategory(){
        return $this->category;
    }

    public function getSubCategory(){
        return $this->subCategory;
    }

    //GET PRODUCT FULL INFO
    private function getProductFullInfo($productId){
        $product=Db::select(PRODUCT_TABLE_NAME,"id='$productId'",'single');
        if($product){
            return $product;
        }else{
            return false;
        }
    }



    //create a product
    public static function create(array $params,&$message=""){
        //messages handler
        $message=new Message();

        //SECURITY OPTION
        $params=validArrayInputs($params);

        //product title
        $title=str_replace("'","\'",$params['title']);

        //check to product already exists or not
        if(!Db::checkExists(PRODUCT_TABLE_NAME,"title='$title'")){

            //do create a product
            $product_id=Db::insert(PRODUCT_TABLE_NAME,$params);

            if($product_id){
                $message->setSuccessMessage(SUCCESS_CREATE_PRODUCT);
                return $product_id;
            }else{
                $message->setErrorMessage(ERR_PRODUCT_CREATE);
                return false;
            }
            
        }else{
            $message->setErrorMessage(ERR_PRODUCT_EXISTS);
            return false;
        }
    }

    //GET PRODUCTS COLLECTION
    public static function getProducts($conditions='1',&$messages=""){
        $messages=new Message();
        $result=Db::select(PRODUCT_TABLE_NAME,$conditions);
        if($result){
            return $result;
        }
        $messages->setErrorMessage(ERR_PRODUCT_COLLECTION);
        return false;
    }

    //update a product
    public function update(array $params){
        return Db::update(PRODUCT_TABLE_NAME,$params,"id='$this->id'");
    }

    //delete a product
    public function delete(){
        return Db::delete(PRODUCT_TABLE_NAME,"id='$this->id'");
    }





}