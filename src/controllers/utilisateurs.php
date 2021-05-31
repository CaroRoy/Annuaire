<?php

include __DIR__. '/../../functions.php';

// FONCTIONS D'ACTION
function connect()
{
    $identifiant = 'admin';
    $password = 'admin';

    $messageErreur = null;
    if (isset($_POST['connexion']))
    {
        $messageErreur = verifierPayloadConnexion($_POST);

        if ($messageErreur === null)
        {
            if($_POST['identifiant'] === $identifiant)
                {
                    if($_POST['password'] === $password)
                    {
                        session_start();
                        $_SESSION['role'] = 'admin';
                        redirect('');
                    } else
                    {
                        $messageErreur='Mot de passe incorrect';
                        
                    }
                } else
                {
                    $messageErreur='Identifiant incorrect';
                }
        }
    }
    include __DIR__ .'/../../views/connexion.html.php';   
}

function disconnect()
{
    session_start();
    session_destroy();
    redirect('');
}


// FONCTION DE VERIFICATION

function verifierPayloadConnexion(array $data)
{
    if (!isset($data['identifiant']) || $data['identifiant'] === '')
    {
        return "Vous devez saisir votre identifiant";
    }

    if (!isset($data['password']) || $data['password'] === '')
    {
        return "Vous devez saisir votre mot de passe";
    }

    return null;
}