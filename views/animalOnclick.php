<?php
if (isset ($data)) {
    $animal = $data['animal'];
    $report = $data['report'];
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Animal On CLick</title>
</head>
<body>
<div class="popup">
    <div class="contained">
        <div id="animalInfo">
            <h2>
                <?= $animal->getName()?>
            </h2>
            <img id="picture" src="data:image/jpeg;base64,<?php echo base64_encode($animal->getImage()->getData()); ?>" alt="" />
            <p><?= $animal->getSpecies()?></p>
            <p><?= $animal->getLiving()?></p>
        </div>
        <div id="feedingContainer">
            <p class="section-title">Dernière nourriture consommée</p>
            <p><?= $report->getFood() ?></p>
            <p>Quantité : <?= $report->getFoodQuantity()?></p>
            <p>Le : <?=($report->getFeedingDate())->format('d-m-Y') ?></p>
        </div>
        <div id="vetContainer">
            <p class="section-title">Avis du vétérinaire</p>
            <p>Passage le : <?=($report->getDate())->format('d-m-Y') ?></p>
            <p>Santé : <?= $report->getHealth() ?></p>
            <p>Remarques : <?= $report->getRemark() ?></p>
        </div>
    </div>
</div>
</body>
</html>
