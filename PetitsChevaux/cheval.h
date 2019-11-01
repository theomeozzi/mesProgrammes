#ifndef CHEVAL
#define CHEVAL

#include <iostream>
#include <vector>
#include <cstdlib>
#include <ctime>

using namespace std;


// Création de la classe Cheval

class Cheval
{
	// Création de propriétés privées

	private:
		string couleurCheval;
		int caseCheval;

	// Création de méthodes publiques

	public:
		Cheval(string saCouleur);	// Constructeur de Cheval
		Cheval();	// Constructeur de Cheval vide
		void avancer(int de);
		void affiche(); 	// Le cheval est capable de s'afficher (sa position)

		// Récupération des propriétés privées

		string& getCouleur()
		{
			return couleurCheval;
		}

		int& getCase()
		{
			return caseCheval;
		}
};

#endif