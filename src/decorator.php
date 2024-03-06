<?php

/*
Supposons que vous ayez une classe FileManager qui gère le stockage de fichiers
dans un système de fichiers local. Vous voulez ajouter des fonctionnalités 
supplémentaires, comme le chiffrement des fichiers. Vous pouvez utiliser
le modèle Decorator pour ajouter cette fonctionnalité sans modifier la classe
de base.
*/

// Interface pour FileManager
interface FileManagerInterface {
    public function store(string $filename, string $content);
    public function retrieve(string $filename);
}

// Implémentation de base de FileManager
class FileManager implements FileManagerInterface {
    public function store(string $filename, string $content) {
        file_put_contents($filename, $content);
    }

    public function retrieve(string $filename) {
        return file_get_contents($filename);
    }
}

// Décorateur pour le chiffrement des fichiers
class EncryptionDecorator implements FileManagerInterface {
    private $fileManager;

    public function __construct(FileManagerInterface $fileManager) {
        $this->fileManager = $fileManager;
    }

    public function store(string $filename, string $content) {
        $encryptedContent = $this->encrypt($content);
        $this->fileManager->store($filename, $encryptedContent);
    }

    public function retrieve(string $filename) {
        $encryptedContent = $this->fileManager->retrieve($filename);
        return $this->decrypt($encryptedContent);
    }

    private function encrypt(string $content) {
        // Logique de chiffrement
        return $content; // Simplifié pour l'exemple
    }

    private function decrypt(string $content) {
        // Logique de déchiffrement
        return $content; // Simplifié pour l'exemple
    }
}

// Utilisation
$fileManager = new FileManager();
$encryptedFileManager = new EncryptionDecorator($fileManager);

$encryptedFileManager->store('encrypted.txt', 'Secret content');
echo $encryptedFileManager->retrieve('encrypted.txt'); // Affiche le contenu déchiffré