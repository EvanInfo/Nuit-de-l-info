<?php
// Vérifie si la variable GET "incorrect" est définie
if (isset($_GET['incorrect']) && $_GET['incorrect'] == 1) {
    // Code à exécuter si la réponse est incorrecte
    echo '<script>alert("Mauvaise réponse !");</script>';
    // Ajoutez ici le reste de votre code PHP pour le traitement en cas de réponse incorrecte
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Résultat du Quiz</title>
  <!-- Ajout des liens vers les fichiers Bootstrap locaux -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
  <div class="result-container">
    <h1>Résultat du Quiz</h1>
    <!-- Ajoutez ici le contenu de la page de résultat -->
  </div>
</body>
</html>