#ifndef CARTE
#define CARTE

#include <string>
using namespace std;
class Carte
{
	private:
		string nom;
		string couleur;
		int valeur;
	public:
		Carte(string leNom,string laCouleur,int laValeur); // Constructeur de la carte
		Carte(); // Constructeur vide de la carte
		void affiche(); // Méthode pour afficher la carte
		bool superieur(Carte autreCarte); // Méthode pour comparer les valeurs des 2 cartes jouées
		bool egal(Carte autreCarte); // Méthode pour voir si les deux cartes sont égales
		int getValeur(); // Méthode pour retourner la valeur de la carte
		string toString(); // Méthode pour retourner le nom et la couleur de la carte
};
#endif