<?php

namespace Logger;

class FileLogger
{

    public $params = [];

    public function __construct($params)
    {
        $this->params = $params;
    }

    public function getLevels() {
        return $this->params['levels'][0] ?? '004';
    }

    public function fileWrite($level, $message) {
        $logFileName = $this->params['filename'];
        $text = '';
        $text .= date('Y-m-d H:i:s') . ' ' . $level . ' ' . $message . "\n";
        file_put_contents($logFileName, $text, FILE_APPEND);
    }
//2016-05-30T09:50:57+00:00  001  ERROR  Error message
}