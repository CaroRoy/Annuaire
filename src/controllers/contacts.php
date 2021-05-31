<?php

include __DIR__. '/../models/Contact.php';
include __DIR__. '/../../functions.php';

//FONCTIONS D'ACTION

function index()
{
    $tableau = Contacts::all();
    include __DIR__ .'/../../views/contacts.html.php';
}

function create()
{   
    if(isset($_SESSION['role']) && $_SESSION['role'] === 'admin')
    {
        $contact = new Contacts();
        $messageErreur = null;
        if (isset($_POST['enregistrer']))
        {
            $messageErreur = verifierPayload($_POST, $_FILES);
            if ($messageErreur === null)
            {
                $contact = convertirPayloadEnObjet($_POST, $_FILES);
                $contact->save();
                redirect('/contacts');
            }
        }

        include __DIR__ . '/../../views/ajout.html.php';
    }
    else 
    {
        redirect('/notfound');
    }
}

function modify()
{
    if(isset($_SESSION['role']) && $_SESSION['role'] === 'admin')
    {
        if (!isset($_GET['id']))
        {
            die();
        }

        $contact = Contacts::retrieveByPK($_GET['id']);

        $messageErreur = null;

        if (isset($_POST['enregistrer']))
        {
            $messageErreur = verifierPayload($_POST, $_FILES);
            if ($messageErreur === null)
            {        
                $contact->nom = $_POST['nom'];
                $contact->prenom = $_POST['prenom'];
                $contact->num_tel = $_POST['tel'];
                $contact->email = $_POST['email'];

                if($_FILES['product-photo-file']['name'] !== '') {
                    $fichier = enregistrerFichierEnvoye($_FILES["product-photo-file"]);
                    $contact->image = $fichier;
                }

                $contact->save();
                
                redirect('/contacts');
            }      
        }
        
        include __DIR__ . '/../../views/modif.html.php';
    } else 
    {
        redirect('/notfound');
    }
}

function delete()
{   
    if(isset($_SESSION['role']) && $_SESSION['role'] === 'admin')
    {
        if (!isset($_GET['id']))
        {
            die();
        }

    $contact = Contacts::retrieveByPK($_GET['id']);
    $contact->delete();
    redirect('/contacts');
    } else 
    {
        redirect('/notfound');
    }
}

// FONCTIONS DE VERIFICATION

function verifierPayload(array $data)
{
    if (!isset($data['nom']) || $data['nom'] === '')
    {
        return "Vous devez spécifier un nom";
    }

    if (!isset($data['prenom']) || $data['prenom'] === '')
    {
        return "Vous devez spécifier un prénom";
    }

    if (isset($file['product-photo-file']) && $file['product-photo-file']['name'] !== '')
    {
        if (!in_array($file['product-photo-file']['type'], ['image/webp', 'image/png', 'image/jpg', 'image/jpeg']))
        {
            return "Le type de fichier " . $file['product-photo-file']['type'] . " n'est pris en charge";
        }

        if ($file['product-photo-file']['size'] > 10000000)
        {
            return "Le fichier est trop gros: il fait " . $file['product-photo-file']['size']. ' octets';
        }
    }

    if (!isset($data['tel']) || $data['tel'] === '')
    {
        return "Vous devez spécifier un numéro de téléphone";
    }

    if (!isset($data['email']) || $data['email'] === '')
    {
        return "Vous devez spécifier une adresse e-mail";
    }

    return null;
}

function convertirPayloadEnObjet(array $data, array $file)
{
    $contact = new Contacts();

    $contact->nom = $data['nom'];
    $contact->prenom = $data['prenom'];
    $contact->num_tel = $data['tel'];
    $contact->email = $data['email'];

    $fichier = enregistrerFichierEnvoye($file["product-photo-file"]);
    $contact->image = $fichier;

    return $contact;
}