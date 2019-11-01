#ifndef JEU
#define JEU

#include "carte.h"
#include <vector>
#include <iostream>

class Jeu
{
	private:
		vector<Carte> vectCarte;
	public:
		void init(); // Méthode qui va permettre d'initialiser le jeu de carte avant de le distribuer aux deux joueurs
		void affiche(); // Méthode qui va permettre d'afficher le jeu du joueur
		void melange(); // Méthode qui va permettre le mélange du jeu avant de distribuer les cartes aux deux joueurs
		void ajoute(Carte uneCarte); // Méthode qui va permettre d'ajouter les carte au vecteur de cartes
		bool empty(); // Méthode qui permet d'attribuer au booléen la valeur 0 si le jeu est plein, et 1 si le jeu est vide
		Carte pop();// Méthode qui renvoie la carte du dessus du jeu, tout en la retirant du vecteur
		void ajouteDessous(Carte uneCarte); // Méthode pour ajouter le gain en dessous de son jeu
};
#endif