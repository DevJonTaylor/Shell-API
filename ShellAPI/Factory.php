<?php
namespace ShellAPI;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use ShellAPI\Options\Factory\OptionsAbstract as Options;

use Exception;

class Factory extends Options
{
    static protected $logger = null;

    static public function getLogger($name = 'ShellAPI', $level = 0, $path = '')
    {
        if($level === 0)
            $level = self::get('Logger.Level');

        if($path === '')
            $path = self::get('Logger.Path');

        if($path === 'root')
        {
            $pathArray = explode(DIRECTORY_SEPARATOR, __DIR__);
            array_pop($pathArray);
            $pathArray[] = 'Logs';
            $pathArray[] = "$name.log";
            $path = implode(DIRECTORY_SEPARATOR, $pathArray);
        }

        $log = new Logger($name);
        try
        {
            $log->pushHandler(new StreamHandler($path, $level));
            return $log;
        }

        catch (Exception $e)
        {
            // TODO:  Deal with exceptions.
            return false;
        }
    }

    static public function getStorage()
    {
        
    }
}