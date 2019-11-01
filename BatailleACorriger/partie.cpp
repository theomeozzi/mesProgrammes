#include "partie.h"
#include <cstdlib>
#include <time.h>

vector <Carte> vectCartesSurTables;

Partie::Partie()
{
	// Intitialisation de générateur de nombre aléatoire
	srand (time(NULL));

	// Intitialisation du jeu avec 32 cartes
	jeuComplet.init();
	
	// Test
	jeuComplet.affiche();
	
	// Mélange
	jeuComplet.melange();
	
	// Test
	jeuComplet.affiche();
	
	// Création de deux joueurs
	
	// Le premier
	
	cout<<endl;
	cout<<"Tapez le nom du premier joueur: ";
	string nom1;
	getline(cin,nom1);
	vectJoueur.push_back(Joueur(nom1));
	
	// Le deuxième
	
	cout<<endl;
	cout<<"Tapez le nom du deuxième joueur: ";
	string nom2;
	getline(cin,nom2);
	vectJoueur.push_back(Joueur(nom2));
	
	// Distribution
	distribuer();
	
	// Tests
	
	// Affichage des jeux des deux joueurs
	for(int noJoueur=0;noJoueur<vectJoueur.size();noJoueur++)
	{
		vectJoueur[noJoueur].afficheJeu();
	}
	
	// Lancement du jeu
	jouer();
}

void Partie::distribuer()
{
	//cout<<"void Partie::distribuer()"<<endl;
	int noCarte=0;
	
	// Obtention du nombre de joueur normalement 2 joueurs
	int nombreDeJoueur=vectJoueur.size();
	
	// Tant que le jeu n'est pas vide
	while(!jeuComplet.empty())
	{
		// Je donne la carte du dessus au joueur dont c'est le tour
		vectJoueur[noCarte%nombreDeJoueur].ajouteCarte(jeuComplet.pop());
		
		// Je passe au joueur suivant
		noCarte++;
	}
}

bool Partie::partieTerminee()
{
	int nbJoueurRestant=vectJoueur.size();

	for(int noJoueur=0;noJoueur<vectJoueur.size();noJoueur++)
	{
		if(vectJoueur[noJoueur].nAPlusDeCarte())
		{
			nbJoueurRestant--;
		}
	}

	return(nbJoueurRestant==1);
}

void Partie::tour()
{
	//cout<<"void Partie::tour()"<<endl;
	bool bataille=false;

		int valeurMax=-1;
		int indiceWinnerTour=-1;
		int nbDeWinner=0;

		for(int noJoueur=0;noJoueur<vectJoueur.size();noJoueur++)
		{
			if(!(vectJoueur[noJoueur].nAPlusDeCarte()))
			{
				Carte carteJouee=vectJoueur[noJoueur].jouer();
				vectCartesSurTables.push_back(carteJouee);
				cout<<endl;
				cout<<"Le joueur "<<vectJoueur[noJoueur].toString()<<" sort le "<<carteJouee.toString()<<endl;

				if(carteJouee.getValeur()>valeurMax)
				{
					valeurMax=carteJouee.getValeur();
					indiceWinnerTour=noJoueur;
					nbDeWinner=1;
				}

				else
				{
					if(carteJouee.getValeur()==valeurMax)
					{
						nbDeWinner++;
					}
				}
			}

		}

		if(nbDeWinner==1) // Un joueur remporte
		{
			vectJoueur[indiceWinnerTour].remporter(vectCartesSurTables);
			cout<<endl;
			cout<<vectJoueur[indiceWinnerTour].toString()<<" remporte "<<vectCartesSurTables.size()<<" cartes"<<endl;

			// Vider vectCartesSurTables
			vectCartesSurTables.resize(0);
		}

		else
		{
			// Il y a bataille

			bataille=true;
			cout<<"••••••••••••••• BATAILLE •••••••••••••••"<<endl;
			
			// Chaque joueur ajoute une carte(tour blanc)
			
			for(int noJoueur=0;noJoueur<vectJoueur.size();noJoueur++)
			{
				if(!(vectJoueur[noJoueur].nAPlusDeCarte()))
				{
					Carte carteJouee=vectJoueur[noJoueur].jouer();
					vectCartesSurTables.push_back(carteJouee);
				}
			}
		}

		// Affichage des jeux des deux joueurs

		for(int noJoueur=0;noJoueur<vectJoueur.size();noJoueur++)
		{
			vectJoueur[noJoueur].afficheJeu();
		}
		int rien;
		cin>>rien;
}

void Partie::jouer()
{
	do
	{
		tour();
	}
	
	while(!partieTerminee());
}
