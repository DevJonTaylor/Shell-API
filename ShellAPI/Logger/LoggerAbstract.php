<?php
namespace ShellAPI\Logger;

use Exception;

abstract class LoggerAbstract implements LoggerInterface
{
    const DEBUG = 100;
    const INFO = 200;
    const NOTICE = 250;
    const WARNING = 300;
    const ERROR = 400;
    const CRITICAL = 500;
    const ALERT = 550;
    const EMERGENCY = 600;

    protected $name;
    protected $level;
    protected $path;

    /**
     * LoggerAbstract constructor.
     * @param string $name
     * @param int $level
     * @param string $path
     */
    public function __construct($name, $level, $path = null)
    {
        if(!$path)
            $path = __DIR__;

        $this->name = $name;
        switch(strtolower($level))
        {
            case 'debug':
                $this->level = LoggerAbstract::DEBUG;
                break;
            case 'info':
                $this->level = LoggerAbstract::INFO;
                break;
            case 'notice':
                $this->level = LoggerAbstract::NOTICE;
                break;
            case 'warning':
                $this->level = LoggerAbstract::WARNING;
                break;
            case 'error':
                $this->level = LoggerAbstract::ERROR;
                break;
            case 'critical':
                $this->level = LoggerAbstract::CRITICAL;
                break;
            case 'alert':
                $this->level = LoggerAbstract::ALERT;
                break;
            case 'emergency':
                $this->level = LoggerAbstract::EMERGENCY;
                break;
            default:
                break;
        }
        $this->path = $path;
    }

    protected function log($level, $message)
    {
        if($level >= $this->level)
            $this->write($level, $message);
        return $this;
    }
    public function debug($message)
    {
        return $this->log(LoggerAbstract::DEBUG, $message);
    }
    public function info($message)
    {
        return $this->log(LoggerAbstract::INFO, $message);
    }
    public function notice($message)
    {
        return $this->log(LoggerAbstract::NOTICE, $message);
    }
    public function warning($message)
    {
        return $this->log(LoggerAbstract::WARNING, $message);
    }
    public function error($message)
    {
        return $this->log(LoggerAbstract::ERROR, $message);
    }
    public function critical($message)
    {
        return $this->log(LoggerAbstract::CRITICAL, $message);
    }
    public function alert($message)
    {
        return $this->log(LoggerAbstract::ALERT, $message);
    }
    public function emergency($message)
    {
        return $this->log(LoggerAbstract::EMERGENCY, $message);
    }

    protected function write($level, $message)
    {
        $path = $this->path.DIRECTORY_SEPARATOR.$this->name.'.log';
        try
        {
            $file = file_get_contents($path);
            if(!$file)
                $file = '';
            $level = $this->levelToString($level);
            $log = new stdClass();
            $log->level = $level;
            $log->message = "\n".$message;

            $file = $info
        }

        catch(Exception $e)
        {

        }
    }

    protected function levelToString($level)
    {
        switch($level)
        {
            case 100:
                return 'debug';
                break;
            case 200:
                return 'info';
                break;
            case 250:
                return 'notice';
                break;
            case 300:
                return 'warning';
                break;
            case 400:
                return 'error';
                break;
            case 500:
                return 'critical';
                break;
            case 550:
                return 'alert';
                break;
            case 600:
                return 'emergency';
                break;
        }
    }
}