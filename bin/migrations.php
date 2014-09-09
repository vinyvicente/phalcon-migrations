#!/usr/bin/php
<?php

require 'vendor/autoload.php';

$migrations = new \Phalcon\DbMigrations();
$migrations->generate();
