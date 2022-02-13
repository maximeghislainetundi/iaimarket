<?php session_start();

if(!isset($_SESSION['admin'])){
header("Location:../../home");
}?>
<!DOCTYPE html>

<html lang="fr">
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="robots" content="noindex, nofollow">

    <title>IAIMARKET</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="../../ressources/images_site/logo.jpg"/>
    <link href="../../entete/entete/css/bootstrap.css" rel="stylesheet" id="bootstrap-css">
     <link href="../../entete/entete/css/style2.css" rel="stylesheet" id="style-css">
     <link href="../../entete/entete/css/style.css" rel="stylesheet" id="style-css">

  <script src="../../entete/entete/js/jquery-1.11.1.min.js"></script>
    <script src="../../entete/entete/js/bootstrap.js"></script>
  <style>
         @import url("//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css");
  </style>
    <script type="text/javascript">
        window.alert = function(){};
        var defaultCSS = document.getElementById('bootstrap-css');
        function changeCSS(css){
            if(css) $('head > link').filter(':first').replaceWith('<link rel="stylesheet" href="'+ css +'" type="text/css" />');
            else $('head > link').filter(':first').replaceWith(defaultCSS);
        }
        $( document ).ready(function() {
          var iframe_height = parseInt($('html').height());
          window.parent.postMessage( iframe_height, '../../home');
        });
    </script>
     <style type="text/css">
   #contenu{
    float: none;
    margin: 0 auto;
  }
</style>
    </head>
    <body>
<br><br><br>
    <div id="throbber" style="display:none; min-height:120px;"></div>
<div id="noty-holder"></div>
<div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Barre De Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="../../home">
                <img src="../../ressources/images_site/logo.jpg" width="40" alt="LOGO">
            </a>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">

            <li class="dropdown">
                <a href="https://s.bootsnipp.com/iframe/eNe4v#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Administrateur <b class="fa fa-angle-down"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="../../parametre/"><i class="fa fa-fw fa-user"></i>Parametre</a></li>
                    <li><a href="../../parametre/mdp.php"><i class="fa fa-fw fa-cog"></i> Changer Le Mot De Passe</a></li>
                    <li class="divider"></li>
                    <li><a href="../../deconexion"><i class="fa fa-fw fa-power-off"></i> Deconexion</a></li>
                </ul>
            </li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="navbar-collapse navbar-ex1-collapse collapse" aria-expanded="false" style="height: 1px;">
            <ul class="nav navbar-nav side-nav">


                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-2"><i class="fa fa-fw fa-star"></i>  Commandes Clients  <i class="fa fa-fw fa-angle-down pull-right"></i></a>
                    <ul id="submenu-2" class="collapse">
                        <li><a href="../../admin/alimentation"></i> Produits Alimentaires</a></li>
                        <li><a href="../../admin/vestimentaire"><i class="fa fa-angle-double-right"></i> Articles Vestimentaire</a></li>
                        <li><a href="../../admin/electronique"><i class="fa fa-angle-double-right"></i> Articles Electronique</a></li>
                        <li><a href="../../admin/scolaire"><i class="fa fa-angle-double-right"></i> Produits Scolaires</a></li>
                    </ul>
                </li>

                <li>
                    <a href="../../post"><i class="fa fa-fw fa-paper-plane-o"></i> Publier Un Article </a>
                </li>

            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>




