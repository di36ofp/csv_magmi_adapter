<?php
/**
 * CSV MAGMI adapter
 *
 * @author Diego P. Suárez <info@diego-suarez.es>
 * @package CSV_Magmi_adapter
 * @copyright Copyright (c) 2015 Tiempo Libre.
 * @license http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

ini_set('display_errors', 1);

set_error_handler('exception_error_handler');

define('IMPORT_DIR', $_SERVER['DOCUMENT_ROOT'].'/csv_import');

define('EXPORT_DIR', $_SERVER['DOCUMENT_ROOT'].'/csv_export');

define('ENCODE_REQ', 'UTF-8');

define('CSV_SEPARATOR', ';');

function exception_error_handler($errno, $errstr, $errfile, $errline ) {
    throw new ErrorException($errstr, 0, $errno, $errfile, $errline);
}

try {
  if (!file_exists(IMPORT_DIR)) {
    mkdir(IMPORT_DIR, 0777, true);
  }
  if (!file_exists(EXPORT_DIR)) {
    mkdir(EXPORT_DIR, 0777, true);
  }
} catch(ErrorException $ex) {
  if(substr($ex->getMessage(), 'Permission denied')){
    echo 'Error: Permission denied, verify your '.$_SERVER['DOCUMENT_ROOT'].' dir is writable.';
  }
}



