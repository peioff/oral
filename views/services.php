
<head>
    <title>Arcadia - Services</title>
    <link rel="stylesheet" href="<?php echo ASSETSCSS;?>services.css">
</head>

<body class="body flux">
<main class="main">
    <section class="services">
        <article class="service">
            <h2 class="title service-title">
                <?php
                echo $services[0]->getName();
                ?>
            </h2>
            <img class="service-picture" src="<?php echo ASSETSIMG;?>beer-garden-4465324_1280.jpg" alt="">
            <p class="service-description">
                <?php
                echo $services[0]->getDescription();
                ?>
            </p>
            <footer class="service-footer">
                <p>11h30 - 14h00</p>
                <p>07 89 80 52 65</p>
            </footer>
        </article>
        <article class="service service--reverse">
            <h2 class="title service-title">Visite guidée</h2>
            <img class="service-picture" src="<?php echo ASSETSIMG;?>beer-garden-4465324_1280.jpg" alt="">
            <p class="service-description">Texte de description du service en quelques lignes</p>
            <footer class="service-footer">
                <p>11h30 - 14h00</p>
                <p>07 89 80 52 65</p>
            </footer>
        </article>
        <article class="service">
            <h2 class="title service-title">Restaurant</h2>
            <img class="service-picture" src="<?php echo ASSETSIMG;?>rails-416460_1280.jpg" alt="">
            <p class="service-description">Texte de description du service en quelques lignes</p>
            <footer class="service-footer">
                <p>11h30 - 14h00</p>
                <p>07 89 80 52 65</p>
            </footer>
        </article>

    </section>
</main>

</body>
