#include "jeu.h"
#include<string>
#include <cstdlib>
using namespace std;

/**
 * initialise le jeu avec 32 cartes
 */
void Jeu::init()
{
	// Pour les 4 couleurs

	string tabCoul[4]={"♥","♦","♣","♠"};
	string tabNom[8]={"7","8","9","Valet","Dame","Roi","10","As"};

	// Pour chaque couleur
	
	for(int couleur=0;couleur<4;couleur++)
	{
		// Pour chaque nature de carte
		
		for(int valeur=0;valeur<8;valeur++)
		{
			// On ajoute la carte au jeu
			vectCarte.push_back(Carte(tabNom[valeur],tabCoul[couleur],valeur));
		}
	}
}

void Jeu::ajouteDessous(Carte uneCarte)
{
	//cout<<"void Jeu::ajouteDessous(Carte uneCarte)"<<endl;
	vectCarte.insert(vectCarte.begin(),uneCarte);
}

void Jeu::affiche()
{
	cout<<"••••••••••••••••••••••••••••••••••••••••••••••"<<endl;
	for (int noCarte=0;noCarte<vectCarte.size();noCarte++)
	{
		vectCarte[noCarte].affiche();
	}
}

void Jeu::melange()
{
	// 15 permutations on verra bien ce que ça donne
	for(int noPermutation=0;noPermutation<15;noPermutation++)
	{	  
		// Je tire deux numéros au hazard
		int noCarte1=rand()%32;
		int noCarte2=rand()%32;

		// Permutation des deux cartes
		Carte temporaire=vectCarte[noCarte1];
		vectCarte[noCarte1]=vectCarte[noCarte2];
		vectCarte[noCarte2]=temporaire;
	}
}

void Jeu::ajoute(Carte laCarte)
{
	vectCarte.push_back(laCarte); // On ajoute la carte au vecteur de cartes
}

bool Jeu::empty()
{
  return(vectCarte.size()==0); // On return la validité de l'instruction, si la taille du vecteur est à 0, le booléen sera égal à 1 et si le joueur possède encore des cartes (vectCarte.size()!==0) alors le booléen sera à 0
}

Carte Jeu::pop()
{
	Carte laCarte=vectCarte.back();

	// On supprime la dernière carte

	vectCarte.pop_back();
	return laCarte;
}