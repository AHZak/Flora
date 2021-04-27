<?php
//STATIC MESSAGES
class Message{
   // public static $err='text';
   private $errorMessages=[];
   private $warningMessages=[];
   private $successMessages=[];

   //ERRORS
   public function getErrorMessages(){
      return $this->errorMessages;
   }

   public function setErrorMessage($value){
      array_push($this->errorMessages,$value);
   }

   //WARNINGS
   public function getWarningMessages(){
      return $this->warningMessages;
   }

   public function setWarningMessage($value){
      array_push($this->warningMessages,$value);
   }

   //SUCCESS
   public function getSuccessMessages(){
      return $this->successMessages;
   }

   public function setSuccessMessage($value){
      array_push($this->successMessages,$value);
   }

   //SHOW ERROR MESSAGES
   public function showError($errorMessage){
      if(in_array($errorMessage,$this->errorMessages)){
         echo $errorMessage;
      }else{
         echo "";
      }
   }

   //SHOW ERROR MESSAGES
   public function showWarning($warningMessage){
      if(in_array($warningMessage,$this->warningMessages)){
         echo $warningMessage;
      }else{
         echo "";
      }
   }

         //SHOW ERROR MESSAGES
   public function showSuccess($successMessage){
      if(in_array($successMessage,$this->successMessages)){
         echo $successMessage;
      }else{
         echo "";
      }
   }

   public function showMessages(){
      $messages=array_merge($this->successMessages,$this->errorMessages,$this->warningMessages);
      show($messages);
   }
}