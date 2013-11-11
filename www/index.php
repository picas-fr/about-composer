<?php
/**
 * @see http://github.com/picas-fr/about-composer
 */

// show errors
@ini_set('display_errors','1'); @error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT);

// set a default timezone to avoid PHP5 warnings
$dtmz = @date_default_timezone_get();
@date_default_timezone_set($dtmz?:'Europe/Paris');

// pages dir
$pages_dir = __DIR__.'/pages/';

// primary page
$primary_page = $pages_dir.'default.php';
if (!empty($_GET)) {
    foreach ($_GET as $_p=>$_v) {
        if (!empty($_p) && file_exists($a = $pages_dir.$_p.'.php')) {
            $primary_page = $a;
        }
    }
}

// output: starter template from Bootstrap 3
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test file from github.com/picas-fr/about-composer</title>
    <meta name="robots" content="none">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
<style>
html, body { height: 100%; }
body { padding-top: 50px; }
#wrap { min-height: 100%; height: auto; margin: 0 auto -80px; padding: 0 0 80px; }
#footer { height: auto; min-height: 80px; background-color: #f5f5f5; }
#wrap > .container { padding: 40px 15px 0; }
.container .credit {margin: 20px 0;}
#footer > .container {padding-left: 15px;padding-right: 15px;}
code {font-size: 80%;}
.starter-template {padding: 20px 15px;}
.alert { margin-left: 3em; margin-right: 3em;}
</style>
</head>
<body>
<div id="wrap">
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">#</a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li<?php
                        if ($primary_page===$pages_dir.'default.php') echo ' class="active"';
                    ?>><a href="?default">Home</a></li>
                    <li<?php
                        if ($primary_page===$pages_dir.'commands.php') echo ' class="active"';
                    ?>><a href="?commands">Commands</a></li>
                    <li<?php
                        if ($primary_page===$pages_dir.'tests.php') echo ' class="active"';
                    ?>><a href="?tests">Test Cases</a></li>
                    <li<?php
                        if ($primary_page===$pages_dir.'readme.php') echo ' class="active"';
                    ?>><a href="?readme">Read Me</a></li>
                    <li<?php
                        if ($primary_page===$pages_dir.'mytest.php') echo ' class="active"';
                    ?>><a href="?mytest" title="Custom test page (see 'www/pages/mytest.php' script)">_</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="http://getcomposer.org/">getcomposer.org</a></li>
                    <li><a href="http://packagist.org/">packagist.org</a></li>
                    <li><a href="http://semver.org/">semver.org</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>
    <div class="container">
    <?php include $primary_page; ?>
    </div><!-- /.container -->
</div>
<div id="footer">
    <div class="container">
        <div class="pull-left">
            <p class="text-muted credit">Sample file of the <a href="http://github.com/picas-fr/about-composer">picas-fr/about-composer</a> package based on responsive template by <a href="http://getbootstrap.com/">Bootstrap 3.*</a>.<br />
            This template uses distant CDNs to load Bootstrap and jQuery files. An active Internet connection is required.</p>
        </div>
        <div class="pull-right">
            <p class="text-muted credit"><small>attached by not liable to</small><br /><a href="http://www.smile.fr/"><strong>Smile</strong> - Open Source Solutions</a></p>
        </div>
    </div>
</div>
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>
</body>
</html>
