<?php
/**
 * Created by PhpStorm.
 * User: abcd
 * Date: 11/19/15
 * Time: 9:06 AM
 */
require("dbconfig.php");

function printTable($data)
{
    // We're going to construct an HTML table.
    print "<div  class = 'row'>";
    echo "<div class='col-md-6 table-responsive'>";
    print "    <table id = 'resultTable' class='table table-hover'>\n";

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
    echo "</div>";
    print "</div>\n";
}

//display the content of the project todoTable
print "<h1>Project Todo Table</h1>";
$SJSUID = filter_input(INPUT_GET, "q");
try {
    $query =
        "SELECT ProjectName, TodoTitle
FROM ProjectTable, ProjectTodoTable, UserTodoTable
WHERE ProjectTable.ProjectID = ProjectTodoTable.ProjectID
AND ProjectTable.ProjectID = UserTodoTable.ProjectID
AND UserTodoTable.SJSUID = :id;";

    $ps = $con->prepare($query);
    echo "hehehehe   ". $SJSUID;
    $ps->execute(array(':id' => $SJSUID));
    $data = $ps->fetchAll(PDO::FETCH_ASSOC);

//    $result = $con->query($query);
//    // $data = $result->fetch(PDO::FETCH_ASSOC);
//    $data = $con->query($query);
//    $data->setFetchMode(PDO::FETCH_ASSOC);
    // $data is an array.
    if (count($data) > 0) {
        printTable($data);
    } else {
        print "<h2>(No existing ToDos found...)</h3>\n";
    }
} catch (PDOException $e) {
    echo 'ERROR:' . $e->getMessage();

}
