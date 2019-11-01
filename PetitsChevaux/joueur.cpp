#include "joueur.h"

// On code les méthodes de la classe Joueur

Joueur::Joueur(string sonNom, string saCouleur)
{
	nom=sonNom;
	sonCheval.push_back(Cheval(saCouleur));
}

int Joueur::lancerDe()
{
	int de;
	de=(rand()%6)+1;
	return de;
}

void Joueur::deplacerCheval(int nbCase)
{
	sonCheval[0].avancer(nbCase);
}

int Joueur::position()
{
	return sonCheval[0].getCase();
}

string Joueur::toString()
{
	return nom;
}