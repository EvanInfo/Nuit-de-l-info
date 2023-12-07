<?php
include("include/entete.inc.php");

$maxId = $manager->getMaxQuestionId();

// Récupération de la valeur courante de $id à partir de la session
$id = isset($_SESSION['current_question_id']) ? $_SESSION['current_question_id'] : 1;

// Vérification si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['form_submitted'])) {
    // Incrémentation de la valeur de $id
    $id++;

    // Si $id dépasse le maximum, réinitialisez-le à 1
    if ($id > $maxId) {
        $id = 1;
    }

    // Mise à jour de la valeur de $id dans la session
    $_SESSION['current_question_id'] = $id;
} else {
    // Si le formulaire n'est pas soumis, récupérez la valeur de $id à partir du champ caché
    $id = isset($_POST['current_question_id']) ? $_POST['current_question_id'] : $id;
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Quiz sur le Changement Climatique</title>
  <!-- Ajout des liens vers les fichiers Bootstrap locaux -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
  <div class="quiz-container">
      <h1>Quiz sur le Changement Climatique</h1>
      <form id="quizForm" action="result.php" method="post" target="_blank">
          <?php
          $question = $manager->getQuestionById($id);
          // print_r($question);

          //echo '<p>La valeur de $id est : ' . $id . '</p>';
          echo '<div class="question">';
          echo '<h3>' . $question['Question'] . '</h3>';
          print($question['OptionA']);      
          echo '<label><input type="radio" name="question1" value="' . $question['OptionA'] . '"></label><br>';
          print($question['OptionB']); 
          echo '<label><input type="radio" name="q' . $question['idQuestion'] . '" value="' . $question['OptionB'] . '"></label><br>';
          print($question['OptionC']); 
          echo '<label><input type="radio" name="q' . $question['idQuestion'] . '" value="' . $question['OptionC'] . '"></label><br>';

          echo '</div>';

          ?>
          <!-- Ajout du champ caché pour indiquer que le formulaire a été soumis -->
          <input type="hidden" name="form_submitted" value="1">
          <!-- Ajout du champ caché pour stocker la valeur actuelle de $id -->
          <input type="hidden" name="current_question_id" value="<?php echo $id; ?>">
          <input type="submit" class="btn btn-primary" value="Suivant">
      </form>
  </div>
  <script>
    document.getElementById('quizForm').addEventListener('submit', function (event) {
      // Vous pouvez ajouter d'autres vérifications ici si nécessaire

      // Si la réponse sélectionnée est correcte, laissez le formulaire être soumis normalement.
      // Sinon, empêchez l'envoi du formulaire et ouvrez la nouvelle fenêtre manuellement.
      var selectedAnswer = document.querySelector('input[name="answer"]:checked');
      if (selectedAnswer && selectedAnswer.value === '<?php echo $question["CorrectAnswer"]; ?>') {
        // Réponse correcte, laissez le formulaire être soumis normalement.
      } else {
        // Réponse incorrecte, empêche l'envoi du formulaire.
        event.preventDefault();

        // Ouvre une nouvelle fenêtre avec le script PHP uniquement pour les mauvaises réponses
        window.open('result.php?incorrect=1', '_blank');
      }
    });
  </script>
</body>
</html>
