## Simple config class

Usage:

```php
<?php

use \Tvr\Config;

$config = new Config(__DIR__.'/../data/mainconfig.php');
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

Install from packagist

```
{
    "require": {
        "tvr/config": "v1.0.1"
    }
}
```