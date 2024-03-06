<?php

/*
Gérer une file d'attente des tâches à exécuter dans une application de
traitement de données. Vous pouvez utiliser SplQueue pour stocker 
ces tâches et gérer leur exécution dans l'ordre d'arrivée.
*/

$taskQueue = new SplQueue();
$taskQueue->enqueue('Task1: Create user account');
$taskQueue->enqueue('Task2: Resize profile image');
$taskQueue->enqueue('Task3: encode movie file');

while (!$taskQueue->isEmpty()) {
    echo 'Executing task:'. $taskQueue->dequeue()."\n";
}
var_dump($taskQueue);