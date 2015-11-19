<?php
//include_once("header.php");
require("dbconfig.php");

function printTable($data)
{
    // Construct the HTML table row by row.
//    echo "<ul id='dropDown' class='dropdown-menu'>";
    foreach ($data as $row) {

        // Data row.
        echo "<option value='" . $row["SJSUID"] . "'>" . $row["FirstName"] . " " . $row["LastName"] . "</option>\n";
    }
//    echo "</ul>";

}

//display the content of the project todoTable
//print "<h1>Project TodoTable</h1>";
$SJSUID = filter_input(INPUT_POST, "SJSUID");
$userPassword = filter_input(INPUT_POST, "Password");

try {
    $query =
        "SELECT SJSUID, FirstName, LastName FROM UserTable";

//    $result = $con->query($query);
    // $data = $result->fetch(PDO::FETCH_ASSOC);
    $data = $con->query($query);
    $data->setFetchMode(PDO::FETCH_ASSOC);
    // $data is an array.
    if (count($data) > 0) {
        printTable($data);
    } else {
        print "<h2>(...No User is in the databse...)</h3>\n";
    }
} catch (PDOException $e) {
    echo 'ERROR:' . $e->getMessage();

}