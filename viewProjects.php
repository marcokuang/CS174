<?php
//include_once("header.php");
require("dbconfig.php");

function printTable($data)
{
    // We're going to construct an HTML table.
    print "<div  class = \"resultTable\">";
    print "    <table id = \"resultTable\" border='1'>\n";

    // Construct the HTML table row by row.
    $printHeaderFlag = true;
    foreach ($data as $row) {
        // print header info
        if ($printHeaderFlag) {
            print "<tr>\n";
            foreach ($row as $name => $value) {
                print "<th>$name</th>\n";
            }
            print "</tr>\n";
            $printHeaderFlag = false;
        }

        // Data row.
        print "<tr>\n";
        foreach ($row as $name => $value) {
            print "<td>$value</td>\n";
        }
        print "</tr>\n";
    }

    print "</table>\n";
    print "</div>\n";
}

//display the content of the project todoTable
print "<h1>Project Todo Table</h1>";
$SJSUID = filter_input(INPUT_POST, "SJSUID");
$userPassword = filter_input(INPUT_POST, "Password");

try {
    $query =
        "SELECT ProjectName, TodoTitle
            FROM ProjectTable, ProjectTodoTable
            WHERE ProjectTable.ProjectID = ProjectTodoTable.ProjectID";

    $result = $con->query($query);
    // $data = $result->fetch(PDO::FETCH_ASSOC);
    $data = $con->query($query);
    $data->setFetchMode(PDO::FETCH_ASSOC);
    // $data is an array.
    if (count($data) > 0) {
        printTable($data);
    } else {
        print "<h2>(Error...)</h3>\n";
    }
} catch (PDOException $e) {
    echo 'ERROR:' . $e->getMessage();

}