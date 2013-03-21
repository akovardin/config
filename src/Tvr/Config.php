<?php

namespace Tvr;

class Config
{
    private $config;

    public function __construct($config)
    {
        $this->config = $config;
    }

    public function getParam($name, $default = false)
    {
        $path = explode('.', $name);

        $value =  $this->config;
        foreach ($path as $param) {
            if (isset($value[$param])) {
                $value = $value[$param];
            } else {
                return $default;        
            }
        }
        
        return $value;
    }

    public function setParam($name, $value)
    {
        $path = explode('.', $name);

        for ($i = count($path)-1; $i >= 0 ;$i--) {
               $value = array($path[$i] => $value);
        }
        $this->config = array_merge_recursive($this->config, $value);
        return $this;
    }
}