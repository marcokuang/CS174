<?php
/**
 * Created by PhpStorm.
 * User: abcd
 * Date: 12/1/15
 * Time: 7:14 PM
 */

require("dbconfig.php");
$id = filter_input(INPUT_POST, "id");

echo "The id received is ".$id;