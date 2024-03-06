<?php

namespace App;

/*
Suivre l'historique des actions de l'utilisateur dans une application web, telles que la navigation entre différentes pages.
Vous pouvez utiliser SplStack pour stocker cet historique et 
gérer les actions de navigation.
*/

// Création d'un objet SplStack
$navigationHistory = new \SplStack();

// L'utilisateur navigue vers différentes pages
$navigationHistory->push('/home');
$navigationHistory->push('/products');
$navigationHistory->push('/contact');

foreach ($navigationHistory as $page) {
    echo "- $page\n";
}

// L'utilisateur revient en arrière
$previousPage = $navigationHistory->pop();
echo "User returned back to: $previousPage\n";

// L'utilisateur navigue vers une nouvelle page
$navigationHistory->push('/about');

// Affichage de l'historique de navigation
echo "Navigation history:\n";
foreach ($navigationHistory as $page) {
    echo "- $page\n";
}