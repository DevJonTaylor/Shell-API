<?php
include_once(__DIR__ . '/index.php');
use ShellAPI\Factory;


$log = Factory::getLogger();
$log->emerg('DANGER TEST IS ALIVE!!!');

