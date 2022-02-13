  <?php


      $extensionfinal.=$extentiontelecharger.' ';
      $fichierfinal.=$ext.' ';





                     $reqav = $bdd->prepare('UPDATE publication SET fichier = ?, nbfichier = ?, extension = ? WHERE idpost = ?');
                  $reqav->execute(array( $fichierfinal, $compteur, $extensionfinal,  $pubt['idpost'] ));







            echo "<script>alert('Votre Article a été posté avec Success .');
         redi();
      function redi(){
        document.location.href='../home';
      }</script>";






     ?>
