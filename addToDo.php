<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>View Personal Todo List</title>

    <!-- Bootstrap -->
    <link href="bootstrap-3.3.5/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>


    <![endif]-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap-3.3.5/js/bootstrap.min.js"></script>
    <script src="./inputValidation.js"></script>

    <script>
        function showUser() {
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("sel1").innerHTML = xmlhttp.responseText;
                }
            };
            xmlhttp.open("POST", "loadSelectMenuOptions.php", true);
            xmlhttp.send();
        }

        function showTable(str) {
            if (str == "") {
                document.getElementById("output").innerHTML = "";
                return;
            } else {
                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {
                    // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function () {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        document.getElementById("output").innerHTML = xmlhttp.responseText;
                    }

                    if (xmlhttp.readyState == 4 && xmlhttp.status == 404) {
                        document.getElementById("output").innerHTML = xmlhttp.responseText;
                    }
                };
                xmlhttp.open("GET", "viewIndividualProject.php?q=" + str, true);
                xmlhttp.send();
            }
        }
    </script>

    <style>
        #last {
            margin-bottom: 30px;
        }

        .menu-item {
            /*padding-right: 10px;*/
            /*margin-right: 15px;*/
        }
    </style>
</head>
<body>
<div class="container">
    <div class="page-header">
        <div class="row">
            <canvas id="myCanvas" width=100 height="100px" class="col-md-2">Cant show canvas</canvas>
            <!--<canvas id="smallCanvas"></canvas>-->
            <script>
                var canvas = document.getElementById("myCanvas");
                canvas.width = 300;
                canvas.height = 300;
                var ctx = canvas.getContext("2d");

                // drawing the background
                ctx.beginPath();
                ctx.rect(0, 0, 300, 300);
                ctx.fillStyle = "#1A35A0";
                ctx.fill();
                ctx.closePath();

                // drawing circle 1
                ctx.beginPath();
                ctx.arc(100, 150, 160, 0, 2 * Math.PI);
                ctx.fillStyle = "#EFDD1A";
                ctx.fill();
                ctx.closePath();

                //            drawing circle 2
                ctx.beginPath();
                ctx.arc(250, 215, 155, 0, 2 * Math.PI);
                ctx.fillStyle = "#C5B934";
                ctx.fill();
                ctx.closePath();

                //draw sjsu
                ctx.beginPath();
                ctx.font = "85px Arial";
                ctx.fillStyle = "#7E7E61";
                ctx.fillText("SJSU", 0, 130);
                ctx.closePath();

                ctx.beginPath();
                ctx.font = "40px Arial";
                ctx.fillStyle = "blue";
                ctx.textAlign = "center";
                ctx.fillText("GroupScheduler", canvas.width / 2, canvas.height / 2 + 20);
                ctx.closePath();

                ctx.beginPath();
                ctx.font = "bold 20px Verdana";
                ctx.fillStyle = "black";
                ctx.textAlign = "left";
                ctx.fillText("increase your", canvas.width / 2 - 5, canvas.height - 60);
                ctx.closePath();

                ctx.beginPath();
                ctx.font = "bold 20px Verdana";
                ctx.fillStyle = "black";
                ctx.textAlign = "left";
                ctx.fillText("efficiency", canvas.width / 2 - 5, canvas.height - 30);
                ctx.closePath();

                var oldCanvas = canvas.toDataURL("image/png");
                var img = new Image();
                img.src = oldCanvas;
                img.onload = function () {
                    canvas.height = canvas.width * (img.height / img.width);

                    /// step 1
                    var oc = document.createElement('canvas'),
                        octx = oc.getContext('2d');

                    oc.width = img.width * 0.5;
                    oc.height = img.height * 0.5;
                    octx.drawImage(img, 0, 0, oc.width, oc.height);

                    /// step 2
//                octx.drawImage(oc, 0, 0, oc.width * 0.5, oc.height * 0.5);
//
//                ctx.drawImage(oc, 0, 0, oc.width * 0.5, oc.height * 0.5,
//                        0, 0, canvas.width, canvas.height);
                    octx.drawImage(oc, 0, 0, oc.width, oc.height);

                    ctx.drawImage(oc, 0, 0, oc.width, oc.height,
                        0, 0, canvas.width, canvas.height);
                }

                canvas.width = 150;
                canvas.height = 150;
            </script>

            <h1 class="col-md-8" style="margin-top: 2em;">Welcome to ToDoList!</h1>
        </div>
    </div>


    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index2.html">Home</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <!--<li class="active"><a href="#">About <span class="sr-only">(current)</span></a></li>-->
                    <li><a href="about.html">About</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false">Projects <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="viewProjects.html">View All Projects</a></li>
                            <li><a href="home.php" role="button">Submit New Project</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="newAccount2.html" role="button">Register an Account</a></li>
                            <li><a href="viewIndividualToDo.html" role="button">View Individual's ToDos</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="row">
        <?php
        /**
         * Created by PhpStorm.
         * User: abcd
         * Date: 12/1/15
         * Time: 11:02 AM
         */
        require("dbconfig.php");
        $projectID = filter_input(INPUT_POST, "projectid");
        $title = filter_input(INPUT_POST, "title");
        $date = filter_input(INPUT_POST, "date");

        //echo $projectID. " and \n". $title;

        try {
            $query = "INSERT INTO mydb.ProjectTodoTable(`ProjectID`, `TodoTitle`, `DueDate`) VALUES (:id, :title, :date);";
            $ps = $con->prepare($query);
            $ps->execute(array(':id' => $projectID, ':title' => $title, ':date' => $date));
            if($ps){
                echo "<div class='alert alert-success'> Inserted ToDo item <strong>". $title ." </strong> sucessfully. </div>";
            }
            else{
                echo "<div class='alert alert-danger'>failed adding new item </div>";
            }


        } catch (Exception $e) {
            echo $query . "<br>" . $e->getMessage();
        }

        function printTable($data)
        {
            // We're going to construct an HTML table.
            print "<div  class='resultTable'>";
            print "    <table id='resultTable' class='table table-hover'>\n";

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
                "SELECT DISTINCT ProjectName, TodoTitle
            FROM ProjectTable, ProjectTodoTable
            WHERE ProjectTable.ProjectID = ProjectTodoTable.ProjectID AND ProjectTable.ProjectID = " . $projectID. ";";

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

        ?>

        <div id="output">

        </div>
    </div>

</div>
</body>
</html>
