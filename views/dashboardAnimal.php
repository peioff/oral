<?php

if (isset($userAndAnimals)) {
    $animals = $userAndAnimals[1];
} else if (isset($animalsToManage)){
    $animals = $animalsToManage;
}

?>
<head>
    <title>Dashboard</title>
</head>

<header class="view-header">
    <h1 class="view-title">Gestion des animaux</h1>
    <div class="view-search">
        Barre de recherche
    </div>
    <div class="view-actions">
        <a class="view-action" href="<?php echo HOST;?>addAnimal.php">Ajouter un animal</a>
    </div>
</header>

<!--View Menu + content-->
<section class="main-container">
    <!--Menu-->
    <?php include_once VIEWS . '_dashboardMenu.php' ?>
    <!--Content-->
    <section class="animals">
        <?php foreach ($animals as $animal): ?>
            <article class="animal">
                <img class="animal-picture" src="data:image/jpeg;base64,<?php echo base64_encode( $animal->getImage() ); ?>" alt=""/>
                <div class="animal-infos">
                    <p class="animal-name"><?php echo $animal->getName()?></p>
                    <p class="animal-living"><?php echo $animal->getLiving()?></p>
                    <p class="animal-score">SCORE</p>
                </div>
            </article>
        <?php endforeach; ?>
    </section>
</section>


