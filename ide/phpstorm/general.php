<?php
/**
 * Created by PhpStorm.
 * User: ZMac
 * Date: 6/1/14
 * Time: 5:23 AM
 */

?>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

    <title>XDebug in PHP Storm</title>
</head>
<body>
<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
    <div class="container">
        <h1>How to configure XDebug in PHPStorm</h1>
        <p>PHP Storm suggest following steps </p>
        <p><a href="http://www.jetbrains.com/phpstorm/webhelp/configuring-xdebug.html" class="btn btn-primary btn-lg" role="button">PHPStorm Docs &raquo;</a></p>
    </div>
</div>

<div class="container">
    <!-- Example row of columns -->
    <div class="row">
        <div class="col-md-4">
            <h2>Auto Listening</h2>
            <p>For troubleshooting ALWAYS enable Run > Break at first line in  PHP Scripts. Keep in mind its side effect. Even if you run a file outside your project, PHP Storm will listen to requests and jump in. You can turn off port listening to avoid it </p>
        </div>
        <div class="col-md-4">
            <h2>Break Points</h2>
            <p><ul>
                <li> Use xdebug_break() for manual break points
                </li>
            </ul></p>
            <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div>
        <div class="col-md-4">
            <h2>Heading</h2>
            <p>To add</p>
            <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div>
    </div>

    <hr>

    <footer>
        <p>&copy; XDebug info2014</p>
    </footer>
</div> <!-- /container -->

</body>
</html>