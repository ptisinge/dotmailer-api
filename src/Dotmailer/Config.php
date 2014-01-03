<?php

namespace Dotmailer;

use Symfony\Component\Yaml\Parser;

class Config
{
    protected $config;

    public function __construct($config_file)
    {
        $this->load();
    }

    private function load() {
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
