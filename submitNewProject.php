<?php
//include_once("header.php");
require("dbconfig.php");

function printSelectMenu($data)
{
    foreach ($data as $row) {
        // Data row.
        echo "<option value='" . $row["SJSUID"] . "'>" . $row["FirstName"] . " " . $row["LastName"] . "</option>\n";
    }
}

//display the content of the project todoTable
$SJSUID = filter_input(INPUT_POST, "SJSUID");
$userPassword = filter_input(INPUT_POST, "Password");

try {
    $query = "SELECT SJSUID, FirstName, LastName FROM UserTable";
    $data = $con->query($query);
    $data->setFetchMode(PDO::FETCH_ASSOC);

    // $data is an array.
    if (count($data) > 0) {
        printSelectMenu($data);
    } else {
        print "<h2>(...No User is in the databse...)</h3>\n";
    }
} catch (PDOException $e) {
    echo 'ERROR:' . $e->getMessage();

}