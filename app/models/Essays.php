<?php
require_once  __DIR__."/../../lib/php-activerecord/ActiveRecord.php";
require_once __DIR__.'/../../lib/config.php';

class Essays extends ActiveRecord\Model {
    public static $table_name = "essays";

}
