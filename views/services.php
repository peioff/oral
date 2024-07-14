
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
<footer class="footer">
    <header class="footer-header">
        <img class="footer-logo" src="../assets/logos/main_logo.png" alt="">
        <p class="footer-slogan">Slogan du site</p>
        <p class="footer-subText">Un autre texte</p>
    </header>
    <nav class="footer-navContainer">
        <ul class="footer-nav">
            <li class="footer-link"><a href="">Lien</a></li>
            <li class="footer-link"><a href="">Lien</a></li>
            <li class="footer-link"><a href="">Lien</a></li>
        </ul>
        <ul class="footer-nav">
            <li class="footer-link"><a href="">Lien</a></li>
            <li class="footer-link"><a href="">Lien</a></li>
            <li class="footer-link"><a href="">Lien</a></li>
        </ul>
        <ul class="footer-nav">
            <li class="footer-link"><a href="">Lien</a></li>
            <li class="footer-link"><a href="">Lien</a></li>
            <li class="footer-link"><a href="">Lien</a></li>
        </ul>
    </nav>
    <footer class="footer-footer">
        <nav class="footer-navContainer">
            <ul class="footer-nav footer-nav--row">
                <li class="footer-link footer-link--light"><a href="">Terms of service</a></li>
                <li class="footer-link footer-link--light"><a href="">Privacy policy</a></li>
                <li class="footer-link footer-link--light"><a href="">Remerciements</a></li>
                <li class="trademark">@2024</li>
            </ul>
        </nav>
    </footer>
</footer>
</body>
