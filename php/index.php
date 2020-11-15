<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <header>
        <ul>
            <li>menu</li>
            <li>tarif</li>
            <li>contacts</li>
            <li>à propose de nous</li>


            <?php
            $clientBudget = 1200;
            $clientBudget -= 300;
            $clientBudget += 2000;
            $tab = [
                'client' => 'vip'
            ];
            $tab1 = [
                'client' => 'pauvre'
            ];
            if ($clientBudget >= 1000) {
                foreach ($tab as $cle => $valeur) {
                    echo '<li>' . "$cle" . ' ' . $valeur . '</li>';
                }
            } else {
                foreach ($tab1 as $cle => $valeur) {
                    echo '<li>' . "$cle" . ' ' . $valeur . '</li>';
                }
            }
            ?>
        </ul>
    </header>
    <main>
        <?php require './template/form.php'; ?>

        <?php
        $categoryBudget = [];

        for ($revenu = 0; $revenu <= 15000; $revenu++) {
            if ($revenu < 10) {
                $category = "client faucher";
            } elseif ($revenu >= 10 && $revenu < 100) {
                $category = "client lambda";
            } elseif ($revenu >= 100 && $revenu < 200) {
                $category = "client bcbg";
            } elseif ($revenu >= 200 && $revenu < 1000) {
                $category = "client 4 étoiles";
            } else {
                $category = "Mode CAVIAR IMPERIAL";
            }
            $categoryBudget[$revenu] = $category;
        }

        if (empty($_GET['budget'])) {
            $categoryBudget = $_GET['budget'];
        } else {
            $clientMoney = filter_input(INPUT_GET, 'budget');
            echo "<p>Vous êtes un " . $categoryBudget[$clientMoney] . "</p>";
        }
        ?>

        <?php
        require './template/form_calc.php';

        $tabCalculRecetteDepense = []; //je crée un tableau vide pour ces 2variables
        $tabBonus = [];

        if (empty($_GET['depense']) && empty($_GET['recette'])) { // je crée une condition selon si l'input recette et depense est vide ou non
            $tabCalculRecetteDepense = $_GET['depense'];
            $tabCalculRecetteDepense = $_GET['recette'];
        } else {
            $comptaDepense = filter_input(INPUT_GET, 'depense');
            $comptaRecette = filter_input(INPUT_GET, 'recette');

            // je crée une condition pour la création d'une variable bonus selon le montant de la recette 
            if ($comptaRecette < 50) {
                $bonus += 1000;
            } elseif ($comptaRecette > 150 && $comptaRecette < 350) {
                $bonus += 500;
            } else {
                $bonus += 150;
            }
            $tabBonus[$comptaRecette] = $bonus;
            // je finalise par le calcul des recettes + bonus - depense
            $bonusRecette = $bonus;
            echo "<p> le bonus est de : " . $bonusRecette;
            $RecetteDepense = $comptaRecette + $bonusRecette - $comptaDepense;
            echo "<p> Total : " . $RecetteDepense . "</p>";
        }


        ?>
    </main>
    <footer>

    </footer>
</body>

</html>