<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Répertoire téléphonique</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="http://localhost/CoursPHP/php_web/annuaire/router.php">Mon répertoire téléphonique</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost/CoursPHP/php_web/annuaire/router.php/contacts">mes contacts</a>
                        </li>
                        <?php 
                            if(isset($_SESSION['role'])) 
                            {                                                      
                        ?>
                            <li class="nav-item">
                                <a class="nav-link" href="http://localhost/CoursPHP/php_web/annuaire/router.php/ajouter-contact">créer un nouveau contact</a>
                            </li>
                        <?php
                            }
                        ?>
                    </ul>
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">                        
                        <?php 
                            if(isset($_SESSION['role'])) 
                            {                                                      
                        ?>                                
                            <li>
                                <p class="mb-0 p-2"><?php echo 'Bonjour Admin' ?></p>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="http://localhost/CoursPHP/php_web/annuaire/router.php/deconnexion">Déconnexion</a>
                            </li>
                        <?php
                            } else {
                        ?>
                            <li class="nav-item">
                                <a class="nav-link" href="http://localhost/CoursPHP/php_web/annuaire/router.php/connexion">Connexion</a>
                            </li>
                        <?php
                            }
                        ?>                        
                    </ul>           
                </div>
            </div>
        </nav>

        <main class="container d-flex flex-column align-items-center">
            <h1 class="display-5 text-center my-5">Modification du contact : <?php echo $contact->nom . ' ' . $contact->prenom ; ?></h1>

            <?php
                    if ($messageErreur !== null) 
                    {
                ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $messageErreur; ?>
                        </div>
                <?php
                    }
                ?>

                <form class="w-50 d-flex flex-column mb-5" action="http://localhost/CoursPHP/php_web/annuaire/router.php/modifier-contact?id=<?php echo $contact->id ?>" method="post" enctype="multipart/form-data" >
                    <label class="fw-bold">Nom</label>
                    <input class="mb-3" type="text" name="nom" value="<?php echo $contact->nom; ?>">
                    <label class="fw-bold">Prénom</label>
                    <input class="mb-3"  type="text" name="prenom" value="<?php echo $contact->prenom; ?>">
                    <p><strong>Photo :</strong></p>
                    <img src="http://localhost/CoursPHP/php_web/annuaire/<?php echo $contact->image; ?>" alt="image" width="200px">
                    <label>Nouvelle photo</label></br>
                    <input type="file" name="product-photo-file" class="form-control-file">
                    <input class="mb-3"  type="text" name="image" value="<?php echo $contact->image; ?>">
                    <label class="fw-bold">Numéro de téléphone</label>
                    <input class="mb-3" type="text" name="tel" value="<?php echo $contact->num_tel; ?>">
                    <label class="fw-bold">Adresse e-mail</label>
                    <input class="mb-3"  type="text" name="email" value="<?php echo $contact->email; ?>">
                    <div class="d-flex justify-content-center">
                        <button class="me-4 btn btn-success" type="submit" name="enregistrer">Enregistrer</button>
                        <a class="btn btn-dark" href="http://localhost/CoursPHP/php_web/annuaire/router.php/contacts">Abandonner</a>
                    </div>
                </form>
        </main>
        
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
        </script>
    </body>
</html>
