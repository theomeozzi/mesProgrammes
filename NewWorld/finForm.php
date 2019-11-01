<!DOCTYPE html>
<html>
	<head>
		<title> Inscription </title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<link rel="stylesheet" type="text/css" href="../CSS/formCss.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

	</head>

	<noscript>
			<meta http-equiv="Refresh" content="0 URL=../HTML/erreur.html">
	</noscript>
	
	<body>
		<?php

			// On inclut le fichier gestionInscription.php

			include "gestionInscription.php";

			// On inclut le fichier connect.php

			echo " ";
			include "connect.php";

			// Récupération des variables nécéssaires au mail de confirmation

			$mail=$_SESSION['mail'];
			$user=$_SESSION['user'];

			// Génération de la clé aléatoire

			$crypt=$_SESSION['mail'];
			$cle=md5($crypt);

			// Cryptage du mot de passe

			$mdp=$_SESSION['mdp'];
			$mdpHache=$mdp;

			// Création de la variable actif qui reçoit 0 dès l'inscription et qui sera passée à 1 lors de la validation du mail

			$actif=0;

			// Enregistrement des données dans la BDD

			$req="insert into nwProducteur(prodNom, prodPrenom, prodActivite, prodMobile, prodMail, prodUser, prodMdp, cle, actif) values ('".$_SESSION['nom']."','".$_SESSION['prenom']."','".$_SESSION['activite']."','".$_SESSION['mobile']."','".$_SESSION['mail']."','".$_SESSION['user']."','".$mdpHache."','".$cle."',0)";
			$req2="insert into nwEntreprise values ('".$_SESSION['nomEntreprise']."','".$_SESSION['siret']."','".$_SESSION['adresse']."','".$_SESSION['ville']."','".$_SESSION['cp']."','".$_SESSION['tel']."'";
			$maBase->query($req);
			//echo $req;
			//echo $req2;
			
			// Préparation du mail contenant le lien d'activation

			$destinataire=$mail;
			$sujet="Confirmation de votre compte";
			$entete="From: tmeozzi@btsinfogap.org";
			$message="Bonjour, merci pour votre inscription auprès de notre site internet New World !

Pour valider votre compte, veuillez cliquer sur le lien suivant : 

http://172.29.56.16/~tmeozzi/NW/PHP/validation.php?user=".urlencode($user)."&cle=".urlencode($cle)."

Si vous n'êtes pas à l'origine de cette demande, merci d'IGNORER ce mail !

┌‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒┐
│Merci de ne pas répondre à ce mail !│
└‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒┘";
					  
			 //Envoi du mail

			 if(mail($destinataire, $sujet, $message, $entete))
			 {
			 	echo " OK";
			 }

			 else
			 {
			 	echo " PAS OK";
			 }
		?>

	</body>
</html>