<?php
namespace Logger;
class Logger
{

    public $logger = [];
    public $level;
    public $message;

    public function addLogger($logger)
    {
        $this->logger[$logger->getLevels()] = $logger;

        return $this->logger;
    }

    public function log(string $level, string $message)
    {
        $this->level = $level;
        $this->message = $message;

        $log = $this->logger[$level];
        $log->fileWrite($level, $message);
    }
}