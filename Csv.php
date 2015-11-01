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

  public $rows;

  public $columns;

  public function __construct($csv_file){

    $this->name = $csv_file['name'];
  }

  public function getRows(){

  }


}