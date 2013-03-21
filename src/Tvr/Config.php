<?php
/**
* Config class file
* 
* @author horechek@gmail.com
* @link http://tvorzasp.com
* @copyright @horechek
* @license http://doc.tvorzasp.com/COPYING.txt
*/

namespace Tvr;

/**
 * Main Config class
 * 
 * @author horechek@gmail.com
 * @version 0.1
 * @package Tvr
 */
class Config
{   
    private $config = array();

    public function __construct($config)
    {
        $this->config = $config;
    }

    public function getParam($name, $default = null)
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
        $this->config = array_merge($this->config, $value);
        return $this;
    }
}