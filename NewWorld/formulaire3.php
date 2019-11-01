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
		<form class="border-light p-5" method="post" action="">

   		 <p class="h4 mb-4 text-center" id="inscProd"> Inscription Producteurs </p>

         <p id="pageNum"> (Page 3/3) </p>

   		 <p class="h4 mb-4 text-center"> </p>

   		 <p id="co"> * Champs Obligatoires </p>

   		 	<div class="div3">
                <img src="https://img.icons8.com/material/24/000000/filled-message.png">
                <label for="mail" id="mail2"> * E-Mail </label>
                <input id="mail" name="mail" class="form-control mb-4" placeholder="email@email.com" type="email" required>

                <img src="https://img.icons8.com/material/24/000000/checkmark.png">
                <label for="confirMail" id="confirMail2"> * Confirmer l'e-mail </label>
                <input id="confirMail" name="confirMail" class="form-control mb-4" placeholder="Retapez l'email" type="email" required>

                <img src="https://img.icons8.com/material/24/000000/person-male.png">
                <label for="user" id="user2"> * Nom d'utilisateur </label>
                <input id="user" name="user" class="form-control mb-4" placeholder="Nom d'utilisateur" type="text" required>

                <img src="https://img.icons8.com/material/24/000000/checkmark.png">
                <label for="confirmUser" id="confirmUser2"> * Confirmer le nom d'utilisateur </label>
                <input id="confirmUser" name="confirmUser" class="form-control mb-4" placeholder="Retapez le nom d'utilisateur" type="text" required>

                <img src="https://img.icons8.com/material/24/000000/password.png">
                <label for="mdp" id="mdp2"> * Mot de passe </label>
                <input id="mdp" name="mdp" class="form-control mb-4" placeholder="Saisir un mot de passe" type="password" oninput="testMdp()" required>
                <p id="caract"> <span id="caractere"> Minimum 8 caractères </span>, <span id="maj"> 1 majuscule </span>, <span id="min"> 1 minuscule </span> et <span id="chiffre"> 1 chiffre </span> </p>

                <img src="https://img.icons8.com/material/24/000000/checkmark.png">
                <label for="confirMdp" id="confirMdp2"> * Confirmer le mot de passe </label>
                <input id="confirMdp" name="confirMdp" class="form-control mb-4" placeholder="Retapez le mot de passe" type="password" required>
            </div>

            <button class="btn btn-info btn-block my-4" type="submit" id="send" onclick="validation()" name="okForm"> Envoyer </button>

		</form>

            <script src="../Javascript/formulaire3.js"></script>

	</body>
</html>

<?php
session_start();

//Si on clique sur le boutton envoyer, on affecte les valeurs des inputs à un tableau de session et on redirige la page vers la fin du formulaire

if(isset($_POST['okForm']))
{
	$_SESSION['mail']=$_POST['mail'];
	$_SESSION['confirMail']=$_POST['confirMail'];
	$_SESSION['user']=$_POST['user'];
	$_SESSION['confirmUser']=$_POST['confirmUser'];
	$_SESSION['mdp']=md5($_POST['mdp']);
	$_SESSION['confirMdp']=md5($_POST['confirMdp']);
}

// Si tous les champs du formulaire3 sont remplis, on passe à la page suivante

if(!empty($_POST['mail']) && !empty($_POST['confirMail']) && !empty($_POST['user']) && !empty($_POST['confirmUser']) && !empty($_POST['mdp']) && !empty($_POST['confirMdp']))
{
	if($_SESSION['mail']==$_SESSION['confirMail']) // Condition de champs valides
	{
		if($_SESSION['user']==$_SESSION['confirmUser'])
		{
			if($_SESSION['mdp']==$_SESSION['confirMdp'])
			{
				header("location:finForm.php");
			}
		}
	}
}

?>