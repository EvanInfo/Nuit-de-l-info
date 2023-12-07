<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Quiz sur le Changement Climatique</title>
  <!-- Ajout des liens vers les fichiers Bootstrap locaux -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
  <div class="quiz-container">
    <h1>Quiz sur le Changement Climatique</h1>
    <form action="check_reponse.php" method="post">
      <div class="question">
        <h3>1. Quelle est la principale cause du changement climatique ?</h3>
        <input type="radio" name="q1" value="a"> Les activités humaines<br>
        <input type="radio" name="q1" value="b"> Les éruptions volcaniques<br>
        <input type="radio" name="q1" value="c"> Les variations naturelles du climat<br>
      </div>
      <input type="submit" class="btn btn-primary" value="Suivant">
    </form>
  </div>

  <!-- Ajout des scripts Bootstrap JS (optionnel, dépend de vos besoins) -->
  <script src="jquery-3.3.1.slim.min.js"></script>
  <script src="popper.min.js"></script>
  <script src="bootstrap.min.js"></script>
</body>
</html>
