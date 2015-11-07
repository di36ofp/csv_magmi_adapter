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

  public $rows = array();

  public $columns = array();

  private $content;

  public function __construct($csv_file_name){

    $this->name = $csv_file_name;
    $this->readCsv();
  }

  private function readCsv(){

    $this->content = fopen(IMPORT_DIR.'/'.$this->name, 'r');
  }

  public function closeCsv(){
    fclose($this->content);
  }

  private function getCsvContent(){
    return $this->content;
  }

  public function getCsv(){
    $setup_header = false;

    while (($line = fgetcsv($this->getCsvContent(), 1000, ";")) !== FALSE) {
      if(!$setup_header){
        $this->setCsvHeader($line);
        $setup_header = true;
      }else{
        $this->setCsvRows($line);
      }
    }
  }

  public function getCsvRows(){
    return $this->rows;
  }

  private function setCsvRows($line){
    $tmp = array_combine($this->header, $line);
    $this->rows[] = $tmp;
  }

  public function getCsvHeader(){
    return $this->header;
  }

  private function setCsvHeader($line){
    $this->header = $line;
  }

  public function countCsvRows(){
    return count($this->getCsvRows());
  }

  public function getTotalColumns(){
    return count($this->header);
  }

}