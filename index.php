<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Le Scrabblculator</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
  <link rel="stylesheet" href="./reset.css">
  <link rel="stylesheet" href="./style.css">
</head>

<body>

<h1>Le Scrabblculator</h1>

<?php

// Fonction de calcul suivant le mot renseigné et le nombre de point attribué à chaque lettre
function countScore($word)
{   
    // De base, le score vaut 0 points
    $score = 0;

    // On crée un tableau à partir des lettres du mot renseigné
    $word = str_split($_GET['word'], 1);
    //var_dump($word);
    
    // On vérifie chaque lettre du mot présente dans le tableau et on ajoute sa valeur au score
    foreach ($word as $i => $letter) {
        if (($letter == 'a') || ($letter == 'A') || ($letter == 'e') || ($letter == 'E') || ($letter == 'i') || ($letter == 'I') || ($letter == 'l') || ($letter == 'L') || ($letter == 'n') || ($letter == 'N') || ($letter == 'o') || ($letter == 'O') || ($letter == 'r') || ($letter == 'R') || ($letter == 's') || ($letter == 'S') ||($letter == 't') || ($letter == 'T') ||($letter == 'u') || ($letter == 'U')) {

            $score = $score + 1;

        } elseif (($letter == 'd') || ($letter == 'D') || ($letter == 'g') || ($letter == 'G') || ($letter == 'm') || ($letter == 'M')) {

            $score = $score + 2;

        } elseif (($letter == 'b') || ($letter == 'B') || ($letter == 'c') || ($letter == 'C') || ($letter == 'p') || ($letter == 'P')) {

            $score = $score + 3;

        } elseif (($letter == 'f') || ($letter == 'F') || ($letter == 'h') || ($letter == 'H') || ($letter == 'v') || ($letter == 'V')) {

            $score = $score + 4;

        } elseif (($letter == 'j') || ($letter == 'J') || ($letter == 'q') || ($letter == 'Q')) {

            $score = $score + 8;

        } elseif (($letter == 'k') || ($letter == 'K') || ($letter == 'w') || ($letter == 'W') || ($letter == 'x') || ($letter == 'X') || ($letter == 'y') || ($letter == 'Y') || ($letter == 'z') || ($letter == 'Z')) {

            $score = $score + 10;

        } 

    };

    // On retourne le score
    return $score;
}


// Si un mot est renseigné
if (!empty($_GET['word'])) {

    $word = $_GET['word'];

    // Le score est calculé selon la fonction de calcul du score
    $score = countScore($word);

// Si aucun mot n'est renseigné
} else {
    // Le score est alors de 0
    $score = '0';
};

?>

<!-- Formulaire de renseignement du mot dont on veut le score -->
<form id="form" action="" method="get"> 
    <div class="form-row">
        <p>Combien de points pour
            <input type="text" id="word" name="word" value="Votre mot" minlenght="2" maxlenght="15" required>
         ?</p>

    </div>

    <button id="submit-form" type="submit">Aller compte!</button>

</form>
 
<!-- Affichage du score du mot renseigné en nombre de points-->
<p id="answer"><strong>

    <?php
    if (!empty($_GET['word'])) {
        $word = (string)$_GET['word'];
        echo $word;
    } else {
        echo '';
    };
    ?></strong>

    <?=' '.'permet de cumuler '.$score.' points.'?>

</p>

</body>

</html>