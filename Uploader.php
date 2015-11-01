<?php
/**
 *
 */

class Uploader{

  public $destination;

  public function __construct($file){
    $this->name = $file['name'];
    $this->size = $file['size'];
    $this->tmp_name = $file['tmp_name'];
  }

  public function setDestination($destination = null){

    $this->destination = ($destination == NULL) ? IMPORT_DIR : $destination;
  }

  public function upload(){

  }
}