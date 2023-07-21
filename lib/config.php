<?php

date_default_timezone_set('America/Bogota');


require_once  __DIR__."/php-activerecord/ActiveRecord.php";

ActiveRecord\Config::initialize(function($cfg)
{
   $cfg->set_model_directory(__DIR__.'/../models/');
  //  $cfg->set_model_directory(__DIR__.'/../models/Essays');
   $cfg->set_connections(
     array(
       'development' => 'mysql://root:@localhost:3306/smart_info',
       'test' => 'mysql://root:@localhost:3306/smart_info',
       'production' => 'mysql://root:@localhost:3306/smart_info'
     )
   );
});