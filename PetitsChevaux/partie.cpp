#include "partie.h"
#include "cheval.h"

// On code les méthodes de la classe Partie

Partie::Partie()
{
	cout<<"Saisissez le nombre de joueurs : "<<endl;
	cin>>nbJoueur;
	cin.ignore(1);

	vectCouleur.push_back("Rouge");
	vectCouleur.push_back("Jaune");
	vectCouleur.push_back("Bleu");
	vectCouleur.push_back("Vert");

	for(int noJoueur=0; noJoueur<nbJoueur; noJoueur++)
	{
		cout<<endl;
		cout<<"Saisissez le nom du joueur "<<noJoueur+1<<" :"<<endl;
		getline(cin, joueur);

		cout<<endl;

		cout<<"Choisissez la couleur de votre cheval : "<<endl;

		cout<<endl;

		for(int noCouleur=0; noCouleur<vectCouleur.size(); noCouleur++)
		{
			cout<<"Tapez "<<noCouleur+1<<" pour choisir la couleur "<<vectCouleur[noCouleur]<<endl;
		}

		cout<<endl;
		
		cin>>couleurSaisie;
		cin.ignore(1);
		vectJoueur.push_back(Joueur(joueur, vectCouleur[couleurSaisie-1]));
	}
}

void Partie::lancerJeu()
{
	// On fait un tour tant que le nombre de joueur est > 1

	do
	{
		tour();

	} while(!(gameOver()));
}

void Partie::tour()
{
	// Obtention du nombre de joueur

	int tailleJoueur=vectJoueur.size();
	
	// Pour chaque joueur encore dans la partie
	
	for(int noJoueur=0; noJoueur<tailleJoueur; noJoueur++)
	{
		// Si le joueur n'est pas arrivé
		if(vectJoueur[noJoueur].position()!=63)
		{
			cout<<endl;
			cout<<"C'est au tour de "<<vectJoueur[noJoueur].toString()<<" de jouer : "<<endl;
			
			// Il lance le dé
			int nbTire=vectJoueur[noJoueur].lancerDe();
			
			// Se déplacer du nombre de case obtenu à la ligne du dessus
			vectJoueur[noJoueur].deplacerCheval(nbTire);
			
			cout<<"Le joueur "<<vectJoueur[noJoueur].toString()<<" est à la case "<<vectJoueur[noJoueur].position()<<endl;

			// Si le joueur est arrivé, on affiche qu'il est arrivé
			if(vectJoueur[noJoueur].position()==63)
			{
				cout<<endl;
				cout<<"Le joueur "<<vectJoueur[noJoueur].toString()<<" est arrivé !"<<endl;
				nbJoueur--;
			}
		}
	}
}


bool Partie::gameOver()
{
	return nbJoueur==1;
}