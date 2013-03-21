<?php

use \Tvr\Config;

class ConfigTest extends PHPUnit_Framework_TestCase
{
    public function testConstructConfig()
    {
        $configParams = include __DIR__.'/../date/mainconfig.php';
        $config = new Config($configParams);

        if ($config) {
            $this->assertTrue(true);
        }
    }

    public function testGetNormalParam()
    {

    }

    public function testGetDefaultParam()
    {

    }

    public function testGetNonIssetParam()
    {

    }

    public function testSetParam()
    {

    }

    public function testSetBadParam()
    {

    }

    public function testSetParamWhisBadName()
    {
        
    }
}