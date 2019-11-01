#ifndef PARTIE
#define PARTIE

#include "cheval.h"
#include "joueur.h"

// Création de la classe Partie

class Partie
{
	// Création de propriétés privées

	private:
		vector <Joueur> vectJoueur;
		vector <string> vectCouleur;
		int nbJoueur;
		string joueur;
		int couleurSaisie;
		bool gamesOver;

	// Création de méthodes publiques

	public:
		Partie();	// Constructeur vide de Partie
		void lancerJeu();	// La partie lance le jeu
		void tour();	// La partie change de tour
		bool gameOver();	// La partie se termine
};

#endif