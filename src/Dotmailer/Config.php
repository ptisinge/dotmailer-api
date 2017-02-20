<?php

namespace Dotmailer;

use Symfony\Component\Yaml\Parser;

class Config
{
    protected $config;

    public function __construct($config_file = null, $config_data = null)
    {
        if($config_file === null) {
            $this->config = $config_data;
            return;
        }

        $parser = new Parser();
        $this->config = $parser->parse(file_get_contents($config_file));
    }

    public function __get($key)
    {
        if (isset($this->config[$key])) {
            return $this->config[$key];
        } else {
            return null;
        }
    }
}
