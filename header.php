<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>SJSU Scheduler</title>
    <style>
        .hidden {
            display: none;
        }

        p {
            font-family: sans-serif;
            color: #386D95;
        }

        h1 {
            color: #FFEB4E;
            font-family: sans-serif;
        }

        h2 {
            color: #FFEB4E;
            font-family: sans-serif;
        }

        /*
        #nav {
            line-height: 30px;
            height: 300px;
            width: 100px;
            float: left;
            padding: 5px;
            padding-top: 40px;
            margin-right: 40px;
        }
        */

        #nav a {
            color: yellow;
        }
    </style>

    <script src="inputValidation.js" ></script>
    <script src="db.js"></script>
    <script type="text/javascript">
        var drawing;
        var con;
        var spaceShuttle;
        const CANV_HEIGHT = 300;
        var CANV_WIDTH = 0.9*window.innerWidth;
        const SPR_WIDTH = 100;
        const SPR_HEIGHT = 135;
        var x = 0;
        var y = 100;
        var dx = 10;
        var dy = 7;

        function init() {
            drawing = document.getElementById("drawing");
            con = drawing.getContext("2d");
            drawing.width = CANV_WIDTH;
            spaceShuttle = document.getElementById("logo");
            // 100 = 100/1000 of a second = 10 frames per second
            setInterval(draw, 100);
        }

        function draw() {
            //clear background
            //con.clearRect(0, 0, CANV_HEIGHT, CANV_WIDTH);
            //move the element
            x += dx;
            y += dy;
            //check for boundaries
            //wrap();
            bounce();
            //draw the image
            con.drawImage(spaceShuttle, x, y, SPR_WIDTH, SPR_HEIGHT);
            //draw a rectangle
            con.strokeStyle = "black";
            con.lineWidth = 5;
            con.strokeRect(0, 0, CANV_WIDTH, CANV_HEIGHT);
        } // end draw

        function wrap()
        {
            if (x > CANV_WIDTH)
            {
                x = 0;
            }
            if (y > CANV_HEIGHT)
            {
                y = 0;
            }
        }

        function bounce()
        {
            if (x > CANV_WIDTH - SPR_WIDTH)
            {
                dx *= -1;
            }
            if (x < 0)
            {
                dx *= -1;
            }
            if (y > CANV_HEIGHT - SPR_HEIGHT)
            {
                dy *= -1;
            }
            if (y < 0)
            {
                dy *= -1;
            }

        } // end bounce

        function resizeCanvas(){
            canvas = document.getElementById("drawing");

            con = canvas.getContext("2d");
            spaceShuttle = document.getElementById("logo");

            if (canvas.width  < window.innerWidth)
            {
                canvas.width  = window.innerWidth;
                setInterval(draw, 100);
            }

            if (canvas.height < window.innerHeight)
            {
                canvas.height = window.innerHeight;
                setInterval(draw, 100);
            }
        }


    </script>
</head>



<body onload="init()">
<!--<body onresize="init()">-->
<div class="contents" id="allContents">
    <header id="header">
        <div>
            <h1 align="center">SJSU Scheduler</h1>
            <img class="hidden" id="logo" src="logoSmall.png"/>
            <canvas id="drawing" height="300"></canvas>
        </div>
    </header><!-- /header -->

    <nav id="nav" role="navigation">
        <ul id="menu">
            <li><a href="index.html">Home</a></li>
            <li><a href="about.html">About</a></li>
            <li><a href="about.html">Sample</a></li>
            <li><a href="newAccount.html">Register an account</a></li>
            <li><a href="viewProjects.php">View Projects</a></li>
        </ul>
    </nav>