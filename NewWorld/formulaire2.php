<!DOCTYPE html>
<html>
	<head>

		<title> Inscription Producteur </title>

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

         <p id="pageNum"> (Page 2/3) </p>

   		 <p class="h4 mb-4 text-center"> </p>

   		 <p id="co"> * Champs Obligatoires </p>

    		<div class="div2">
    			<img src="https://img.icons8.com/material/24/000000/phone-disconnected.png">
    			<label for="tel" id="tel2"> * Numéro de téléphone </label>
    			<input id="tel" name="tel" class="form-control mb-4" placeholder="Téléphone" pattern="[0-9]{10}" type="text" required>

    			<img src="https://img.icons8.com/material/24/000000/iphone.png">
    			<label for="mobile" id="mobile2"> Numéro de portable </label>
    			<input id="mobile" name="mobile" class="form-control mb-4" placeholder="Portable" pattern="[0-9]{10}" type="text" required>

    			<img src="https://img.icons8.com/material/24/000000/marker.png">
    			<label for="adressep" id="adressep2"> * Adresse </label>
    			<input id="adressep" name="adresse" class="form-control mb-4" placeholder="Adresse (ex : 2 Rue Jean Jaures...)" type="text" required>

    			<img src="https://img.icons8.com/material/24/000000/city.png">
    			<label for="ville" id="ville2"> * Ville </label>
    			<input id="ville" name="ville" class="form-control mb-4" placeholder="Ville (ex : Paris, Lyon...)" type="text" required>

    			<img src="https://img.icons8.com/material/24/000000/post-office.png">
				<label for="cp" id="cp2"> * Code postal </label>
    			<input id="cp" name="cp" class="form-control mb-4" placeholder="Code postal (ex : 05000...)"  type="text" required>
    		</div>

    		<button class="btn btn-info btn-block my-4" type="submit" id="send" onclick="validation()" name="okForm"> Envoyer </button>

		</form>

            <script src="../Javascript/formulaire2.js"></script>

	</body>
</html>

<?php
session_start();

//Si on clique sur le boutton envoyer, on affecte les valeurs des inputs à un tableau de session et on redirige la page vers le formulaire 3

if (isset($_POST['okForm']))
{
	$_SESSION['tel']=$_POST['tel'];
	$_SESSION['mobile']=$_POST['mobile'];
	$_SESSION['adresse']=$_POST['adresse'];
	$_SESSION['ville']=$_POST['ville'];
	$_SESSION['cp']=$_POST['cp'];
}

// Si tous les champs du formulaire2 sont remplis, on passe à la page suivante

if(!empty($_POST['tel']) && !empty($_POST['mobile']) && !empty($_POST['adresse']) && !empty($_POST['ville']) && !empty($_POST['cp']))
{
	if(strlen($_SESSION['tel']=10) && strlen($_SESSION['mobile']) && strlen($_SESSION['cp'])) // Conditions de champs valides
	{
		header("location:formulaire3.php");
	}
}

?>