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
            $messageErreur = verifierPayload($_POST);
            if ($messageErreur === null)
            {
                $contact = convertirPayloadEnObjet($_POST);
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
            $messageErreur = verifierPayload($_POST);
            if ($messageErreur === null)
            {        
                $contact->nom = $_POST['nom'];
                $contact->prenom = $_POST['prenom'];
                $contact->num_tel = $_POST['tel'];
                $contact->email = $_POST['email'];
                $contact->image = $_POST['image'];

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

    if (!isset($data['image']) || $data['image'] === '')
    {
        return "Vous devez insérer l'url de la photo";
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

function convertirPayloadEnObjet(array $data)
{
    $contact = new Contacts();

    $contact->nom = $data['nom'];
    $contact->prenom = $data['prenom'];
    $contact->num_tel = $data['tel'];
    $contact->email = $data['email'];
    $contact->image = $data['image'];

    return $contact;
}