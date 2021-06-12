<?php 
use Database\Db;
class Slider{
    private $id;
    private $imgUrl;
    private $creatorId;
    
    public function __construct($sliderId){
        $this->id=$sliderId;
        $slider=$this->getSliderFullInfo($this->id);
        if($slider){
            $this->imgUrl=$slider['image_url'];
            $this->creatorId=$slider['image_url'];
        }else{
            return false;
        }
    }

    public function setImgUrl($url){
        $this->imgUrl=$url;
    }

    public function getId(){
        return $this->id;
    }

    public function getImgUrl(){
        return $this->imgUrl;
    }

    public function getCreatorId(){
        return $this->creatorId;
    }

    public function getSliderFullInfo($id){
        if($id){
            return Db::select(SLIDER_TABLE_NAME,"id='$this->id'",'single');
        }else{
            return false;
        }
    }

    public function update(array $params){
        return Db::update(SLIDER_TABLE_NAME,$params,"id='$this->id'");
    }

}