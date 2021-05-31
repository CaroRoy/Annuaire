<?php

function redirect(string $path)
{
    header('LOCATION: /CoursPHP/php_web/annuaire/router.php' . $path);
    die();
}