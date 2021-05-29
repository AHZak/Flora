<?php

//ORDER CLASS
use Database\Db;

class Order{
    private $id;
    private $code;
    private $status;
    private $paymentMethodId;
    private $shippingId;
    private $sumPrice;
    private $postalPrice;
    private $customerId;
    private $createdAt;
    private $role;
    private $addressId;


    public function __construct($orderId)
    {
        $orderData=$this->getOrderFullInfo($orderId);

        if($orderData){
            $this->setId($orderId);
            $this->setCode($orderData['code']);
            $this->setStatus($orderData['status']);
            $this->setPaymentMethodId($orderData['payment_method_id']);
            $this->setShippingId($orderData['shipping_id']);
            $this->setSumPrice($orderData['sum_price']);
            $this->setCustomerId($orderData['customer_id']);
            $this->setCreatedAt($orderData['created_at']);
            $this->setCustomerRole($orderData['customer_role']);
            $this->setAddressId($orderData['address_id']);
            $this->setPostalPrice($orderData['postal_price']);
        }
    }

    //SETERS
    public function setId($id){
        $this->id=$id;
    }
    public function setCode($code){
        $this->code=$code;
    }

    public function setStatus($status){
        $this->status=$status;
    }

    public function setPaymentMethodId($payMethodId){
        $this->paymentMethodId=$payMethodId;
    }

    public function setShippingId($shippingId){
        $this->shippingId=$shippingId;
    }

    public function setSumPrice($sumPrice){
        $this->sumPrice=$sumPrice;
    }

    public function setCustomerId($customerId){
        $this->customerId=$customerId;
    }

    public function setCreatedAt($createdAt){
        $this->createdAt=$createdAt;
    }

    public function setCustomerRole($role){
        $this->role=$role;
    }

    public function setAddressId($addressId){
        $this->addressId=$addressId;
    }

    public function setPostalPrice($postalprice){
        $this->postalPrice=$postalprice;
    }

    //GETERS
    public function getId(){
        return $this->id;
    }

    public function getCode(){
        return $this->code;
    }

    public function getStatus(){
        return $this->status;
    }

    public function getPaymentMethodId(){
        return $this->paymentMethodId;
    }

    public function getShippingId(){
        return $this->shippingId;
    }

    public function getSumPrice(){
        return $this->sumPrice;
    }

    public function getCustomerId(){
        return $this->customerId;
    }

    public function getCreatedAt(){
        return $this->createdAt;
    }

    public function getCustomerRole(){
        return $this->role;
    }

    public function getAddressId(){
        return $this->addressId;
    }

    public function getPostalPrice(){
        return $this->postalPrice;
    }


    //GET OEDER FULL INFO
    private function getOrderFullInfo($id){
        return Db::select(ORDERS_TABLE_NAME,"id='$id'","single");
    }

    //UPDATE
    public function update(array $params){
        return Db::update(ORDERS_TABLE_NAME,$params,"id='$this->id'");
    }

    public static function create(array $params,&$message){
        $message=new Message();
        $result=Db::insert(ORDERS_TABLE_NAME,$params);
        if($result){
            return $result;
        }else{
            //$message->setErrorMessage(ERR_ORDER_CREATE);
            return false;
        }
    }

    public static function getOrders($condition=1,$distinct='id',$order='created_at',$orderBy='desc',$limit=false,$perpage="",$offset=1){
        return Db::select(ORDERS_TABLE_NAME,$condition,"all",$distinct,$limit,$order,$orderBy,$perpage,$offset);
    }

    //GET ORDERS DETAIL
    public function getOrdersDetail(){
        return Db::select(ORDER_DETAIL_TABLE_NAME,"order_id='$this->id'");
    }
}