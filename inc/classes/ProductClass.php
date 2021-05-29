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
    private $image_alt;
    private $visibility;
    private $category;
    private $subCategory;
    private $messages;

    public function __construct($productId)
    {
        $product=$this->getProductFullInfo($productId);
        if($product){
            $this->setId($product['id']);
            $this->setPrice($product['price']);
            $this->setTitle($product['title']);
            $this->setDescription($product['description']);
            $this->setInstock($product['instock']);
            $this->setCreated_at($product['created_at']);
            $this->setUpdated_at($product['updated_at']);
            $this->setCreatorId($product['creator_id']);
            $this->setImage($product['image']);
            $this->setVisibility($product['visibility']);
            $this->setCategory();
            $this->setSubCategory();
            $this->setImageAlt($product['image_alt']);
            $this->setMessageHandler();

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

    public function setMessageHandler(){
        $this->messages=new Message();
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

    public function setImageAlt($image_alt){
        $this->image_alt=$image_alt;
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

    public function getMessageHandler(){
        return $this->messages;
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

    public function getImageAlt(){
        return $this->image_alt;
    }



    //create a product
    public static function create(array $params,&$message=""){
        //messages handler
        $message=new Message();

        //VALID IMAGE
        if(!$image=uploadImage($params['image'],$msg)){
            $message->setErrorMessage($msg);
            return false;
        }
        $params['image']=$image;

        //SECURITY OPTION
        $params=validArrayInputs($params);

        //product title
        $title=str_replace("'","\'",$params['title']);
        
        //VALID INPUT PARAMS
        if(!self::validProductTitle($params['title'],$msg)){
            $message->setErrorMessage($msg);
            return false;
        }
      
        if(! self::validProductPrice($params['price'],$msg)){
            $message->setErrorMessage($msg);
            return false;
        }
        
        if(! self::validProductInstock($params['instock'],$msg)){
            $message->setErrorMessage($msg);
            return false; 
        }


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

    //valid title
    public static function validProductTitle($title,&$messages){   
        if(empty($title)){
            $messages=ERR_PRODUCT_EMPTY_TITLE;
            return false;
        }
        return true;
        //some options to valid title 
    }

    //valid price
    public static function validProductPrice($price,&$messages=""){
        if(empty($price)){
            $messages=ERR_PRODUCT_EMPTY_PRICE;
            return false;
        }

        if(!preg_match("/[0-9]/",$price)){
            $messages=ERR_PRODUCT_PRICE_FORMAT;
            return false;
        }

        return true;
    }

    //valid instock
    public static function validProductInstock($instock,&$messages=""){
        if(empty($instock)){
            $messages=ERR_PRODUCT_EMPTY_INSTOCK;
            return false;
        }

        if(!preg_match("/[0-9]/",$instock)){
            $messages=ERR_PRODUCT_INSTOCK_FORMAT;
            return false;
        }

        return true;
    }

    //GET PRODUCTS COLLECTION
    public static function getProducts($conditions='1',$order="id",$orderby="DESC",$limit=false,$perpage="",$offset=1,&$messages=""){
        $messages=new Message();
        $result=Db::select(PRODUCT_TABLE_NAME,$conditions,'All',"*",$limit,$order,$orderby,$perpage,$offset);
        if($result){
            return $result;
        }
        $messages->setErrorMessage(ERR_PRODUCT_COLLECTION);
        return false;
    }

    //update a product
    public function update(array $params,&$message=""){
        //VALID IMAGE
        if(isset($params['image']) && $params['image']){
            $old_img=$this->getImage();
            if(!$image=uploadImage($params['image'],$msg)){
                $this->getMessageHandler()->setErrorMessage($msg);
                return false;
            }
            $params['image']=$image;
            //delete old img
            unlink($old_img);
        }elseif(isset($params['image'])){
            $params['image']=$this->getImage();
        }


        //SECURITY OPTION
        $params=validArrayInputs($params);
        return Db::update(PRODUCT_TABLE_NAME,$params,"id='$this->id'");
    }

    //delete a product
    public function delete(){
            Db::delete(CATEGORY_PRODUCT_TABLE_NAME,"product_id='$this->id'");
            Db::delete(SUB_CATEGORY_PRODUCT_TABLE_NAME,"product_id='$this->id'");
        return Db::delete(PRODUCT_TABLE_NAME,"id='$this->id'");
    }






}