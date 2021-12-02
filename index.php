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
{   // On crée un tableau associatif lettre => point
    $pointsPerLetter = [
        'A' => 1,
        'B' => 3,
        'C' => 3,
        'D' => 2,
        'E' => 1,
        'F' => 4,
        'G' => 2,
        'H' => 4,
        'I' => 1,
        'J' => 8,
        'K' => 10,
        'L' => 1,
        'M' => 2,
        'N' => 1,
        'O' => 1,
        'P' => 3,
        'Q' => 8,
        'R' => 1,
        'S' => 1,
        'T' => 1,
        'U' => 1,
        'V' => 4,
        'W' => 10,
        'X' => 10,
        'Y' => 10,
        'Z' => 10,
    ];

    // De base, le score vaut 0 points
    $score = 0;

    // On crée un tableau à partir des lettres du mot renseigné
    $uppercaseWord = strtoupper($_GET['word']);
    $word = str_split($uppercaseWord, 1);
    // var_dump($word);
    
    // On vérifie chaque lettre du mot présente comme clé dans le tableau et on ajoute sa valeur au score
    foreach ($word as $letter) {
        if (array_key_exists($letter, $pointsPerLetter)) {
            $score = $score + $pointsPerLetter[$letter];
        }
    };
    // var_dump($score);

    // On vérifie ensuite si une lettre est renseignée comme double et ou triple et on multiplie de temps si besoin
/*     if () { 
        ;
    } elseif () {
        ;
    } else {
        ;
    } */

    // On vérifie enfin si le mot compte double ou triple et on multiplie de tant si besoin
    if (isset($_GET['doubleWord'])) {
        $score = $score*2;
    } elseif (isset($_GET['tripleWord'])) {
        $score = $score*3;
    } else {
        $score = $score;
    }

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
            <!-- On renseigne le mot -->
            <input type="text" id="word" name="word" value="Votre mot" minlenght="2" maxlenght="15" required>
         ?</p>        
    </div>

    <div id="extras">
        <!-- On précise si
        une lettre compte double -->
        <div>
            <label for="doubleLettre">Lettre compte double</label>
            <input type="text" id="doubleLetter" name="doubleLetter" maxlength="1" size="1" value="?">
        </div>

        <!-- une lettre compte triple -->
        <div>
            <label for="tripleLettre">Lettre compte triple</label>
            <input type="text" id="tripleLetter" name="tripleLetter" maxlength="1" size="1" value="?">
        </div>

        <!-- le mot compte douple -->
        <div>
            <label for="doubleWord">Mot compte double</label>
            <input type="checkbox" id="doubleWord" name="doubleWord">
        </div>

        <!-- le mot compte triple -->
        <div>
            <label for="tripleWord">Mot compte triple</label>
            <input type="checkbox" id="tripleWord" name="tripleWord">
        </div>
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