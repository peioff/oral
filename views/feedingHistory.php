<?php
if (!empty($data)) {
    $feedings = $data['feedings'];
    $animals = $data['animals'];
}
?>
<head>
    <title>Dashboard - FeedingHistory</title>
</head>

<header class="view-header">
    <h1 class="view-title">Historique nourrissage</h1>
    <div class="view-search">
        Barre de recherche
    </div>
    <div class="view-actions">
        <a class="view-action view-action--danger" href="<?php echo HOST; ?>dashboardVet">Retour</a>
    </div>
</header>

<!--View Menu + content-->
<section class="main-container">
    <!--Menu-->
    <?php include_once VIEWS . '_dashboardMenu.php' ?>
    <!--Content-->
    <section class="history">
        <article class="history-card">
            <?php foreach ($animals as $element):
                if ($element->getId() == $feedings[0]->getAnimalId()) {
                    $animal = $element;
                    ?>
                    <img class="history-img"
                         src="data:image/jpeg;base64,<?php echo base64_encode($animal->getImage()->getData()); ?>"
                         alt="">
                    <p class="history-animalName"><?php echo $animal->getName() ?></p>
                <?php } endforeach; ?>
            <section class="history-feedings">
                <div class="history-row">
                    <p class="history-cell history-cell--title">Date</p>
                    <p class="history-cell history-cell--title">Nourriture</p>
                    <p class="history-cell history-cell--title">Quantité</p>
                </div>
                <?php foreach ($feedings as $feeding): ?>
                    <article class="history-row">
                        <p class="history-cell"><?php echo$feeding->getDate()->format('d-m-Y'); ?></p>
                        <p class="history-cell"><?php echo$feeding->getFood(); ?></p>
                        <p class="history-cell"><?php echo$feeding->getQuantity() . ' g'; ?></p>

                    </article>
                <?php endforeach; ?>

            </section>
        </article>
    </section>
</section>


