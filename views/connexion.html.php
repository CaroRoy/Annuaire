<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Répertoire téléphonique</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    </head>

    <body style="background-color:#e3e3e3;">

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
        
        <main class="container text-center d-flex justify-content-center">
        <div class="card text-white bg-dark w-25 mt-5">
            <div class="card-header">CONNEXION</div>
            <div class="card-body">
                <form action="http://localhost/CoursPHP/php_web/annuaire/router.php/connexion" method="post" class="d-flex flex-column justify-content-center align-items-center" >
                    <input class="mb-2" type="text" name="identifiant" value="admin">
                    <input class="mb-2" type="password" name="password" value="admin">
                                        
                    <button name="connexion" type="submit" class="btn btn-light w-75">Entrer</button>
                </form>
            </div>
        </div>
        </main>


        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
        </script>
    </body>
</html>