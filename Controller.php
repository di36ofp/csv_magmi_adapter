<?php
/**
 * CSV MAGMI adapter
 *
 * @author Diego P. Suárez <info@diego-suarez.es>
 * @package CSV_Magmi_adapter
 * @copyright Copyright (c) 2015 Tiempo Libre.
 * @license http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
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
    $d = new Debuger();
    $d->debug($csv->getCsvRows());
    $d->debug($csv->getCsvHeader());
    //$csv->closeCsv();
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