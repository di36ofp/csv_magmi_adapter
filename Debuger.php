<?php
/**
 * CSV MAGMI adapter
 *
 * @author Diego P. Suárez <info@diego-suarez.es>
 * @package CSV_Magmi_adapter
 * @copyright Copyright (c) 2015 Tiempo Libre.
 * @license http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

class Debuger{
  public function __construct(){

  }

  public function debug($arg){
    print "<pre>";
    // print_r(debug_backtrace());
    print_r($arg);
    print "<pre>";
  }
}

