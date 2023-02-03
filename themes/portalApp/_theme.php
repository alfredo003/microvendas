<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
   <meta charset="utf-8" />

   <meta content="width=device-width, initial-scale=1.0" name="viewport" />
   <meta content="" name="description" />
   <meta content="Mosaddek" name="author" />
  <?=$head?>
   <link rel="shortcut icon" href="<?=theme("img/micro_icon.png")?>" type="image/x-icon">
   <link href="<?=theme("assets/bootstrap/css/bootstrap.min.css")?>" rel="stylesheet" />
   <link href="<?=theme("assets/bootstrap/css/bootstrap-responsive.min.css")?>" rel="stylesheet" />
   <link href="<?=theme("assets/bootstrap/css/bootstrap-fileupload.css")?>" rel="stylesheet" />
   <link href="<?=theme("assets/font-awesome/css/font-awesome.css")?>" rel="stylesheet" />
   <link href="<?=theme("css/style-responsive.css")?>" rel="stylesheet" />
   <link href="<?=theme("css/style-default.css")?>" rel="stylesheet" id="style_color" />
   <link href="<?=theme("assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css")?>" rel="stylesheet" />
   <link href="<?=theme("assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css")?>" rel="stylesheet" type="text/css" media="screen"/>


 <link href="<?=theme("css/style.css")?>" rel="stylesheet" /> 
 <link href="<?=theme("assets/style.css")?>" rel="stylesheet" />
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="fixed-top">
    
   <!-- BEGIN HEADER -->
   <div id="header" class="navbar navbar-inverse navbar-fixed-top">
       <!-- BEGIN TOP NAVIGATION BAR -->
     
       <div class="navbar-inner">
           <div class="container-fluid" style="background-color:#531EF4;">
               <!--BEGIN SIDEBAR TOGGLE-->
             
               <!--END SIDEBAR TOGGLE-->
               <!-- BEGIN LOGO -->
               <a class="brand" style="color: #fff;"href="<?=url("app/")?>">
                  <img src="<?=theme("img/logofff.png")?>" alt="MicroVenda" style="width: 300px;"/>
               </a>
          <div class="sidebar-toggle-box hidden-phone">
              <div class="icon-reorder"></div>
            </div> 
               
               <!-- END LOGO -->
               <!-- BEGIN RESPONSIVE MENU TOGGLER -->
               <a class="btn btn-navbar collapsed" id="main_menu_trigger" data-toggle="collapse" data-target=".nav-collapse">
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
                   <span class="arrow"></span>
               </a>
               <!-- END RESPONSIVE MENU TOGGLER -->
              
               <!-- END  NOTIFICATION -->
               <div class="top-nav ">
                   <ul class="nav pull-right top-menu" >
                       <!-- BEGIN SUPPORT -->
                       <li class="dropdown mtop5">

                           <a class="dropdown-toggle element" data-placement="bottom" data-toggle="tooltip" href="<?=url("app/")?>" data-original-title="MENU PRINCIPAL">
                               <i class="icon-th-large"></i>
                           </a>
                       </li>
                       <li class="dropdown mtop5">

                           <a class="dropdown-toggle element" data-placement="bottom" data-toggle="tooltip" href="<?=url("app/")?>" data-original-title="BACKUP DO SISTEMA">
                               <i class="icon-cogs"></i>
                           </a>
                       </li>
                       <!-- END SUPPORT -->
                       <!-- BEGIN USER LOGIN DROPDOWN -->
                       <li class="dropdown mtop5">
                           <a href="<?= url("/app/sair"); ?>" ata-toggle="modal" data-target="#myModalfourteen"  aria-expanded="false"  class="dropdown-toggle element" data-placement="bottom"
                            data-toggle="tooltip" data-original-title="Sair">
                     
                              <i class="icon icon-off"style="color:#fff;"></i> 
                                        
                           </a>
               
                       </li>
                       <!-- END USER LOGIN DROPDOWN -->
                   </ul>
                   <!-- END TOP NAVIGATION MENU -->
               </div>
           </div>
       </div>
       <!-- END TOP NAVIGATION BAR -->
   </div>
   <!-- END HEADER -->
   <!-- BEGIN CONTAINER -->
   <div id="container" class="row-fluid">
      <!-- BEGIN SIDEBAR -->
      <div class="sidebar-scroll">
        <div id="sidebar" class="nav-collapse collapse">

         <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
         <div class="navbar-inverse">
            <form class="navbar-search visible-phone">
               <input type="text" class="search-query" placeholder="Search" />
            </form>
         </div>
        
      </div>
      </div>
      <!-- END SIDEBAR -->
      <!-- BEGIN PAGE -->  
      <div id="main-content">
         <!-- BEGIN PAGE CONTAINER-->
         <?= $v->section('content')?>
         <!-- END PAGE CONTAINER-->
      </div>
      <!-- END PAGE -->  
   </div>
   <!-- END CONTAINER -->




   <div id="footer">
       <span>Versão: 1.0  |  Empresa:  <?=$user->empresa?></span>
   </div>

   <!-- BEGIN JAVASCRIPTS -->
   <!-- Load javascripts at bottom, this will reduce page load time -->
   <script src="<?=theme("js/jquery-1.8.3.min.js")?>"></script>
   <script src="<?=theme("js/jquery.nicescroll.js")?>" type="text/javascript"></script>
   <script type="text/javascript" src="<?=theme("assets/jquery-slimscroll/jquery-ui-1.9.2.custom.min.js")?>"></script>
   <script type="text/javascript" src="<?=theme("assets/jquery-slimscroll/jquery.slimscroll.min.js")?>"></script>
   <script src="<?=theme("assets/fullcalendar/fullcalendar/fullcalendar.min.js")?>"></script>
   <script src="<?=theme("assets/bootstrap/js/bootstrap.min.js")?>"></script>

   <!-- ie8 fixes -->
   <!--[if lt IE 9]>
   <script src="js/excanvas.js"></script>
   <script src="js/respond.js"></script>
   <![endif]-->

   <script src="<?=theme("assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js")?>" type="text/javascript"></script>
   <script src="<?=theme("js/jquery.sparkline.js")?>" type="text/javascript"></script>
   <script src="<?=theme("assets/chart-master/Chart.js")?>"></script>

   <script type="text/javascript" src="<?=theme("assets/uniform/jquery.uniform.min.js")?>"></script>
   <script type="text/javascript" src="<?=theme("assets/data-tables/jquery.dataTables.js")?>"></script>
   <script type="text/javascript" src="<?=theme("assets/data-tables/DT_bootstrap.js")?>"></script>
   <!--common script for all pages-->
   <script src="<?=theme("js/common-scripts.js")?>"></script>
   <script src="<?=theme("js/dynamic-table.js")?>"></script>
   
   <!--script for this page only-->

   <script src="<?=theme("js/easy-pie-chart.js")?>"></script>
   <script src="<?=theme("js/sparkline-chart.js")?>"></script>
   <script src="<?=theme("js/home-page-calender.js")?>"></script>
   <script src="<?=theme("js/chartjs.js")?>"></script>

   <script src="<?=theme('assets/scripts.js')?>"></script>

   <!-- END JAVASCRIPTS -->   
</body>
<!-- END BODY -->
</html>