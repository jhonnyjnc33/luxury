<?php
include("../includes/login.php");
?>
<!DOCTYPE html>
<html>
<!-- Head -->
<head>
    <meta charset="utf-8" />
    <title>Inbox</title>

    <meta name="description" content="inbox" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">

    <!--Basic Styles-->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link id="bootstrap-rtl-link" href="" rel="stylesheet" />
    <link href="/assets/css/font-awesome.min.css" rel="stylesheet" />
    <link href="/assets/css/weather-icons.min.css" rel="stylesheet" />

    <!--Fonts-->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300" rel="stylesheet" type="text/css">

    <!--Beyond styles-->
    <link id="beyond-link" href="/assets/css/beyond.min.css" rel="stylesheet" />
    <link href="/assets/css/demo.min.css" rel="stylesheet" />
    <link href="/assets/css/typicons.min.css" rel="stylesheet" />
    <link href="/assets/css/animate.min.css" rel="stylesheet" />
    <link id="skin-link" href="" rel="stylesheet" type="text/css" />

    <!--Skin Script: Place this script in head to load scripts for skins and rtl support-->
    <script src="/assets/js/skins.min.js"></script>
</head>
<!-- /Head -->
<!-- Body -->
<body>
    <?php 
    	include("../includes/topvar.php");
    ?>
    <!-- Main Container -->
    <div class="main-container container-fluid">
        <!-- Page Container -->
        <div class="page-container">
            <!-- Page Sidebar 
            <div class="page-sidebar menu-compact" id="sidebar">-->
            <div class="page-sidebar " id="sidebar">
               
                <!-- Sidebar Menu -->
                <?php 
                	include("../includes/menu.php");
                ?>
                <!-- /Sidebar Menu -->
            </div>
            <!-- /Page Sidebar -->
            
            <!-- Page Content -->
            <div class="page-content">
                <!-- Page Breadcrumb -->
                <div class="page-breadcrumbs">
                    <ul class="breadcrumb">
                        <li>
                            <i class="fa fa-home"></i>
                            <a href="#">Inicio</a>
                        </li>
                    </ul>
                </div>
                <!-- /Page Breadcrumb -->
                <!-- Page Header 
                <div class="page-header position-relative mail-header">
                    <div class="header-title">
                        <h1>
                            Beyond Mail
                        </h1>
                    </div>
                    <!--Header Buttons
                    <div class="header-buttons">
                        <a class="sidebar-toggler" href="#">
                            <i class="fa fa-arrows-h"></i>
                        </a>
                        <a class="refresh" id="refresh-toggler" href="">
                            <i class="glyphicon glyphicon-refresh"></i>tooltip-primary
                        </a>
                        <a class="fullscreen" id="fullscreen-toggler" href="#">
                            <i class="glyphicon glyphicon-fullscreen"></i>
                        </a>
                    </div>
                    <!--Header Buttons End
                </div>
                <!-- /Page Header -->
                <!-- Page Body 
                <div class="page-body no-padding">
                    <div class="mail-container">
                        <div class="mail-header">
                            <ul class="header-buttons">
                                <li>
                                    <a href="message-compose.html" class="tooltip-primary" data-toggle="tooltip" data-original-title="Compose"><i class="glyphicon glyphicon-pencil"></i></a>
                                </li>
                                <li>
                                    <a class="tooltip-primary" data-toggle="tooltip" data-original-title="Options"><i class="fa fa-angle-down"></i></a>
                                </li>
                                <li>
                                    <a class="tooltip-primary" data-toggle="tooltip" data-original-title="Reply"><i class="glyphicon glyphicon-repeat"></i></a>
                                </li>
                                <li>
                                    <a class="tooltip-primary" data-toggle="tooltip" data-original-title="Forward"><i class="glyphicon glyphicon-share-alt"></i></a>
                                </li>
                                <li>
                                    <a class="tooltip-primary" data-toggle="tooltip" data-original-title="Remove"><i class="glyphicon glyphicon-remove"></i></a>
                                </li>
                                <li>
                                    <a class="tooltip-primary" data-toggle="tooltip" data-original-title="Important"><i class="fa fa-exclamation"></i></a>
                                </li>
                            </ul>
                            <ul class="header-buttons pull-right">
                                <li>
                                    <a><i class="fa fa-angle-left"></i></a>
                                </li>
                                <li>
                                    <a><i class="fa fa-angle-right"></i></a>
                                </li>
                                <li class="search">
                                    <span class="input-icon">
                                        <input type="text" class="form-control input-sm" id="fontawsome-search">
                                        <i class="glyphicon glyphicon-search lightgray"></i>
                                    </span>
                                </li>
                            </ul>
                            <div class="pages">
                                1-100 of 608
                            </div>
                        </div>
                        <div class="mail-body">
                            <ul class="mail-list">
                                <li class="list-item unread">
                                    <div class="item-check">
                                        <label>
                                            <input type="checkbox">
                                            <span class="text"></span>
                                        </label>
                                    </div>
                                    <div class="item-star">
                                        <a href="#" class="">
                                            <i class="fa fa-star-o"></i>
                                        </a>
                                    </div>
                                    <div class="item-sender">
                                        <a href="message-view.html" class="col-name">Bing</a>
                                    </div>
                                    <div class="item-subject">
                                        <span class="label label-palegreen">Business</span>
                                        <a href="message-view.html">
                                            Your Bing Newsletter: The May Issue
                                        </a>
                                    </div>
                                    <div class="item-options">
                                        <a href="message-view.html"><i class="fa fa-paperclip"></i></a>
                                    </div>
                                    <div class="item-time">
                                        Today, 13:52
                                    </div>
                                </li>
                                <li class="list-item">
                                    <div class="item-check">
                                        <label>
                                            <input type="checkbox">
                                            <span class="text"></span>
                                        </label>
                                    </div>
                                    <div class="item-star">
                                        <a href="#" class="">
                                            <i class="fa fa-star-o"></i>
                                        </a>
                                    </div>
                                    <div class="item-sender">
                                        <a href="message-view.html" class="col-name">Codeplex Team</a>
                                    </div>
                                    <div class="item-subject">
                                        <a href="message-view.html">
                                            Need some feedback please!
                                        </a>
                                    </div>
                                    <div class="item-options">
                                        <a href="message-view.html"><i class="fa fa-paperclip"></i></a>
                                    </div>
                                    <div class="item-time">
                                        Yesterday, 09:11
                                    </div>
                                </li>
                                <li class="list-item">
                                    <div class="item-check">
                                        <label>
                                            <input type="checkbox">
                                            <span class="text"></span>
                                        </label>
                                    </div>
                                    <div class="item-star">
                                        <a href="#" class="stared">
                                            <i class="fa fa-star"></i>
                                        </a>
                                    </div>
                                    <div class="item-sender">
                                        <a href="message-view.html" class="col-name">Jaime</a>
                                    </div>
                                    <div class="item-subject">
                                        <a href="message-view.html">
                                            Ducksboard Webinar in 30 minutes
                                        </a>
                                    </div>
                                    <div class="item-options">
                                        <a href="message-view.html"><i class="fa fa-paperclip"></i></a>
                                    </div>
                                    <div class="item-time">
                                        Yesterfay, 13:52
                                    </div>
                                </li>
                                <li class="list-item">
                                    <div class="item-check">
                                        <label>
                                            <input type="checkbox">
                                            <span class="text"></span>
                                        </label>
                                    </div>
                                    <div class="item-star">
                                        <a href="#" class="stared">
                                            <i class="fa fa-star"></i>
                                        </a>
                                    </div>
                                    <div class="item-sender">
                                        <a href="message-view.html" class="col-name">La Liga</a>
                                    </div>
                                    <div class="item-subject">
                                        <span class="label label-darkorange">Sports</span>
                                        <a href="message-view.html">
                                            All goals Matchday 38 Liga BBVA
                                        </a>
                                    </div>
                                    <div class="item-options">
                                        <a href="message-view.html"><i class="fa fa-paperclip"></i></a>
                                    </div>
                                    <div class="item-time">
                                        11 May, 13:52
                                    </div>
                                </li>
                                <li class="list-item unread">
                                    <div class="item-check">
                                        <label>
                                            <input type="checkbox">
                                            <span class="text"></span>
                                        </label>
                                    </div>
                                    <div class="item-star">
                                        <a href="#" class="">
                                            <i class="fa fa-star-o"></i>
                                        </a>
                                    </div>
                                    <div class="item-sender">
                                        <a href="message-view.html" class="col-name">Facebook</a>
                                    </div>
                                    <div class="item-subject">
                                        <a href="message-view.html">
                                            Action Required: Confirm Your Facebook Account
                                        </a>
                                    </div>
                                    <div class="item-options">
                                        <a href="message-view.html"><i class="fa fa-paperclip"></i></a>
                                    </div>
                                    <div class="item-time">
                                        9 May, 10:01
                                    </div>
                                </li>
                                <li class="list-item">
                                    <div class="item-check">
                                        <label>
                                            <input type="checkbox">
                                            <span class="text"></span>
                                        </label>
                                    </div>
                                    <div class="item-star">
                                        <a href="#" class="">
                                            <i class="fa fa-star-o"></i>
                                        </a>
                                    </div>
                                    <div class="item-sender">
                                        <a href="message-view.html" class="col-name">Lorem Team</a>
                                    </div>
                                    <div class="item-subject">
                                        <a href="message-view.html">
                                            Your ipsum is on fire.
                                        </a>
                                    </div>
                                    <div class="item-options">
                                        <a href="message-view.html"><i class="fa fa-paperclip"></i></a>
                                    </div>
                                    <div class="item-time">
                                        9 May, 10:01
                                    </div>
                                </li>
                                <li class="list-item">
                                    <div class="item-check">
                                        <label>
                                            <input type="checkbox">
                                            <span class="text"></span>
                                        </label>
                                    </div>
                                    <div class="item-star">
                                        <a href="#" class="">
                                            <i class="fa fa-star-o"></i>
                                        </a>
                                    </div>
                                    <div class="item-sender">
                                        <a href="message-view.html" class="col-name">Bing</a>
                                    </div>
                                    <div class="item-subject">
                                        <a href="message-view.html">
                                            Your Bing Newsletter: The May Issue
                                        </a>
                                    </div>
                                    <div class="item-options">
                                        <a href="message-view.html"><i class="fa fa-paperclip"></i></a>
                                    </div>
                                    <div class="item-time">
                                        Today, 13:52
                                    </div>
                                </li>
                                <li class="list-item">
                                    <div class="item-check">
                                        <label>
                                            <input type="checkbox">
                                            <span class="text"></span>
                                        </label>
                                    </div>
                                    <div class="item-star">
                                        <a href="#" class="">
                                            <i class="fa fa-star-o"></i>
                                        </a>
                                    </div>
                                    <div class="item-sender">
                                        <a href="message-view.html" class="col-name">Codeplex Team</a>
                                    </div>
                                    <div class="item-subject">
                                        <a href="message-view.html">
                                            Need some feedback please!
                                        </a>
                                    </div>
                                    <div class="item-options">
                                        <a href="message-view.html"><i class="fa fa-paperclip"></i></a>
                                    </div>
                                    <div class="item-time">
                                        Yesterday, 09:11
                                    </div>
                                </li>
                                <li class="list-item">
                                    <div class="item-check">
                                        <label>
                                            <input type="checkbox">
                                            <span class="text"></span>
                                        </label>
                                    </div>
                                    <div class="item-star">
                                        <a href="#" class="stared">
                                            <i class="fa fa-star"></i>
                                        </a>
                                    </div>
                                    <div class="item-sender">
                                        <a href="message-view.html" class="col-name">Jaime</a>
                                    </div>
                                    <div class="item-subject">
                                        <a href="message-view.html">
                                            Ducksboard Webinar in 30 minutes
                                        </a>
                                    </div>
                                    <div class="item-options">
                                        <a href="message-view.html"><i class="fa fa-paperclip"></i></a>
                                    </div>
                                    <div class="item-time">
                                        Yesterfay, 13:52
                                    </div>
                                </li>
                                <li class="list-item">
                                    <div class="item-check">
                                        <label>
                                            <input type="checkbox">
                                            <span class="text"></span>
                                        </label>
                                    </div>
                                    <div class="item-star">
                                        <a href="#" class="stared">
                                            <i class="fa fa-star"></i>
                                        </a>
                                    </div>
                                    <div class="item-sender">
                                        <a href="message-view.html" class="col-name">La Liga</a>
                                    </div>
                                    <div class="item-subject">
                                        <span class="label label-yellow">Friends</span>
                                        <a href="message-view.html">
                                            All goals Matchday 38 Liga BBVA
                                        </a>
                                    </div>
                                    <div class="item-options">
                                        <a href="message-view.html"><i class="fa fa-paperclip"></i></a>
                                    </div>
                                    <div class="item-time">
                                        11 May, 13:52
                                    </div>
                                </li>
                                <li class="list-item">
                                    <div class="item-check">
                                        <label>
                                            <input type="checkbox">
                                            <span class="text"></span>
                                        </label>
                                    </div>
                                    <div class="item-star">
                                        <a href="#" class="">
                                            <i class="fa fa-star-o"></i>
                                        </a>
                                    </div>
                                    <div class="item-sender">
                                        <a href="message-view.html" class="col-name">Facebook</a>
                                    </div>
                                    <div class="item-subject">
                                        <a href="message-view.html">
                                            Action Required: Confirm Your Facebook Account
                                        </a>
                                    </div>
                                    <div class="item-options">
                                        <a href="message-view.html"><i class="fa fa-paperclip"></i></a>
                                    </div>
                                    <div class="item-time">
                                        9 May, 10:01
                                    </div>
                                </li>
                                <li class="list-item">
                                    <div class="item-check">
                                        <label>
                                            <input type="checkbox">
                                            <span class="text"></span>
                                        </label>
                                    </div>
                                    <div class="item-star">
                                        <a href="#" class="">
                                            <i class="fa fa-star-o"></i>
                                        </a>
                                    </div>
                                    <div class="item-sender">
                                        <a href="message-view.html" class="col-name">Lorem Team</a>
                                    </div>
                                    <div class="item-subject">
                                        <a href="message-view.html">
                                            Your ipsum is on fire.
                                        </a>
                                    </div>
                                    <div class="item-options">
                                        <a href="message-view.html"><i class="fa fa-paperclip"></i></a>
                                    </div>
                                    <div class="item-time">
                                        9 May, 10:01
                                    </div>
                                </li>
                                <li class="list-item">
                                    <div class="item-check">
                                        <label>
                                            <input type="checkbox">
                                            <span class="text"></span>
                                        </label>
                                    </div>
                                    <div class="item-star">
                                        <a href="#" class="">
                                            <i class="fa fa-star-o"></i>
                                        </a>
                                    </div>
                                    <div class="item-sender">
                                        <a href="message-view.html" class="col-name">Bing</a>
                                    </div>
                                    <div class="item-subject">
                                        <a href="message-view.html">
                                            Your Bing Newsletter: The May Issue
                                        </a>
                                    </div>
                                    <div class="item-options">
                                        <a href="message-view.html"><i class="fa fa-paperclip"></i></a>
                                    </div>
                                    <div class="item-time">
                                        Today, 13:52
                                    </div>
                                </li>
                                <li class="list-item">
                                    <div class="item-check">
                                        <label>
                                            <input type="checkbox">
                                            <span class="text"></span>
                                        </label>
                                    </div>
                                    <div class="item-star">
                                        <a href="#" class="">
                                            <i class="fa fa-star-o"></i>
                                        </a>
                                    </div>
                                    <div class="item-sender">
                                        <a href="message-view.html" class="col-name">Codeplex Team</a>
                                    </div>
                                    <div class="item-subject">
                                        <a href="message-view.html">
                                            Need some feedback please!
                                        </a>
                                    </div>
                                    <div class="item-options">
                                        <a href="message-view.html"><i class="fa fa-paperclip"></i></a>
                                    </div>
                                    <div class="item-time">
                                        Yesterday, 09:11
                                    </div>
                                </li>
                                <li class="list-item">
                                    <div class="item-check">
                                        <label>
                                            <input type="checkbox">
                                            <span class="text"></span>
                                        </label>
                                    </div>
                                    <div class="item-star">
                                        <a href="#" class="stared">
                                            <i class="fa fa-star"></i>
                                        </a>
                                    </div>
                                    <div class="item-sender">
                                        <a href="message-view.html" class="col-name">Jaime</a>
                                    </div>
                                    <div class="item-subject">
                                        <a href="message-view.html">
                                            Ducksboard Webinar in 30 minutes
                                        </a>
                                    </div>
                                    <div class="item-options">
                                        <a href="message-view.html"><i class="fa fa-paperclip"></i></a>
                                    </div>
                                    <div class="item-time">
                                        Yesterfay, 13:52
                                    </div>
                                </li>
                                <li class="list-item unread">
                                    <div class="item-check">
                                        <label>
                                            <input type="checkbox">
                                            <span class="text"></span>
                                        </label>
                                    </div>
                                    <div class="item-star">
                                        <a href="#" class="stared">
                                            <i class="fa fa-star"></i>
                                        </a>
                                    </div>
                                    <div class="item-sender">
                                        <a href="message-view.html" class="col-name">La Liga</a>
                                    </div>
                                    <div class="item-subject">
                                        <a href="message-view.html">
                                            All goals Matchday 38 Liga BBVA
                                        </a>
                                    </div>
                                    <div class="item-options">
                                        <a href="message-view.html"><i class="fa fa-paperclip"></i></a>
                                    </div>
                                    <div class="item-time">
                                        11 May, 13:52
                                    </div>
                                </li>
                                <li class="list-item">
                                    <div class="item-check">
                                        <label>
                                            <input type="checkbox">
                                            <span class="text"></span>
                                        </label>
                                    </div>
                                    <div class="item-star">
                                        <a href="#" class="">
                                            <i class="fa fa-star-o"></i>
                                        </a>
                                    </div>
                                    <div class="item-sender">
                                        <a href="message-view.html" class="col-name">Facebook</a>
                                    </div>
                                    <div class="item-subject">
                                        <a href="message-view.html">
                                            Action Required: Confirm Your Facebook Account
                                        </a>
                                    </div>
                                    <div class="item-options">
                                        <a href="message-view.html"><i class="fa fa-paperclip"></i></a>
                                    </div>
                                    <div class="item-time">
                                        9 May, 10:01
                                    </div>
                                </li>
                                <li class="list-item">
                                    <div class="item-check">
                                        <label>
                                            <input type="checkbox">
                                            <span class="text"></span>
                                        </label>
                                    </div>
                                    <div class="item-star">
                                        <a href="#" class="">
                                            <i class="fa fa-star-o"></i>
                                        </a>
                                    </div>
                                    <div class="item-sender">
                                        <a href="message-view.html" class="col-name">Lorem Team</a>
                                    </div>
                                    <div class="item-subject">
                                        <a href="message-view.html">
                                            Your ipsum is on fire.
                                        </a>
                                    </div>
                                    <div class="item-options">
                                        <a href="message-view.html"><i class="fa fa-paperclip"></i></a>
                                    </div>
                                    <div class="item-time">
                                        9 May, 10:01
                                    </div>
                                </li>
                                <li class="list-item unread">
                                    <div class="item-check">
                                        <label>
                                            <input type="checkbox">
                                            <span class="text"></span>
                                        </label>
                                    </div>
                                    <div class="item-star">
                                        <a href="#" class="">
                                            <i class="fa fa-star-o"></i>
                                        </a>
                                    </div>
                                    <div class="item-sender">
                                        <a href="message-view.html" class="col-name">Bing</a>
                                    </div>
                                    <div class="item-subject">
                                        <span class="label label-palegreen">Business</span>
                                        <a href="message-view.html">
                                            Your Bing Newsletter: The May Issue
                                        </a>
                                    </div>
                                    <div class="item-options">
                                        <a href="message-view.html"><i class="fa fa-paperclip"></i></a>
                                    </div>
                                    <div class="item-time">
                                        Today, 13:52
                                    </div>
                                </li>
                                <li class="list-item">
                                    <div class="item-check">
                                        <label>
                                            <input type="checkbox">
                                            <span class="text"></span>
                                        </label>
                                    </div>
                                    <div class="item-star">
                                        <a href="#" class="">
                                            <i class="fa fa-star-o"></i>
                                        </a>
                                    </div>
                                    <div class="item-sender">
                                        <a href="message-view.html" class="col-name">Codeplex Team</a>
                                    </div>
                                    <div class="item-subject">
                                        <a href="message-view.html">
                                            Need some feedback please!
                                        </a>
                                    </div>
                                    <div class="item-options">
                                        <a href="message-view.html"><i class="fa fa-paperclip"></i></a>
                                    </div>
                                    <div class="item-time">
                                        Yesterday, 09:11
                                    </div>
                                </li>
                                <li class="list-item">
                                    <div class="item-check">
                                        <label>
                                            <input type="checkbox">
                                            <span class="text"></span>
                                        </label>
                                    </div>
                                    <div class="item-star">
                                        <a href="#" class="stared">
                                            <i class="fa fa-star"></i>
                                        </a>
                                    </div>
                                    <div class="item-sender">
                                        <a href="message-view.html" class="col-name">Jaime</a>
                                    </div>
                                    <div class="item-subject">
                                        <a href="message-view.html">
                                            Ducksboard Webinar in 30 minutes
                                        </a>
                                    </div>
                                    <div class="item-options">
                                        <a href="message-view.html"><i class="fa fa-paperclip"></i></a>
                                    </div>
                                    <div class="item-time">
                                        Yesterfay, 13:52
                                    </div>
                                </li>
                                <li class="list-item">
                                    <div class="item-check">
                                        <label>
                                            <input type="checkbox">
                                            <span class="text"></span>
                                        </label>
                                    </div>
                                    <div class="item-star">
                                        <a href="#" class="stared">
                                            <i class="fa fa-star"></i>
                                        </a>
                                    </div>
                                    <div class="item-sender">
                                        <a href="message-view.html" class="col-name">La Liga</a>
                                    </div>
                                    <div class="item-subject">
                                        <span class="label label-darkorange">Sports</span>
                                        <a href="message-view.html">
                                            All goals Matchday 38 Liga BBVA
                                        </a>
                                    </div>
                                    <div class="item-options">
                                        <a href="message-view.html"><i class="fa fa-paperclip"></i></a>
                                    </div>
                                    <div class="item-time">
                                        11 May, 13:52
                                    </div>
                                </li>
                                <li class="list-item unread">
                                    <div class="item-check">
                                        <label>
                                            <input type="checkbox">
                                            <span class="text"></span>
                                        </label>
                                    </div>
                                    <div class="item-star">
                                        <a href="#" class="">
                                            <i class="fa fa-star-o"></i>
                                        </a>
                                    </div>
                                    <div class="item-sender">
                                        <a href="message-view.html" class="col-name">Facebook</a>
                                    </div>
                                    <div class="item-subject">
                                        <a href="message-view.html">
                                            Action Required: Confirm Your Facebook Account
                                        </a>
                                    </div>
                                    <div class="item-options">
                                        <a href="message-view.html"><i class="fa fa-paperclip"></i></a>
                                    </div>
                                    <div class="item-time">
                                        9 May, 10:01
                                    </div>
                                </li>
                                <li class="list-item">
                                    <div class="item-check">
                                        <label>
                                            <input type="checkbox">
                                            <span class="text"></span>
                                        </label>
                                    </div>
                                    <div class="item-star">
                                        <a href="#" class="">
                                            <i class="fa fa-star-o"></i>
                                        </a>
                                    </div>
                                    <div class="item-sender">
                                        <a href="message-view.html" class="col-name">Lorem Team</a>
                                    </div>
                                    <div class="item-subject">
                                        <a href="message-view.html">
                                            Your ipsum is on fire.
                                        </a>
                                    </div>
                                    <div class="item-options">
                                        <a href="message-view.html"><i class="fa fa-paperclip"></i></a>
                                    </div>
                                    <div class="item-time">
                                        9 May, 10:01
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="mail-sidebar">
                            <ul class="mail-menu">
                                <li class="active">
                                    <a href="#">
                                        <i class="fa fa-inbox"></i>
                                        <span class="badge badge-default badge-square pull-right">6</span>
                                        Inbox
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-star"></i>
                                        <span class="badge badge-default badge-square pull-right">1</span>
                                        Important
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="glyphicon glyphicon-share"></i>
                                        <span class="badge badge-default badge-square pull-right">1</span>
                                        Sent
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        <i class="fa fa-envelope"></i>
                                        Drafts
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        <i class="fa fa-ban"></i>
                                        <span class="badge badge-default badge-square pull-right">1</span>
                                        Spam
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        <i class="fa fa-trash-o"></i>
                                        Trash
                                    </a>
                                </li>
                                <li class="divider">
                                </li>
                                <li>
                                    <a href="#">
                                        + Add Folder
                                    </a>
                                </li>
                            </ul>
                            <ul class="mail-menu">
                                <li class="menu-title">
                                    <h6>Tags</h6>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="badge badge-palegreen badge-tag badge-square"></span>
                                        Business
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        <span class="badge badge-darkorange badge-tag badge-square"></span>
                                        Sports
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        <span class="badge badge-yellow badge-tag badge-square"></span>
                                        Friends
                                    </a>
                                </li>
                                <li class="divider">
                                </li>
                                <li>
                                    <a href="#">
                                        + Add Tag
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Page Body -->
                
            </div>
            <!-- /Page Content -->
        </div>
        <!-- /Page Container -->
        <!-- Main Container -->

    </div>

    <!--Basic Scripts-->
    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/slimscroll/jquery.slimscroll.min.js"></script>

    <!--Beyond Scripts-->
    <script src="/assets/js/beyond.min.js"></script>

    <!--Page Related Scripts-->
    
</body>
<!--  /Body -->
</html>
