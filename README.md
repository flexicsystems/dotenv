DotEnv Component
========================

The DotEnv component defines an object-oriented layer for the loading of environment variables from .env files

Resources
---------

* [Documentation](https://www.themepoint.de/)
* [Issue reporting](https://github.com/flexicsystems/flexic/issues)

Examples
--------

```php
$dot_env = new \Flexic\DotEnv\DotEnv();

$data = $dot_env->parseFile('/path/to/dot/env/file/');
$dot_env->populate($data);

# Variables from .env file are now avaiable in $_ENV array
```
