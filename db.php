<?php
     define('_HOST_NAME','localhost');
     define('_DATABASE_NAME','coastalcove');
     define('_DATABASE_USER_NAME','root');
     define('_DATABASE_PASSWORD','root');
 
    // What line should be here?

    $connection = new MySQLi(_HOST_NAME, _DATABASE_USER_NAME, _DATABASE_PASSWORD, _DATABASE_NAME);
  
     if($connection->connect_errno)
     {
       die("ERROR : -> ".$connection->connect_error);
     }