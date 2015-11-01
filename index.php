<?php
/**
 * CSV MAGMI adapter
 *
 * @author Diego P. Suárez <info@diego-suarez.es>
 * @package CSV_Magmi_adapter
 * @copyright Copyright (c) 2015 Tiempo Libre.
 * @license http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

if (version_compare(phpversion(), '5.3.0', '<')===true) {
    echo  '<div style="font:12px/1.35em arial, helvetica, sans-serif;">
            <div style="margin:0 0 25px 0; border-bottom:1px solid #ccc;">
              <h3 style="margin:0; font-size:1.7em; font-weight:normal; text-transform:none; text-align:left; color:#2f2f2f;">
              Whoops, it looks like you have an invalid PHP version.</h3>
            </div>
            <p>This software supports PHP 5.3.0 or newer.</p>
          </div>';
    exit;
}

ini_set('display_errors', 1);

set_error_handler('exception_error_handler');

function exception_error_handler($errno, $errstr, $errfile, $errline ) {
    throw new ErrorException($errstr, 0, $errno, $errfile, $errline);
}

require 'includes.php';