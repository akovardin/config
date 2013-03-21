## Simple config file

Usage:

```php
<?php
$this->config = new Config(__DIR__.'/../data/mainconfig.php');
echo $config->getParam('this.config.param1');
?>
```

Mainconfig file:

```php
<?php
return array(
    'this' => array(
        'my' => 'one',
        'config' => array(
            'param1' => 3.14,
            'param2' => 'simpletest'
        )
    )
);
?>
```