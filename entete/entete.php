<?php
session_start();
?>
<!DOCTYPE html>

<html lang="fr">
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="robots" content="noindex, nofollow">

    <title>IAIMARKET</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="../ressources/images_site/logo.jpg"/>
    <link href="../entete/entete/css/bootstrap.css" rel="stylesheet" id="bootstrap-css">
     <link href="../entete/entete/css/style.css" rel="stylesheet" id="style-css">
    <style type="text/css">


.open>.dropdown-menu {
    background-color: aquamarine;
    display: block;
}
.panel-google-plus, .panel-heading, .panel-footer, .panel-body {
    border-radius: 20px;
}



.normal {
xheight: 75px;
-webkit-transition: 0.5s;
-moz-transition: 0.5s;
-ms-transition: 0.5s;
transition: 0.5s;
}

.normal .navbar-right {
padding-top: 12px;
-webkit-transition: 0.5s;
-moz-transition: 0.5s;
-ms-transition: 0.5s;
transition: 0.5s;
}
.navbar-brand {
padding: 0px !important;
}
.navbar-brand img {
padding: 5px;
max-height: 75px;
-webkit-transition: 0.5s;
-moz-transition: 0.5s;
-ms-transition: 0.5s;
transition: 0.5s;
}
.shrink {
height: 50px;
-webkit-transition: 0.5s;
-moz-transition: 0.5s;
-ms-transition: 0.5s;
transition: 0.5s;
}
.shrink .navbar-right {
padding-top: 0px;
-webkit-transition: 0.5s;
-moz-transition: 0.5s;
-ms-transition: 0.5s;
transition: 0.5s;
}
.shrink .navbar-brand img {
max-height: 50px;
-webkit-transition: 0.5s;
-moz-transition: 0.5s;
-ms-transition: 0.5s;
transition: 0.5s;
}
    </style>
    <script src="../entete/entete/js/jquery-1.11.1.min.js"></script>
    <script src="../entete/entete/js/bootstrap.js"></script>

</head>
<body>




    <nav class="navbar navbar-inverse navbar-fixed-top normal" role="navigation">

      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Barre De Navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="../home"><img class="img-responsive" src="../ressources/images_site/logo.jpg" alt=""></a>

          <?php
if (isset($_SESSION['admin'])) {

          ?>
          <font color="white">
<a href="" download=""></a>
                  <span class="dropdown " >
                    &nbsp;&nbsp;&nbsp;&nbsp;<a data-toggle="dropdown" href="#"><img src="../ressources/images_site/logo2.jpg" style="background-color: #fff;" class="img-circle" width="22" alt="vf"  /></a>
            <ul class="dropdown-menu">
              <li id="noti-sms" class="dropdown">
                    <a href="../admin"><img src="../ressources/images_site/logo.jpg" width="22" >&nbsp;&nbsp;Tableau De Bord</a><br>
              </li>
                <li id="noti-sms" class="dropdown">
                    <a href="../recherche"><img src="../ressources/images_site/loupe.png" width="22" >&nbsp;&nbsp;chercher </a><br>
              </li>
              <li id="noti-sms" class="dropdown">
                    <a href="../ressources/apk/iaimarket.apk" download="iaimarket.apk"><img src="../ressources/images_site/apk.jpg" width="22" >&nbsp;&nbsp;Telecharger L'apli Android </a><br>
              </li>
              <li id="noti-sms" class="dropdown">
                    <a href="../comptoirs"><img src="../ressources/images_site/comptoire.jpg" width="22" >&nbsp;&nbsp;Listes Des Comptoirs </a><br>
              </li>
              <li id="noti-post" class="dropdown" >
                <a href="../parametre"><img src="../ressources/images_site/parametre.jpg" width="22" >&nbsp;&nbsp;Parametre</a><br>
              </li>
              <li id="noti-abonement-ei" class="dropdown">
                <a href="../deconexion"><img src="../ressources/images_site/deconexion.jpg" width="22" >&nbsp;&nbsp;Deconnexion</a><br>
              </li>
            </ul>
              </span>&nbsp;&nbsp;

                </font>
              <?php }
              else{ ?>
                  <font color="white">

                  <span class="dropdown" >
                    &nbsp;&nbsp;&nbsp;&nbsp;<a data-toggle="dropdown" href="#"><img src="../ressources/images_site/main2.jpg" style="background-color: #fff;" class="img-circle" width="22" alt="vf"  /></a>
            <ul class="dropdown-menu">
              <li id="noti-sms" class="dropdown">
                    <a href="../recherche"><img src="../ressources/images_site/loupe.png" width="22" >&nbsp;&nbsp;chercher </a><br>
              </li>
              <li id="noti-sms" class="dropdown">
                    <a href="../ressources/apk/iaimarket.apk" download="iaimarket.apk"><img src="../ressources/images_site/apk.jpg" width="22" >&nbsp;&nbsp;Telecharger L'apli Android </a><br>
              </li>
              <li id="noti-sms" class="dropdown">
                    <a href="../comptoirs"><img src="../ressources/images_site/comptoire.jpg" width="22" >&nbsp;&nbsp;Listes Des Comptoirs </a><br>
              </li>

              <li id="noti-abonement-ei" class="dropdown">
                <a href="../login"><img src="../ressources/images_site/connexion.jpg" width="22" >&nbsp;&nbsp;Connexion</a><br>
              </li>
            </ul>
              </span>&nbsp;&nbsp;

                </font>

              <?php } ?>
        </div>
        <div id="navbar" class="navbar-collapse collapse" aria-expanded="false" style="height: 1px;">
<center>
          <ul class="nav navbar-nav navbar-right">

            <li class="active"><a href="../home"><img src="../ressources/images_site/logo.jpg" width="20" >&nbsp;&nbsp;Acceuil</a>
            </li>
            <li class="active"><a href="../alimentation"><img src="../ressources/images_site/aliment.jpg" width="20" >&nbsp;&nbsp;Aliment</a>
            </li>
            <li class="active"><a href="../vestimentaire"><img src="../ressources/images_site/vetement.jpg" width="20" >&nbsp;&nbsp;Vestimentaire</a>
            </li>

            <li class="active"><a href="../electronique"><img src="../ressources/images_site/electronique.jpg" width="20" >&nbsp;&nbsp;Electronique</a>
            </li>

            <li class="active"><a href="../scolaire"><img src="../ressources/images_site/scolaire.jpg" width="20" >&nbsp;&nbsp;Scolaire</a>
            </li>


          </ul>
          </center>
        </div>

      </div>

    </nav>
    <style type="text/css">
   #contenu{
    float: none;
    margin: 0 auto;
  }
</style>
