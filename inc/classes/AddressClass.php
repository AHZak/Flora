<?php

//address
use Database\Db;

class Address{

    private $id;
    private $address;
    private $unit;
    private $floor;
    private $postalCode;
    private $userPhone;
    private $title;
    private $addressExplain;

    public function __construct($addressId)
    {
        $this->id=$addressId;
        $address=$this->getAddressFullInfo($addressId);
        if($address){
            $this->setTitle($address['title']);
            $this->setFloor($address['floor']);
            $this->setUnit($address['unit']);
            $this->setUserPhone($address['user_phone']);
            $this->setAddress($address['address']);
            $this->setAddressExplain($address['address_explain']);
            $this->setPostalCode($address['postal_code']);
        }
    }

    //SETERS
    public function setAddress($address){
        $this->address=$address;
    }

    public function setUnit($unit){
        $this->unit=$unit;
    }

    public function setFloor($floor){
        $this->floor=$floor;
    }

    public function setUserPhone($userPhone){
        $this->userPhone=$userPhone;
    }

    public function setTitle($title){
        $this->title=$title;
    }

    public function setAddressExplain($addressExplain){
        $this->addressExplain=$addressExplain;
    }

    public function setPostalCode($postalCode){
        $this->postalCode=$postalCode;
    }



    //GETERS
    public function getId(){
        return $this->id;
    }
    public function getAddress(){
        return $this->address;
    }

    public function getPhone(){
        return $this->userPhone;
    }

    public function getTitle(){
        return $this->title;
    }

    public function getUnit(){
        return $this->unit;
    }

    public function getFloor(){
        return $this->floor;
    }

    public function getAddressExplain(){
        return $this->addressExplain;
    }

    public function getPostalCode(){
        return $this->postalCode;
    }


    //GET ADRESS INFO
    private function getAddressFullInfo($addressId){
        return Db::select(ADDRESS_TABLE_NAME,"id='$addressId'",'single');
    }

    public static function create(array $params){
        $result=Db::insert(ADDRESS_TABLE_NAME,$params);

        //SET MESSAGES
        if($result){
            return $result;
        }else{
            return false;
        }
    }

    //get address
    public static function getAddresses($userPhone){
        return Db::select(ADDRESS_TABLE_NAME,"user_phone='$userPhone'","all","*",0,"created_at","DESC");
    }

    //update
    public function update(array $params){
        return Db::update(ADDRESS_TABLE_NAME,$params,"id='$this->id'");
    }

    //delete
    public function delete(){
        return Db::delete(ADDRESS_TABLE_NAME,"id='$this->id'");
    }
}