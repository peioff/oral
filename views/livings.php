
<head>
    <title>Arcadia - Habitats</title>
    <link rel="stylesheet" href="<?php echo ASSETSCSS;?>livings.css">
</head>
<?php

?>
<body class="body flux">
<main class="main">
    <section class="livings">
        <article class="living">
            <img class="living-picture" src="<?php echo ASSETSIMG;?>trees-3294681_1280.jpg" alt="">
            <footer class="living-footer">
                <div class="living-container">
                    <h2 class="title"><?php echo $livings[0]->getName() ?></h2>
                    <p class="content"><?php echo $livings[0]->getDescription() ?></p>
                </div>
                <a class="button" href="">Animaux</a>
            </footer>
        </article>
        <section class="animals">
            <article class="animal">
                <h3 class="animal-title">Squirrel</h3>
                <img class="animal-picture" src="<?php echo ASSETSIMG;?>squirrel-7985502_1280.jpg" alt="">
            </article>
            <article class="animal">
                <h3 class="animal-title">Fox</h3>
                <img class="animal-picture" src="<?php echo ASSETSIMG;?>fox-5064828_1280.jpg" alt="">
            </article>
            <article class="animal">
                <h3 class="animal-title">Racoon</h3>
                <img class="animal-picture" src="<?php echo ASSETSIMG;?>raccoon-3538081_1280.jpg" alt="">
            </article>
            <article class="animal">
                <h3 class="animal-title">Bobcat</h3>
                <img class="animal-picture" src="<?php echo ASSETSIMG;?>bobcat-165190_1280.jpg" alt="">
            </article>
            <article class="animal">
                <h3 class="animal-title">Wolf</h3>
                <img class="animal-picture" src="<?php echo ASSETSIMG;?>wolf-7975801_1280.jpg" alt="">
            </article>
        </section>

    </section>
    <section class="livings">
        <article class="living">
            <img class="living-picture" src="<?php echo ASSETSIMG;?>bird-8018305_1280.jpg" alt="">
            <footer class="living-footer">
                <div class="living-container">
                    <h2 class="title">L'étang</h2>
                    <p class="content">Texte de présentation de l'habitat</p>
                </div>
                <a class="button" href="">Animaux</a>
            </footer>
        </article>
        <section class="animals">
            <article class="animal">
                <h3 class="animal-title">Turtles</h3>
                <img class="animal-picture" src="<?php echo ASSETSIMG;?>turtles-3289690_1280.jpg" alt="">
            </article>
            <article class="animal">
                <h3 class="animal-title">Otter</h3>
                <img class="animal-picture" src="<?php echo ASSETSIMG;?>otter-2678776_1280.jpg" alt="">
            </article>
            <article class="animal">
                <h3 class="animal-title">Swan</h3>
                <img class="animal-picture" src="<?php echo ASSETSIMG;?>swan-7355432_1280.jpg" alt="">
            </article>
            <article class="animal">
                <h3 class="animal-title">Frog</h3>
                <img class="animal-picture" src="<?php echo ASSETSIMG;?>frog-1530803_1280.jpg" alt="">
            </article>
            <article class="animal">
                <h3 class="animal-title">Crocodile</h3>
                <img class="animal-picture" src="<?php echo ASSETSIMG;?>crocodile-6931035_1280.jpg" alt="">
            </article>
        </section>

    </section>
    <section class="livings">
        <article class="living">
            <img class="living-picture" src="<?php echo ASSETSIMG;?>nature-3358478_1280.jpg" alt="">
            <footer class="living-footer">
                <div class="living-container">
                    <h2 class="title">La savane</h2>
                    <p class="content">Texte de présentation de l'habitat</p>
                </div>
                <a class="button" href="">Animaux</a>
            </footer>
        </article>
        <section class="animals">
            <article class="animal">
                <h3 class="animal-title">Giraffe</h3>
                <img class="animal-picture" src="<?php echo ASSETSIMG;?>giraffe-1544348_1280.jpg" alt="">
            </article>
            <article class="animal">
                <h3 class="animal-title">Zebra</h3>
                <img class="animal-picture" src="<?php echo ASSETSIMG;?>zebra-6275284_1280.jpg" alt="">
            </article>
            <article class="animal">
                <h3 class="animal-title">Nandu</h3>
                <img class="animal-picture" src="<?php echo ASSETSIMG;?>nandu-1438617_1280.jpg" alt="">
            </article>
            <article class="animal">
                <h3 class="animal-title">Meerkat</h3>
                <img class="animal-picture" src="<?php echo ASSETSIMG;?>meerkat-7241664_1280.jpg" alt="">
            </article>
            <article class="animal">
                <h3 class="animal-title">Impala</h3>
                <img class="animal-picture" src="<?php echo ASSETSIMG;?>impala-2800376_1280.jpg" alt="">
            </article>
        </section>

    </section>
</main>
</body>