<?php

include_once("header.php");
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

//display the content of the project todo table

$SJSUID = filter_input(INPUT_POST, "SJSUID");
$userPassword = filter_input(INPUT_POST, "Password");

print "<h1>Personal Todo Table</h1>";

try {

    // prepareStatement

    $query = "SELECT SJSUID FROM UserLoginTable Where UserLoginTable.SJSUID = :id AND UserLoginTable.Password = :pwd";

    $ps = $con->prepare($query);
    $ps->execute(array(':id' => $SJSUID, ':pwd' => $userPassword));
    $data = $ps->fetchAll(PDO::FETCH_ASSOC);

    // $data is an array.
    // if the data>0 is ture, it means one matching SJSU ID is found in the database so the next step is to print the array out.
    if (count($data) > 0) {
        //printTable($data);

        $query2 = "select DISTINCT ProjectTable.ProjectName, ProjectTodoTable.ProjectTodoID, ProjectTodoTable.TodoTitle from UserTable, UserTodoTable, ProjectTable, ProjectTodoTable where UserTable.SJSUID = :id and UserTodoTable.SJSUID = :id and ProjectTodoTable.ProjectID = UserTodoTable.ProjectID and UserTodoTable.ProjectID = ProjectTable.ProjectID";
        $ps2 = $con->prepare($query2);
        $ps2->execute(array(':id' => $SJSUID));
//    $ps->execute(array(':id' => $SJSUID));
        $data2 = $ps2->fetchAll(PDO::FETCH_ASSOC);
        if (count($data2) > 0) {
            print "<div>\n";
            printTable($data2);
            print "\n</div>\n";
        } else {
            print "<h2> (Error... No record is found...)</h2>\n";
        }

    } else {
        print "<h2>(Error...Student ID not found, or password is incorrect)</h3>\n";
    }

} catch (PDOException $e) {
    echo 'ERROR:' . $e->getMessage();

}
?>


</section>


</div>
</body>
</html>