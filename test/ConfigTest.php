<?php

use \Tvr\Config;

class ConfigTest extends PHPUnit_Framework_TestCase
{
    public $config = null;

    public function configProvider()
    {
        return array(
            'this' => array(
                'my' => 'one',
                'config' => array(
                    'param1' => 3.14,
                    'param2' => 'simpletest'
                )
            )
        );
    }

    public function setUp()
    {
        $this->config = new Config($this->configProvider());
    }

    /**
     * @dataProvider configProvider
     */ 
    public function testConstructConfig($configData)
    {
        $config = new Config($configData);

        if ($config) {
            $this->assertTrue(true);
        }
    }

    public function testGetNormalParam()
    {
        $this->assertSame($this->config->getParam('this.config.param1'), 3.14);
        $this->assertSame($this->config->getParam('this.config.param2'), 'simpletest');
        $this->assertSame(
                    $this->config->getParam('this.config'), array(
                        'param1' => 3.14,
                        'param2' => 'simpletest'
                    )
        );
    }

    public function testGetDefaultParam()
    {
        $this->assertSame($this->config->getParam('this.path.is.bad', 4), 4);
        $this->assertSame($this->config->getParam('this.path.is.bad', 'foo'), 'foo');
    }

    public function testGetNonIssetParam()
    {
        $this->assertNull($this->config->getParam('this.path.is.bad'));
    }

    public function testSetParam()
    {
        $this->config->setParam('this.param.is.bad', 'some string');
        $this->assertSame($this->config->getParam('this.param.is.bad'), 'some string');
    }

    public function testSetParamWhisBadName()
    {
        $this->config->setParam('this.config.param2', 'some string');
        $this->assertSame($this->config->getParam('this.config.param2'), 'some string');
    }
}