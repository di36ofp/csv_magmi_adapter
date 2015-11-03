<?php
/**
 *
 */

class Uploader{

  public $destination;

  public $uploaded_file;

  public $messages = array();

  public function __construct($file){
    $this->name = $file['name'];
    $this->size = $file['size'];
    $this->tmp_name = $file['tmp_name'];
  }

  public function setDestination($destination = NULL){

    $this->destination = ($destination == NULL) ? IMPORT_DIR : $destination;
  }

  public function getDestination(){

    return $this->destination;
  }

  private function setMessage($msg){
    $this->messages[] = $msg;
  }

  public function getMessage(){
    return $this->messages;
  }

  private function setUploadedName(){
    $this->uploaded_file = $this->name;
  }

  public function getUploadedFile(){
    return $this->uploaded_file;
  }

  public function upload(){

    if(move_uploaded_file($this->tmp_name, $this->getDestination().'/'.$this->name)){
      $this->setMessage('File uploaded');
      $this->setUploadedName();
       $return = true;
    }else{
      $this->setMessage('File doesn\'t uploaded!');
    }
  }

  function deleteUploaded(){
      unlink($this->getDestination().$this->name);
  }

}