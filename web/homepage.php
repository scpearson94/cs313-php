<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <title>Sophia Pearson's Home Page for CSE341</title>
    <link rel="stylesheet" href="cseHome.css">
    <link rel="shortcut icon" type="image/png" href="images/favicon.png"/>
</head>
<body>

    <div id="homeHeader">
    <!--Navigation bar-->
    <ul id="navbar">
        <li class="navitem"><a class="active" href="homepage.php">Home</a></li>
        <li class="navitem"><a href="w02/aboutme.html">About Me</a></li>
        <li class="navitem"><a href="assignmentList.html">Assignments</a></li>
        <li class="navitem"><a href="w02/randomFacts.html">Random Facts</a></li>
    </ul>
    
    <h1><section id="headerName">Sophia Pearson</section>HOME PAGE</h1>
    </div>

    <div id="body-content">
    <h2>Home Page for CSE 341</h2>

    <?php

        echo "The time is " . date("h:i:sa");

    ?>

    </div>
    
    <footer>
        <p>Posted by: Sophia Pearson</p>
        <p>Contact information: <a href="mailto:scpearon94@byui.edu">
        scpearon94@byui.edu</a>.</p>
        <p>&copy; 2020-<?php echo date("Y");?></p>
    </footer>
</body>
</html>