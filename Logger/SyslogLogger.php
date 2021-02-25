<?php
namespace Logger;

class SyslogLogger
{

    public $params = [];

    public function __construct($params)
    {
        $this->params = $params;
    }

    public function getLevels() {
        return $this->params['levels'][0];
    }

}