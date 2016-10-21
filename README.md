# RestApi plugin for CakePHP 3

[![Build Status](https://travis-ci.org/multidots/cakephp-rest-api.svg?branch=master)](https://travis-ci.org/multidots/cakephp-rest-api)

This plugin provides basic support for building REST API services in your CakePHP 3 application.

## Requirements

This plugin has the following requirements:

* CakePHP 3.0.0 or greater.
* PHP 5.4.16 or greater.

## Installation

You can install this plugin into your CakePHP application using [composer](http://getcomposer.org).

The recommended way to install composer packages is:

```
composer require multidots/cakephp-rest-api
```

After installation, [Load the plugin](http://book.cakephp.org/3.0/en/plugins.html#loading-a-plugin)

```php
Plugin::load('MailgunEmail', ['bootstrap' => true]);
```
Or, you can load the plugin using the shell command
```sh
$ bin/cake plugin load -b RestApi
```
