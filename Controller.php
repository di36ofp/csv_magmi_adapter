<?php
/**
 *
 */
class Controller{
  public function index(){
    include 'views/layout.php';
  }

  public function retrieveData($data){

    $error = array();
    if($data['file']['csv_file']['error'] != 0){
      $error[] = 'Some error in file';
    }
    if($data['file']['csv_file']['type'] != 'text/csv') {
     $error[] = 'File must be a valid CSV';
    }
    if(count($error)) $this->setError($error);

    $file = new Uploader($data['file']['csv_file']);
    $file->setDestination();
    $file->upload();

    $csv = new Csv($file->getUploadedFile());
    $csv->getCsvRows();
    $csv->countCsvRows();
  }

  public function setError($options){

  }

}

if($_SERVER['REQUEST_METHOD'] == 'GET'){

  $action = new Controller();
  $action->index();

}elseif($_SERVER['REQUEST_METHOD'] == 'POST'){

  $data = array();
  $data['content'] = $_POST;
  $data['file'] = $_FILES;
  $action = new Controller();
  $action->retrieveData($data);

}elseif(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest'){

}