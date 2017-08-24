<?php
error_reporting(E_ALL ^ E_NOTICE);

/*=========== Database Configuraiton ==========*/



$db_host = '-';

$db_user = '-';

$db_pass = '-';

$db_name = '-';



$db_port = 3306;



if(getenv('MYSQLCONNSTR_defaultConnection'))

{

   $value = getenv('MYSQLCONNSTR_defaultConnection');

   $db_host = preg_replace("/^.*Data Source=(.+?);.*$/", "\\1", $value);

   $db_name = preg_replace("/^.*Database=(.+?);.*$/", "\\1", $value);

   $db_user = preg_replace("/^.*User Id=(.+?);.*$/", "\\1", $value);

   $db_pass = preg_replace("/^.*Password=(.+?)$/", "\\1", $value);



  
}

else

{

    foreach ($_SERVER as $key => $value) {

        if (strpos($key, "MYSQLCONNSTR_defaultConnection") !== 0) {

            continue;

        }

        

        $db_host = preg_replace("/^.*Data Source=(.+?);.*$/", "\\1", $value);

        $db_name = 'productsdb';

        $db_user = preg_replace("/^.*User Id=(.+?);.*$/", "\\1", $value);

        $db_pass = preg_replace("/^.*Password=(.+?)$/", "\\1", $value);

    }

}


?>