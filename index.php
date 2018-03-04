<?php
/**
 * @author Jon Taylor
 * @since 1.0
 * @version 1.0
 * @define This is a one stop shop for many different tools.
 *          As I grow so will this.  Feel free to add and make it your own
 *          and of course share!  <3
 */

$DS = DIRECTORY_SEPARATOR;

include_once __DIR__ . $DS . 'ShellAPI'. $DS . 'vendor' . $DS . 'autoload.php';

function my_autoloader($class)
{
    $DS = DIRECTORY_SEPARATOR;
    $filename = __DIR__ . $DS . str_replace('\\', $DS, $class) . '.php';
    include_once($filename);
}
spl_autoload_register('my_autoloader');