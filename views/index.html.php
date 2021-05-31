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
            <h1 class="display-5 text-center my-5">Bienvenue dans cet annuaire</h1>

            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nemo laudantium, totam, assumenda soluta, et illo quas libero cum id illum ipsam velit mollitia facilis? Optio repellendus, obcaecati id sequi ex in nihil laudantium mollitia consequatur quos, adipisci assumenda repellat itaque aperiam perspiciatis dolor, magni fugiat! Error temporibus perferendis beatae ipsa delectus, enim consectetur quia aliquam voluptate tempora sint inventore! Dicta, dolore esse et ut fugiat nulla facilis aut aperiam ipsum eum, voluptatem eaque eius iure, omnis consequuntur dignissimos laborum ullam reprehenderit distinctio quis nostrum placeat porro? Est, temporibus distinctio! Reprehenderit commodi rem hic fugiat at nesciunt accusantium nihil atque distinctio.</p>

        </main>
        
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
        </script>
    </body>
</html>