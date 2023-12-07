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
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <!-- Lien vers la police Google Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap">
  <link href="css/Page2.css" rel="stylesheet" />
  <title>Document</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="images/palm.png" alt="Palm" class="img-fluid rounded">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.html">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Questionaire.html">Quizz</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">A propos</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Ajout du rectangle blanc au centre de la page -->
  <div class="center-container">
    <div class="quiz-container">
      <!-- Contenu du quizz à ajouter ici -->
      <h3>Question 1:</h3>
      <p>Quelle est la capitale de la France?</p>
      <form id="quizForm" action="" method="post" target="_blank">
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
