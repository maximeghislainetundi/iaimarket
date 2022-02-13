
		<?php if ($rqsearch_result['username'] == "utlilisateur") {
		# code...

	$recup = $bdd->prepare("SELECT * FROM admin WHERE id = ?");
	$recup->execute(array($rqsearch_result['idusershare']));
	$info = $recup->fetch();


	?>
<a href="../profil/index.php?idadmin=<?php echo $info['id'];?>"  class="apli_voir" id="<?php echo $info['id'];?>" ><div style="border: solid 2px #fff; border-radius: 10px; background-color: #fff;">
	<style type="text/css">
		a:hover, a:focus{
			text-decoration: none;
		}
	</style>
	    <img style="width: 10%;" src="../ressources/membres/logo/<?php echo $info['logo'];?>" class="img-circle"/><b>  <?php
if (empty($info['nom'])) {
	$del_exe = $bdd->prepare("DELETE FROM admin WHERE id = ?");
	$del_exe->execute(array($info['id']));
	$del_search = $bdd->prepare("DELETE FROM publication WHERE idpost = ?");
	$del_search->execute(array($rqsearch_result['idpost']));
}else{
echo $info['nom'];
}

 ?></b>
 <center><a href="../profil/index.php?idadmin=<?php echo $rqsearch_result['idusershare']; ?>" class="btn btn-primary" >VOIR LA PAGE</a class="btn btn-primary"></center>





	</div></a><hr>
	<?php

	}

	if ($rqsearch_result['username'] == "scolaire") {
		# code...

	$recup = $bdd->prepare("SELECT * FROM admin WHERE id = ?");
	$recup->execute(array($rqsearch_result['idusershare']));
	$info = $recup->fetch();

	$recupPost = $bdd->prepare("SELECT * FROM publication WHERE idpost = ?");
	$recupPost->execute(array($rqsearch_result['idpost']));
	$infoPost = $recupPost->fetch();



	?>
<a href="../profil/index.php?idadmin=<?php echo $info['id'];?>"  class="apli_voir" id="<?php echo $rqsearch_result['idpost'];?>" ><div style="border: solid 2px #fff; border-radius: 10px; background-color: #fff;">
	<style type="text/css">
		a:hover, a:focus{
			text-decoration: none;
		}
	</style>
	    <img width="30" height="30" src="../ressources/membres/logo/<?php echo $info['logo'];?>" class="img-circle"/><b>  <?php

echo $info['nom'];


 ?></b>
 <br>
 <center><b><i><?php echo $infoPost['nom']; ?></i></b></center>
 <center><a href="../commande/index.php?id=<?php echo $rqsearch_result['idpost']; ?>" class="btn-primary btn-sm">Passer Une Commande</a></center>
 <span class="pull-left"> <img width="50" height="50" class="[ img-circle pull-left ]" src="../ressources/images_site/scolaire.jpg" alt="txtalternatif">
</span><br>





	</div></a><hr>
	<?php

	}
	if ($rqsearch_result['username'] == "vetement") {
		# code...

	$recup = $bdd->prepare("SELECT * FROM admin WHERE id = ?");
	$recup->execute(array($rqsearch_result['idusershare']));
	$info = $recup->fetch();

	$recupPost = $bdd->prepare("SELECT * FROM publication WHERE idpost = ?");
	$recupPost->execute(array($rqsearch_result['idpost']));
	$infoPost = $recupPost->fetch();



	?>
<a href="../profil/index.php?idadmin=<?php echo $info['id'];?>"  class="apli_voir" id="<?php echo $rqsearch_result['idpost'];?>" ><div style="border: solid 2px #fff; border-radius: 10px; background-color: #fff;">
	<style type="text/css">
		a:hover, a:focus{
			text-decoration: none;
		}
	</style>
	    <img width="30" height="30" src="../ressources/membres/logo/<?php echo $info['logo'];?>" class="img-circle"/><b>  <?php

echo $info['nom'];


 ?></b>
 <br>
 <center><b><i><?php echo $infoPost['nom']; ?></i></b></center>
 <center><a href="../commande/index.php?id=<?php echo $rqsearch_result['idpost']; ?>" class="btn-primary btn-sm">Passer Une Commande</a></center>
 <span class="pull-left"> <img width="50" height="50" class="[ img-circle pull-left ]" src="../ressources/images_site/vetement.jpg" alt="txtalternatif">
</span><br>





	</div></a><hr>
	<?php

	}
if ($rqsearch_result['username'] == "electronique") {
		# code...

	$recup = $bdd->prepare("SELECT * FROM admin WHERE id = ?");
	$recup->execute(array($rqsearch_result['idusershare']));
	$info = $recup->fetch();

	$recupPost = $bdd->prepare("SELECT * FROM publication WHERE idpost = ?");
	$recupPost->execute(array($rqsearch_result['idpost']));
	$infoPost = $recupPost->fetch();



	?>
<a href="../profil/index.php?idadmin=<?php echo $info['id'];?>"  class="apli_voir" id="<?php echo $rqsearch_result['idpost'];?>" ><div style="border: solid 2px #fff; border-radius: 10px; background-color: #fff;">
	<style type="text/css">
		a:hover, a:focus{
			text-decoration: none;
		}
	</style>
	    <img width="30" height="30" src="../ressources/membres/logo/<?php echo $info['logo'];?>" class="img-circle"/><b>  <?php

echo $info['nom'];


 ?></b>
 <br>
 <center><b><i><?php echo $infoPost['nom']; ?></i></b></center>
 <center><a href="../commande/index.php?id=<?php echo $rqsearch_result['idpost']; ?>" class="btn-primary btn-sm">Passer Une Commande</a></center>
 <span class="pull-left"> <img width="50" height="50" class="[ img-circle pull-left ]" src="../ressources/images_site/electronique.jpg" alt="txtalternatif">
</span><br>





	</div></a><hr>
	<?php

	}

	if ($rqsearch_result['username'] == "aliment") {
		# code...

	$recup = $bdd->prepare("SELECT * FROM admin WHERE id = ?");
	$recup->execute(array($rqsearch_result['idusershare']));
	$info = $recup->fetch();


$recupPost = $bdd->prepare("SELECT * FROM publication WHERE idpost = ?");
	$recupPost->execute(array($rqsearch_result['idpost']));
	$infoPost = $recupPost->fetch();


	?>
<a href="../profil/index.php?idadmin=<?php echo $info['id'];?>"  class="apli_voir" id="<?php echo $rqsearch_result['idpost'];?>" ><div style="border: solid 2px #fff; border-radius: 10px; background-color: #fff;">
	<style type="text/css">
		a:hover, a:focus{
			text-decoration: none;
		}
	</style>
	    <img width="30" height="30" src="../ressources/membres/logo/<?php echo $info['logo'];?>" class="img-circle"/><b>  <?php

echo $info['nom'];


 ?></b>
 <br>
 <center><b><i><?php echo $infoPost['nom']; ?></i></b></center>
 <center><a href="../commande/index.php?id=<?php echo $rqsearch_result['idpost']; ?>" class="btn-primary btn-sm">Passer Une Commande</a></center>
 <span class="pull-left"> <img width="50" height="50" class="[ img-circle pull-left ]" src="../ressources/images_site/aliment.jpg" alt="txtalternatif">
</span><br>





	</div></a><hr>
	<?php

	}
	?>
