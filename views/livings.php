<?php
if (isset($allLivingPageData)){
    $livings=$allLivingPageData[0];
    $animals=$allLivingPageData[1];

}
?>

<!doctype html>
<html lang="en">
<head>
    <title>Arcadia - Habitats</title>
    <link rel="stylesheet" href="<?php echo ASSETSCSS; ?>livings.css">
</head>
<body class="body flux">
<main class="main">
    <section class="livings">
        <?php foreach ($livings as $living): ?>
            <header class="living-footer">
                <div class="living-container">
                    <h2 class="title"><?php echo $living->getName() ?></h2>
                    <p class="headband-content"><?php echo $living->getDescription() ?></p>
                </div>
            </header>
            <article class="living">
                <img class="living-picture"
                     src="data:image/jpeg;base64,<?php echo base64_encode($living->getImage()->getData()); ?>" alt="">
            </article>
            <section class="animals">
                <?php foreach ($animals as $animal):
                    if ($animal->getLiving() == $living->getName()){
                        ?>
                        <article class="animal">
                            <h3 class="animal-title"><?php echo $animal->getName() ?></h3>
                            <img class="animal-picture"
                                 src="data:image/jpeg;base64,<?php echo base64_encode($animal->getImage()->getData()); ?>" alt="">
                        </article>
                    <?php } endforeach; ?>
            </section>
        <?php endforeach; ?>
    </section>
</main>
</body>
</html>




