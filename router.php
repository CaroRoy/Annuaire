<?php

include __DIR__.'/SimpleOrm.class.php';
$conn = new mysqli('localhost', 'root', '');
SimpleOrm::useConnection($conn, 'repertoire_telephonique');

session_start();

// DECLARATION DES ROUTES

if (isset($_SERVER['PATH_INFO']) == false) 
{
    require __DIR__ . '/views/index.html.php';
} else if ($_SERVER['PATH_INFO'] == '/contacts')
{
    require __DIR__.'/src/controllers/contacts.php';
    index();
}  else if ($_SERVER['PATH_INFO'] == '/ajouter-contact')
{
    require __DIR__.'/src/controllers/contacts.php';
    create();
}  else if ($_SERVER['PATH_INFO'] == '/modifier-contact')
{
    require __DIR__.'/src/controllers/contacts.php';
    modify();
}  else if ($_SERVER['PATH_INFO'] == '/supprimer-contact')
{
    require __DIR__.'/src/controllers/contacts.php';
    delete();
}  else if ($_SERVER['PATH_INFO'] == '/connexion')
{
    require __DIR__.'/src/controllers/utilisateurs.php';
    connect();
}  else if ($_SERVER['PATH_INFO'] == '/deconnexion')
{
    require __DIR__.'/src/controllers/utilisateurs.php';
    disconnect();
} else if ($_SERVER['PATH_INFO'] == '/notfound')
{
    require __DIR__.'/src/controllers/notfound.php';
    index();
} else
{
    require __DIR__.'/src/controllers/notfound.php';
    index();
}