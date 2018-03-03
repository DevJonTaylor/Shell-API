<?php
namespace ShellAPI;

use Logger\Log;

class Factory
{
    static protected $logger = null;

    static public function test()
    {
        echo "SUCCESS!\n";
    }

    static public function getLogger($name = 'ShellAPI', $level = 400, $)
    {
        return new Logger();
    }
}