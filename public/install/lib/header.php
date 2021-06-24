<?php
$fileName= basename($_SERVER['PHP_SELF'], '.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">


    <title>Gforce Setup</title>

    <!-- Bootstrap core CSS -->
    <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Custom styles for this template -->
    <link href="./bootstrap/css/jumbotron-narrow.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<div class="container">
    <div class="header clearfix">
        <nav>
            <ul class="nav nav-pills pull-right">

                <?php $showLink=true; foreach($wizardSteps as $key=>$value):?>
                 <?php if($showLink):?>
                <li role="presentation" <?php if($value['page'] == $fileName):?>  class="active" <?php $showLink=false; endif; ?> ><a href="<?php echo $value['page']; ?>.php"><?php echo $value['label'];?></a></li>
                <?php else:?>
                        <li role="presentation"   ><a href="#"><?php echo $value['label'];?></a></li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        </nav>
        <h3 class="text-muted">Gforce Setup</h3>
    </div>

    <div class="jumbotron">
