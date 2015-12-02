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

try {
    $query =
        "DELETE FROM mydb.ProjectTodoTable WHERE ProjectTodoID= :id";

    $ps = $con->prepare($query);
    $ps->execute(array(':id' => $id));



} catch (PDOException $e) {
    echo 'ERROR:' . $e->getMessage();
}