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

        <main class="container">
            <h1 class="display-5 text-center my-5">Mon annuaire</h1>
            <?php 
                if(isset($_SESSION['role'])) 
                {                                                      
            ?>
                <div class="text-center m-5">
                    <a href="http://localhost/CoursPHP/php_web/annuaire/router.php/ajouter-contact" class="btn btn-primary">Ajouter un nouveau contact</a> 
                </div>
            <?php
                }
            ?> 
                            
            <div class="d-flex flex-wrap justify-content-between">
                <?php
                    foreach ($tableau as $element) {
                ?>

                    <div class="card mb-5 bg-light" style="width: 18rem;">
                        <?php 
                            if(isset($_SESSION['role'])) 
                            {                                                      
                        ?>                        
                            <img src="<?php echo $element->image ?>" class="card-img-top" alt="photo">
                        <?php
                            } else 
                            {
                        ?>
                            <img src="https://randomuser.me/api/portraits/lego/1.jpg" class="card-img-top" alt="photo">
                        <?php
                            }                         
                        ?> 
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $element->nom . ' '. $element->prenom  ?></h5>
                            <?php 
                                if(isset($_SESSION['role'])) 
                                {                                                      
                            ?>
                            <div><a href="tel:<?php echo $element->num_tel ?>"><?php echo $element->num_tel ?></a></div>
                            <div class="mb-4"><a href="mailto:<?php echo $element->email ?>"><?php echo $element->email ?></a></div>
                            <a href="/CoursPHP/php_web/annuaire/router.php/modifier-contact?id=<?php echo $element->id ?>" class="btn btn-warning">Modifier</a>
                            <a href="/CoursPHP/php_web/annuaire//router.php/supprimer-contact?id=<?php echo $element->id ?>" class="btn btn-dark">Supprimer</a>
                            <?php
                                }                         
                            ?>
                        </div>
                    </div>                    

                <?php
                    }
                ?>
            </div>

            
        </main>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
        </script>
    </body>
</html>