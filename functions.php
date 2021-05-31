<?php

function redirect(string $path)
{
    header('LOCATION: /CoursPHP/php_web/annuaire/router.php' . $path);
    die();
}

function enregistrerFichierEnvoye(array $infoFichier): string
{
    $timestamp = strval(time());
    $extension = pathinfo(basename($infoFichier["name"]), PATHINFO_EXTENSION);
    $nomDuFichier = 'contact_' . $timestamp . '.' . $extension;
    $dossierStockage = __DIR__ . '/uploads/';

    if (file_exists($dossierStockage) === false)
    {  
        mkdir($dossierStockage);
    }

    move_uploaded_file($infoFichier["tmp_name"], $dossierStockage . $nomDuFichier);
    return '/uploads/' . $nomDuFichier;
}