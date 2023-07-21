<?php
date_default_timezone_set('America/Bogota');

require_once __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

require_once  __DIR__."/php-activerecord/ActiveRecord.php";

ActiveRecord\Config::initialize(function($cfg)
{
   $cfg->set_model_directory(__DIR__.'/../models/');
  //  $cfg->set_model_directory(__DIR__.'/../models/Essays');
   $cfg->set_connections(
     array(
       'development' => 'mysql://'.$_ENV['DATABASE_USER'].':'.$_ENV['DATABASE_PASSWORD'].'@'.$_ENV['DATABASE_HOST'].':'.$_ENV['DATABASE_PORT'].'/'.$_ENV['DATABASE_NAME'],
       'test' => 'mysql://'.$_ENV['DATABASE_USER'].':'.$_ENV['DATABASE_PASSWORD'].'@'.$_ENV['DATABASE_HOST'].':'.$_ENV['DATABASE_PORT'].'/'.$_ENV['DATABASE_NAME'],
       'production' => 'mysql://'.$_ENV['DATABASE_USER'].':'.$_ENV['DATABASE_PASSWORD'].'@'.$_ENV['DATABASE_HOST'].':'.$_ENV['DATABASE_PORT'].'/'.$_ENV['DATABASE_NAME']
     )
   );
});