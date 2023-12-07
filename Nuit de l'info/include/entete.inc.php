
<?php
session_start(); // Démarrez la session



require_once ('connection.inc.php');

function chargerClasse($classname)
{
  require 'class/'.$classname.'.class.php';
}
spl_autoload_register('chargerClasse');

$manager = new QuestionManager ($db);