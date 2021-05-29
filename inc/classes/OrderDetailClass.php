<?php 

use Database\Db;
class OrderDetail{
    private $id;
    private $orderId;
    private $productId;
    private $orderedPrice;
    private $quantity;
    private $sumPrice;

    public function __construct($orderDetailId){
        $this->setId($orderDetailId);

        $orderDetail=$this->getOrderDetailFullInfo($orderDetailId);

        if($orderDetail){
            
            $this->setId($orderDetail['id']);
            $this->setOrderId($orderDetail['order_id']);
            $this->setProductId($orderDetail['product_id']);
            $this->setOrderedPrice($orderDetail['ordered_price']);
            $this->setQuantity($orderDetail['quantity']);
            $this->setSumPrice($orderDetail['sum_price']);
        }
    }

    public function setId($id){
        $this->id=$id;
    }

    public function setOrderId($orderId){
        $this->orderId=$orderId;
    }

    public function setProductId($productId){
        $this->productId=$productId;
    }

    public function setOrderedPrice($orderedPrice){
        $this->orderedPrice=$orderedPrice;
    }

    public function setQuantity($quantity){
        $this->quantity=$quantity;
    }

    public function setSumPrice($sumPrice){
        $this->sumPrice=$sumPrice;
    }

    //GETERS
    public function getId(){
        return $this->id;
    }

    public function getOrderId(){
        return $this->orderId;
    }
    
    public function getProductId(){
        return $this->productId;
    }

    public function getOrderedPrice(){
        return $this->orderedPrice;
    }

    public function getQuantity(){
        return $this->quantity;
    }

    public function getSumPrice(){
        return $this->sumPrice();
    }

    //get order detail info
    private function getOrderDetailFullInfo($orderDetailId){
        return Db::select(ORDER_DETAIL_TABLE_NAME,"id='$this->id'",'single');
    }
}