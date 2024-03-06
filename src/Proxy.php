<?php

namespace App;

interface FileManagerInterface
{
    public function openFile(string $path);
}

class FileManager implements FileManagerInterface
{
    public function openFile(string $path)
    {
        // logique d'ouverture de fichier.
        echo 'Logique d\'ouverture du ficher'.$path."\n";
    }
}

/**
 * Exemple 1: Vérification des autorisations d'accès au fichier sans faire de logs
 */
class AuthorizationProxyFileManager implements FileManagerInterface
{
    public function __construct(private array $authorizedUsers, private FileManagerInterface $fileManager)
    {
    }

    public function openFile(string $path)
    {
        echo "Vérification d'accès au fichier".$path."\n";
        if (!$this->isUserAuthorized($path)) {
            throw new \Exception('User not authorized');
        }

        return $this->fileManager->openFile($path);
    }

    public function isUserAuthorized()
    {
        return true;
    }
}

/**
 * Exemple 2: log l'ouverture de chaque fichier sans vérifier les droits.
 */
class LoggerProxyFileManager implements FileManagerInterface
{
    public function __construct(private FileManagerInterface $fileManager)
    {
    }

    public function openFile(string $path)
    {
        // log into a file or stdout.
        echo sprintf("The file %s has been opened\n", $path);
        
        return $this->fileManager->openFile($path);
    }
}

// Je veux ouvrir un fichier sans log ni vérif des droits
echo "# Exemple 1\n";
$fileManager = new FileManager();
$fileManager->openFile('/tmp/test.log');

echo "# Exemple 2\n";
// Je veux ouvrir un fichier AVEC log mais SANS vérif des droits
$fileManager = new LoggerProxyFileManager($fileManager);
$fileManager->openFile('/tmp/test.log');

echo "# Exemple 3\n";
// Je veux ouvrir un fichier AVEC log ET AVEC vérif des droits
$fileManager = new AuthorizationProxyFileManager(['joseph', 'thomas'], new LoggerProxyFileManager(new FileManager()));
$fileManager->openFile('/tmp/test.log');