#include "cheval.h"

// On code la méthode de la classe Cheval

Cheval::Cheval(string saCouleur)
{
	couleurCheval=saCouleur;
	
	// Position initiale du cheval
	caseCheval=0;
}

void Cheval::avancer(int de)
{
	caseCheval+=de;
}

void Cheval::affiche()
{
	cout<<"je suis le cheval"<<couleurCheval<<" et je suis sur la case "<<caseCheval<<endl;
}