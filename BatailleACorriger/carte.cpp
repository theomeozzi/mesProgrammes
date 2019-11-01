#include "carte.h"
#include <iostream>
using namespace std;

// Les deux constructeurs de carte

Carte::Carte()
{
	// Constructeur vide
}

Carte::Carte(string leNom,string laCouleur, int laValeur)
{
	nom=leNom;
	couleur=laCouleur;
	valeur=laValeur;
}

// Affiche la carte

void Carte::affiche()
{
  cout<<"• "<<nom<<" de "<<couleur<<endl;
}

// Comparaison des deux cartes, si l'une est supérieure à l'autre, le booléen prend la valeur 1, sinon 0

bool Carte::superieur(Carte autreCarte)
{
	return valeur>autreCarte.valeur;
}

// Comparaison des deux cartes, si elles sont égales, le booléen prend la valeur 1, sinon 0

bool Carte::egal(Carte autreCarte)
{
	return valeur==autreCarte.valeur;
}

// Retourne la valeur de la carte

int Carte::getValeur()
{
	return valeur;
}

string Carte::toString()
{
	return nom+" de "+couleur;
}