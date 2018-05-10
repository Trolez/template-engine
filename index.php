<?php
require_once "templater.php";

$templater = new SimpleTemplater();

echo $templater->renderTemplate("Templates/index.html", [
    "firstName" => "Jens",
    "lastName" => "Jensen",
    "day" => date("l")
]);
?>