#ifndef JOUEUR
#define JOUEUR

#include "cheval.h"


// Création de la classe Joueur

class Joueur
{
	// Création de propriétés privées

	private:
		string nom;
		vector <Cheval> sonCheval;

	// Création de méthodes publiques

	public:
		Joueur(string sonNom, string saCouleur);	// Constructeur de Joueur
		Joueur();	// Constructeur vide de Joueur
		int lancerDe();	// Le joueur est capable de lancer le dé
		void deplacerCheval(int nbCase);	// Le joueur est capable de déplacer son cheval
		int position();//renvoi la position actuelle du cheval
		string toString();
};

#endif