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
        var global_ID;
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
                        document.getElementById("currentTodo").innerHTML = xmlhttp.responseText;
                    }

                    if (xmlhttp.readyState == 4 && xmlhttp.status == 404) {
                        document.getElementById("currentTodo").innerHTML = xmlhttp.responseText;
                    }
                };
                xmlhttp.open("GET", "viewAndDeleteItem.php?q=" + str, true);
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
                            <li><a href="addProject.html" role="button">Submit New Project</a></li>
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

        <div class="col-md-6" id="currentTodo">
            <?php
            $SJSUID = filter_input(INPUT_POST, "SJSUID");
//            echo "<script>alert('". $SJSUID. "')</script>";
            echo "<script> showTable('". $SJSUID. "'); global_ID = '". $SJSUID. "';</script>";
            ?>
        </div>
        <form class="col-md-6" role="form" action="addToDo.php" id="addTodoItem">
            <h3>Adding new ToDo items</h3>
            <div class="row">

                <div class="form-group col-md-6">
                    <label for="fTitle">Todo Item Title: </label>
                    <input type="text" class="form-control" id="fTitle" name="title">
                </div>
            </div>

            <div class="row">

                <div class="form-group col-md-6">
                    <label for="fDate">Enter a due date and time: (YYYY-MM-DD HH:MM:SS)</label>
                    <input type="text" class="form-control" id="fDate" name="date">
                </div>
            </div>
            <div class="row">
                <?php
                require("dbconfig.php");
                function printTable($data)
                {
                    echo "<div class='form-group col-md-6'>";
                    echo "<label for='sel1'>Select a project from list:</label>";
                    echo "<select class='form-control' id='sel1' name='projectid' form='addTodoItem'>";


                    echo "<option value=''> ------</option>";
                    foreach ($data as $row) {
                        // Data row.
                        echo "<option value='" . $row["ProjectID"] . "'>" . $row["ProjectName"] . "</option>\n";
                    }
                    echo "</select>";
                    echo '</div>';
                }

                //display the content of the project todoTable

                $SJSUID = filter_input(INPUT_POST, "SJSUID");
                $userPassword = filter_input(INPUT_POST, "Password");

                try {

                    // prepareStatement

                    $query = "SELECT SJSUID FROM UserLoginTable WHERE UserLoginTable.SJSUID = :id AND UserLoginTable.Password = :pwd";

                    $ps = $con->prepare($query);
                    $ps->execute(array(':id' => $SJSUID, ':pwd' => $userPassword));
                    $data = $ps->fetchAll(PDO::FETCH_ASSOC);

                    // $data is an array.
                    // if the data>0 is ture, it means one matching SJSU ID is found in the database so the next step is to print the array out.
                    if (count($data) > 0) {
                        //printTable($data);

//                        $query2 = "SELECT DISTINCT ProjectTable.ProjectName, ProjectTodoTable.ProjectID FROM UserTable, UserTodoTable, ProjectTable, ProjectTodoTable WHERE UserTable.SJSUID = :id AND UserTodoTable.SJSUID = :id AND ProjectTodoTable.ProjectID = UserTodoTable.ProjectID AND UserTodoTable.ProjectID =

                        $query2 = "SELECT DISTINCT ProjectTable.ProjectName, ProjectTable.ProjectID FROM ProjectTable, UserTodoTable WHERE UserTodoTable.SJSUID = :id AND UserTodoTable.ProjectID = ProjectTable.ProjectID";

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
            </div>
            <div class="row">
                <button type="submit" formmethod="post" id="submit" class="btn btn-default col-md-3">Submit</button>
                <a href="addProject.html" class="btn btn-info col-md-3" role="button">Add Project</a>

                <script>
                    $(document).on('click', '#submit', function() {
                        var x = document.getElementById("fTitle").value;
                        var y = document.getElementById("sel1").value;
                        var z = document.getElementById("fDate").value;
                        var idPattern = /^(\d{4})\-(\d{2})\-(\d{2}) (\d{2}):(\d{2}):(\d{2})$/;

//                        alert(idPattern.test(z));

                        if(x!="" && y!= "" && idPattern.test(z)){
                            return true;
                        }
                        else{
                            var out = document.getElementById("output");
                            out.className = out.className + " col-md-8 alert alert-warning";
                            out.style.marginTop = "30px";
                            out.innerHTML = "Input is not valid, please enter again";
                            return false;
                        }
                    });

                    $(document).on('click', '.del', function() {

                        $.post("deleteItem.php",
                            {
                                id: this.id
                            },
                            function(data,status){
//                                alert(global_ID);
                                showTable(global_ID);
                            });

                        var out = document.getElementById("output");
                        out.className = out.className + " col-md-8 alert alert-warning";
                        out.style.marginTop = "30px";
                        out.innerHTML = "Deleted Todo Item ID: " + this.id;
                    });

                </script>
            </div>
            <div id="output" class="row">

            </div>
        </form>


    </div>

</div>
</body>
</html>
