<?php

//User
use Database\Db;
class User {
    private $id;
    private $firstName;
    private $lastName;
    private $phone;
    private $password;
    private $email;
    private $isVarified;
    private $registerCode;
    private $createdAt;
    private $updatedAt;

    public function __construct($userId)
    {
        $user=$this->getUserFullInfo($userId);
        if($user){
            $this->setId($user['id']);
            $this->setFirstName($user['FName']);
            $this->setLastName($user['LName']);
            $this->setEmail($user['email']);
            $this->setPhone($user['phone']);
        }
    }

    private function getUserFullInfo($userId){
        return Db::select(USER_TABLE_NAME,"id='$userId'","single");
    }

    //SETERS
    public function setId($id){
        $this->id=$id;
    }

    public function setFirstName($fn){
        $this->firstName=$fn;
    }

    public function setLastName($ln){
        $this->lastName=$ln;
    }

    public function setPhone($phn){
        $this->phone=$phn;
    }

    public function setEmail($em){
        $this->email=$em;
    }

    //GETERS
    public function getId(){
        return $this->id;
    }

    public function getFirstName(){
        return $this->firstName;
    }

    public function getLastName(){
        return $this->lastName;
    }

    public function getPhone(){
        return $this->phone;
    }

    public function getEmail(){
        return $this->email;
    }

}