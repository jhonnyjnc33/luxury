<?php
include("../includes/login.php");
$amenidad= lista($link, "correos_newsletter", "order by correo asc", "");

?>
<!DOCTYPE html>
<!--
BeyondAdmin - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.5
Version: 1.4.2
Purchase: http://wrapbootstrap.com
-->

<html xmlns="http://www.w3.org/1999/xhtml">
<!-- Head -->
<head>
    <meta charset="utf-8" />
    <title>Aldeas </title>

    <meta name="description" content="data tables" />
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

    <!--Page Related styles-->
    <link href="/assets/css/dataTables.bootstrap.css" rel="stylesheet" />

    <!--Skin Script: Place this script in head to load scripts for skins and rtl support-->
    <script src="/assets/js/skins.min.js"></script>
</head>
<!-- /Head -->
<!-- Body -->
<body>
    <!-- Loading Container -->
    <div class="loading-container">
        <div class="loader"></div>
    </div>
    <!--  /Loading Container -->
    <!-- Navbar -->
   <?php include("../includes/topvar.php"); ?>
    <!-- Main Container -->
    <div class="main-container container-fluid">
        <!-- Page Container -->
        <div class="page-container">
            <!-- Page Sidebar -->
            <div class="page-sidebar" id="sidebar">
               <?php 
                	include("../includes/menu.php"); 
                ?>
            </div>
            <!-- /Page Sidebar --> 
            
            <!-- Page Content -->
            <div class="page-content">
                <!-- Page Breadcrumb -->
                <div class="page-breadcrumbs">
                    <ul class="breadcrumb">
                        <li>
                            <i class="fa fa-home"></i>
                            <a href="/">Home</a>
                        </li>
                        <li class="active">Aldeas</li>
                    </ul>
                </div>
                <!-- /Page Breadcrumb -->
               
                <!-- Page Body -->
                <div class="page-body">
                   
                    <div class="row">
                        <div class="col-xs-12 col-md-12">
                            <div class="widget">
                                <div class="widget-header bordered-bottom bordered-yellow">
                                    <span class="widget-caption">Puedes realizar b&uacute;squedas por columna</span>
                                    <div class="widget-buttons">
                                        <a href="#" data-toggle="maximize">
                                            <i class="fa fa-expand"></i>
                                        </a>
                                        <a href="#" data-toggle="collapse">
                                            <i class="fa fa-minus"></i>
                                        </a>
                                        <a href="#" data-toggle="dispose">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="widget-body no-padding table-scrollable">
                                    <table class="table table-bordered table-hover table-striped" id="searchable">
                                        <thead class="bordered-darkorange">
                                            <tr role="row">
                                                <th width="30%">Correo</th>
                                            </tr>
                                        </thead>

                                        <tfoot>
                                            <tr>
                                                <th rowspan="1" colspan="1"><input type="text" name="search_engine" placeholder="Buscar por nombre" class="form-control input-sm"></th>
                                               
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        <?
                                        	foreach ($amenidad as $am){
                                        		print '
                                        			<tr id="fila_amenidad_'.$am["id"].'">
		                                                <td class=" sorting_1">'.$am["correo"].'</td>
		                                                
                                            		</tr>
                                        		';
                                        	}
                                        ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
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
    <script src="/assets/js/datatable/jquery.dataTables.min.js"></script>
    <script src="/assets/js/datatable/ZeroClipboard.js"></script>
    <script src="/assets/js/datatable/dataTables.tableTools.min.js"></script>
    <script src="/assets/js/datatable/dataTables.bootstrap.min.js"></script>
    <script src="/assets/js/datatable/datatables-init.js"></script>
    <script src="/assets/js/eliminar_datos.js"></script>
    <script>
        InitiateSearchableDataTable.init();
    </script>
    
</body>
<!--  /Body -->
</html>
