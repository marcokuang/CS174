<?php
/**
 * Created by PhpStorm.
 * User: Marco
 * Date: 11/14/2015
 * Time: 10:05 PM
 */
define("HOSTNAME", "localhost");
define("DATABASENAME", "GroupScheduler");
define("DATABASEUSER", "Tester");
define("PASSWORD", "Tester");

try {
// Create connection
    $con = new PDO("mysql:host=".HOSTNAME.";dbname=".DATABASENAME,DATABASEUSER,PASSWORD);
// set the PDO error mode to exception
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    echo $query . "<br>" . $e->getMessage();
}

?>