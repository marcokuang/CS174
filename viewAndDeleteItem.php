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
    echo "<div class='col-md-12 table-responsive'>";
    print "    <table id = 'deleteTable' class='table table-hover'>\n";

//    // Construct the HTML table row by row.
//    $printHeaderFlag = true;
//    foreach ($data as $row) {
//        // print header info
//        if ($printHeaderFlag) {
//            print "<tr>\n";
//            foreach ($row as $name => $value) {
//                print "<th>$name</th>\n";
//            }
//            print "</tr>\n";
//            $printHeaderFlag = false;
//        }
//
//        // Data row.
//        print "<tr>\n";
//        foreach ($row as $name => $value) {
//            print "<td>$value</td>\n";
//        }
//        print "</tr>\n";
//    }

    foreach ($data as $row) {
        // Data row.
        echo "<tr>";
        echo "<td>" . $row["ProjectName"] . "</td>><td>" . $row["TodoTitle"] . "</td>><td>" . $row["DueDate"] . "</td>><td>" ."<button class='del btn btn-primary' id='" . $row["ProjectTodoID"]."'>Delete</button>"."</td>\n";
        echo "</tr>";
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
        "SELECT ProjectName, TodoTitle, DueDate, ProjectTodoID
FROM ProjectTable, ProjectTodoTable, UserTodoTable
WHERE ProjectTable.ProjectID = ProjectTodoTable.ProjectID
AND ProjectTable.ProjectID = UserTodoTable.ProjectID
AND UserTodoTable.SJSUID = :id;";

    $ps = $con->prepare($query);
//    echo "hehehehe   ". $SJSUID;
    $ps->execute(array(':id' => $SJSUID));
    $data = $ps->fetchAll(PDO::FETCH_ASSOC);
    // $data is an array.
    if (count($data) > 0) {
        printTable($data);
    } else {
        print "<h2>(No existing ToDos found...)</h3>\n";
    }
} catch (PDOException $e) {
    echo 'ERROR:' . $e->getMessage();
}

?>

<script>
    $("td").on('click', '.del',function() {
        /*var x = document.getElementById("fTitle").value;
        var y = document.getElementById("sel1").value;
        var z = document.getElementById("fDate").value;
        var idPattern = /^(\d{4})\-(\d{2})\-(\d{2}) (\d{2}):(\d{2}):(\d{2})$/;

//                        alert(idPattern.test(z));

        if(x!="" && y!= "" && idPattern.test(z)){
            return true;
        }
        else{
            var out = document.getElementById("output");
            out.className = out.className + " col-md-3 alert alert-warning";
            out.style.marginTop = "30px";
            out.innerHTML = "Input is not valid, please enter again";
            return false;
        }*/

        alert("hehe delete clicked");
    });
</script>
