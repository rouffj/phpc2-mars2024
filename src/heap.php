<?php

namespace App;

// Création d'un tas maximum (max-heap)
$taskHeap = new \SplMaxHeap();
//$taskHeap = new \SplMinHeap();

// Ajout de tâches avec des priorités différentes.
// La priorité doit être en 1er dans le tableau pour que l'ordre soit 
// pris en compte.
$taskHeap->insert([3, 'ATask 1']); // Priorité : 3
$taskHeap->insert([1, 'Task 2']); // Priorité : 1
$taskHeap->insert([5, 'Task 3']); // Priorité : 5
$taskHeap->insert([2, 'Task 4']); // Priorité : 2

// Exécution des tâches selon la priorité
echo "Executing tasks based on priority:\n";
while (!$taskHeap->isEmpty()) {
    $task = $taskHeap->extract(); // Extraction de la tâche de priorité maximale
    echo "Executing task: {$task[1]}, Priority: {$task[0]}\n";
    // Logique pour exécuter la tâche...
}