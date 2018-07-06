<?php
namespace App\Support\Logger;

use Monolog\Formatter\LineFormatter;
use Monolog\Handler\RotatingFileHandler;
use Monolog\Logger;

class Factory implements FactoryInterface
{
    public static $instances = [];

    private function getClient($name)
    {
        $monolog = new Logger('factory');

        $log_path = storage_path('logs') . '/' . $name . '.log';

        $handler = new RotatingFileHandler($log_path, 5, Logger::DEBUG, true, 0777);
        $monolog->pushHandler($handler);

        $formatter = new LineFormatter(null, null, true, true);
        $handler->setFormatter($formatter);

        return $monolog;
    }

    public function getLogger($name)
    {
        if (!isset(self::$instances[$name]) || !(self::$instances[$name] instanceof Logger)) {
            self::$instances[$name] = $this->getClient($name);
        }
        return self::$instances[$name];
    }


}