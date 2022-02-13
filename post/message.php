     <?php

   $tim = time();


                     $recherche_brute_txt = $_POST['message'];

        $lettre_remplace = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','È','É','Ê','Ë','è','é','ê','ë','ē','ĕ','Ė','ė','à','á','â','ã','ä','å','æ','ç','ì','í','î','ï');
        $lettre_nvelle_minuscule = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','S','t','u','v','w','x','y','z','e','e','e','e','e','e','e','e','e','e','e','e','a','a','a','a','a','a','a','c','i','i','i','i');
        $recherche_filtre_txt = str_replace($lettre_remplace, $lettre_nvelle_minuscule, $recherche_brute_txt);
                  // $recherche_brute_nom = $reqs['nom'];

        $requser= $bdd->prepare("SELECT * FROM admin WHERE id = ?");
        $requser->execute(array($_SESSION['admin']));
        $userinfo = $requser->fetch();
        $recherche = $recherche_filtre_txt.' '.$userinfo['nom'].' '.$userinfo['username'];

          $c = $_FILES['file']['size'][0];


                if (!empty($recherche_brute_txt) AND !empty($prix) AND !empty($nom) AND intval($c) != 0) {



                        $oui="oui";

                         $newtext = $bdd->prepare("INSERT INTO publication(idusershare, posttext, timestamp, username, nom, prix) VALUES(?, ?, ?, ?, ?, ?)");
                             $newtext->execute(array($_SESSION['admin'], $message, $tim, $nat_article, $nom, $prix));



                             $pubtt = $bdd->prepare("SELECT * FROM publication  WHERE idusershare = ? AND  posttext = ? AND timestamp = ? AND username = ? AND nom = ? AND prix = ?");
                       $pubtt->execute(array($_SESSION['admin'], $message, $tim, $nat_article, $nom, $prix));
                       $pubt = $pubtt->fetch();

                      $insertRecherche = $bdd->prepare("INSERT INTO recherche(recherche, username, idpost, idusershare) VALUES(?, ?, ?, ?)");
              $insertRecherche->execute(array($recherche, $nat_article, $pubt['idpost'], $_SESSION['admin']));







   }
     else{
     $erreur = "Vous Devez Remplir les Tous Les champs y Compris celui de  l'image";

     }






?>
