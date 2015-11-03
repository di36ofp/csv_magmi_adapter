<?php
/**
 * CSV MAGMI adapter
 *
 * @author Diego P. Suárez <info@diego-suarez.es>
 * @package CSV_Magmi_adapter
 * @copyright Copyright (c) 2015 Tiempo Libre.
 * @license http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

class Csv{

  public $name;

  public $size;

  public $header;

  public $rows;

  public $columns;

  private $content;

  public function __construct($csv_file_name){

    $this->name = $csv_file_name;
    $this->readCsv();
  }

  private function readCsv(){

    $this->content = fopen(IMPORT_DIR.'/'.$this->name, 'r');
  }

  private function getCsvContent(){
    return $this->content;
  }

  public function getCsvRows(){
    $rows = array();
    $setup_header = false;
    while (($line = fgetcsv($this->getCsvContent())) !== FALSE) {
      if(!$setup_header){
        $this->setCsvHeader($line[0]);
        $setup_header = true;
      }

      $rows[] = $line;
    }
    return $rows;
  }

  private function setCsvHeader($line){
    $this->header = explode(';', $line);
  }

  public function countCsvRows(){
    return count($this->getCsvRows());
  }


}