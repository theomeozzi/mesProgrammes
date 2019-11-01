<!DOCTYPE html>
<html>
    <head>

		    <title> Inscription Produceur </title>

		    <meta charset="utf-8">
		    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		    <link rel="stylesheet" type="text/css" href="../CSS/formCss.css">
		    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

	</head>

		<noscript>
				<meta http-equiv="Refresh" content="0 URL=../HTML/erreur.html">
		</noscript>

	   <body>
		    <form class="border-light p-5" action="" method="post">

   		     <p class="h4 mb-4 text-center" id="inscProd"> Inscription Producteurs </p>

           <p id="pageNum"> (Page 1/3) </p>

   		     <p class="h4 mb-4 text-center"> </p>

   		     <p id="co"> * Champs Obligatoires </p>

   		 	   <div class="div1">
   		 		    <img src="https://img.icons8.com/material/24/000000/identification-documents.png">
    			   <label for="nom" id="nom2"> * Nom </label>
    			   <input id="nom" name="nom" class="form-control mb-4" placeholder="Nom" type="text" required>

    			   <img src="https://img.icons8.com/material/24/000000/identification-documents.png">
    			   <label for="prenom" id="prenom2"> * Prénom </label>
    			   <input id="prenom" name="prenom" class="form-control mb-4" placeholder="Prénom" type="text" required>

    			   <img src="https://img.icons8.com/material/24/000000/organization.png">
	    		   <label for="entreprise" id="entreprise2"> * Nom de l'entreprise </label>
    			   <input id="entreprise" name="nomEntreprise" class="form-control mb-4" placeholder="Nom de l'entreprise" type="text" required>

    			   <img src="https://img.icons8.com/material-outlined/24/000000/business.png">
    			   <label for="activite" id="activite2"> * Activité </label>
    			   <input id="activite" name="activite" class="form-control mb-4" placeholder="Activité (ex : commerçant, artisan...)" type="text" required>

    			   <img src="https://img.icons8.com/material/24/000000/barcode.png">
    			   <label for="numEntreprise" id="numEntreprise2"> * N° SIRET </label>
    			   <input id="numEntreprise" name="siret" class="form-control mb-4" placeholder="ex : XXX XXX XXX XXXXX" type="text" required>
    		    </div>

    		    <button class="btn btn-info btn-block my-4" type="submit" id="send" onclick="validation()" name="okForm"> Envoyer </button>

		    </form>

            <script src="../Javascript/formulaire.js"></script>

	   </body>
</html>

<?php
session_start();

// Si on clique sur le boutton envoyer, on affecte les valeurs des inputs à un tableau de session et on redirige la page vers le formulaire 2

if(isset($_POST['okForm']))
{
	$_SESSION['nom']=$_POST['nom'];
	$_SESSION['prenom']=$_POST['prenom'];
	$_SESSION['nomEntreprise']=$_POST['nomEntreprise'];
	$_SESSION['activite']=$_POST['activite'];
	$_SESSION['siret']=$_POST['siret'];
}

// Si tous les champs du formulaire sont remplis, on passe à la page suivante

if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['nomEntreprise']) && !empty($_POST['activite']) && !empty($_POST['siret']))
{
	if(strlen($_SESSION['siret'])==14) // Condition de champs valides
	{
		header("location:formulaire2.php");
	}
}

?>