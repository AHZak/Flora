<?php

//SHIPPING
use Database\Db;

class Shipping{
    private $id;
    private $type;
    private $description;
    private $price;

    public function __construct($shippingId){
        $shippingInfo=$this->getShippingFullInfo($shippingId);
        if($shippingInfo){
            $this->setId($shippingInfo['id']);
            $this->setType($shippingInfo['shipping_type']);
            $this->setDescription($shippingInfo['description']);
            $this->setPrice($shippingInfo['price']);
        }
    }


    //SETERS
    public function setId($id){
        $this->id=$id;
    }

    public function setType($type){
        $this->type=$type;
    }

    public function setDescription($description){
        $this->description=$description;
    }

    public function setPrice($price){
        $this->price=$price;
    }

    //GETERS
    public function getId(){
        return $this->id;
    }

    public function getType(){
        return $this->type;
    }

    public function getDescription(){
        return $this->description;
    }

    public function getPrice(){
        return $this->price;
    }

    //GET SHIPPING FULL INFo
    private function getShippingFullInfo($id){
        return Db::select(SHIPPING_TABLE_NAME,"id='$id'","single");
    }

    //GET SHIPPINGS
    public static function getShippings($condition=1,$order="id",$orderby="asc"){
        return Db::select(SHIPPING_TABLE_NAME,$condition,'all',"*",0,$order,$orderby);
    }

    //UPDATE
    public function update(array $params){
        return Db::update(SHIPPING_TABLE_NAME,$params,"id='$this->id'");
    }

}