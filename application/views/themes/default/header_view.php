<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />

	<link rel="shortcut icon" href="">

	<title>WEB App</title>  

    <link href="<?php echo theme_assets_url(); ?>css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo theme_assets_url(); ?>css/modern-business.css" rel="stylesheet">
    <link href="<?php echo theme_assets_url(); ?>font-awesome/css/font-awesome.min.css" rel="stylesheet">

</head>
	<body>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Modern Business</a>
            </div>

            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <?php                   
                        foreach($navigation as $key=>$nav){ 
                            if(isset($nav->children)){
                            ?>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <?php echo $nav->info->nav_title; ?> <b class="caret"></b>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <?php foreach($nav->children as $key=>$child){ ?>
                                            <li>
                                                <a href="<?php echo $child->info->nav_slug; ?>">
                                                    <?php echo $child->info->nav_title; ?>
                                                </a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </li>
                            <?php    
                            }else{
                            ?>
                                <li>
                                    <a href="<?php echo base_url($nav->info->nav_slug); ?>">
                                        <?php echo $nav->info->nav_title; ?>
                                    </a>
                                </li>
                            <?php 
                            } 
                        }
                    ?>
                </ul>
            </div>
        </div>
    </nav>