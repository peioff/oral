<?php
if (isset($allHomePageData)) {
    $livings = $allHomePageData[0];
    $animals = $allHomePageData[1];
    $services = $allHomePageData[2];
    $comments = $allHomePageData[3];
    $reports = $allHomePageData[4];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Arcadia - Accueil</title>
    <link rel="stylesheet" href="<?php echo ASSETSCSS; ?>index.css">
    <link rel="stylesheet" href="<?php echo ASSETSCSS; ?>script.css">
    <script type="text/javascript" src="<?php echo SCRIPTS; ?>jquery3.7.1.js" defer></script>
    <script type="text/javascript" src="<?php echo SCRIPTS; ?>AnimalClass.js" defer></script>
    <script type="text/javascript" src="<?php echo SCRIPTS; ?>animalOnClick.js" defer></script>

</head>
<body id="body" class="body flux">
<main class="main">
    <!-- Banner -->
    <section class="banner">
        <div class="banner-container">
            <p class="title">Arcadia - Brocéliande</p>
            <p class="content">Texte de présentation du zoo ou il faut faire ressortir le coté
                écologique
            </p>
            <div class="banner-container--bottom">
                <p class="title" id="open-days"> </p>
                <p class="content" id="open-hours"> </p>
            </div>
        </div>
    </section>

    <!-- Livings -->
    <section class="livings">
        <header class="headband">
            <h2 class="title"> Nos habitats</h2>
            <p class="headband-content" id="content">
                Lorem ipsum odor amet, consectetuer adipiscing elit. Lacus in at proin interdum eget quisque congue arcu ut; malesuada penatibus condimentum vehicula erat enim ac donec cras.
            </p>
        </header>
        <!-- living -->
        <?php foreach ($livings as $living): ?>
            <article class="living">
                <img class="living-picture"
                     src="data:image/jpeg;base64,<?php echo base64_encode($living->getImage()->getData()); ?>" </img>
                <div class="living-content">
                    <h3 class="living-title">
                        <?php
                        echo $living->getName();
                        ?></h3>
                    <p class="living-text"><?php echo $living->getDescription() ?></p>
                    <a class="button" href="<?php echo HOST; ?>livings">Découvrir</a>
                </div>
            </article>
        <?php endforeach; ?>

        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

        <!-- living -->
        <!--        <article class="living living--reverse">-->
        <!--            <img class="living-picture" src="-->
        <?php //echo ASSETSIMG; ?><!--trees-3294681_1280.jpg" alt=""></img>-->
        <!--            <footer class="living-content">-->
        <!--                <h3 class="living-title">Habitat</h3>-->
        <!--                <p class="living-text">Ceci est le texte de description de l'habitat</p>-->
        <!--                <a class="button" href="">Découvrir</a>-->
        <!--            </footer>-->
        <!--        </article>-->
        <!-- living -->
    </section>
    <!-- Animals -->
    <section class="animals" id="animals">
        <header class="headband">
            <h2 class="title">Les animaux</h2>
            <p class="headband-content">
                Texte de présentation du zoo, en quelques lignes, présenter le zoo,
                essayer de faire sortir le coté écologique dans la pésentation aussi
            </p>
        </header>
        <!-- animal -->
        <?php foreach ($animals as $animal): ?>

            <article class="animal">
                <h3 class="animal-title">
                    <?php
                    echo $animal->getName();
                    ?>
                </h3>
                <img class="animal-picture"
                     onclick="displayAnimalInfo(<?php echo $animal->getid(); ?>,this)"
                     src="data:image/jpeg;base64,<?php echo base64_encode($animal->getImage()->getData()); ?>" alt=""/>
                <div class="animal-content" id="<?php echo $animal->getId() ?>">
                    <p>
                        <?php
                        echo $animal->getLiving();
                        ?>
                    </p>
                </div>
            </article>

        <?php endforeach; ?>
    </section>
    <!-- Services -->
    <section class="services">
        <header class="headband">
            <h2 class="title">Les services</h2>
            <p class="headband-content">
                Lorem ipsum odor amet, consectetuer adipiscing elit. Lacus in at proin interdum eget quisque congue arcu ut; malesuada penatibus condimentum vehicula erat enim ac donec cras.
            </p>
        </header>
        <?php foreach ($services as $service): ?>
            <article class="service">
                <h3 class="service-title">
                    <?php
                    echo $service->getName();
                    ?></h3>
                </h3>
                <img class="service-picture"
                     src="data:image/jpeg;base64,<?php echo base64_encode($service->getImage()->getData()); ?>" alt="">
                <p class="service-content">
                    <?php
                    echo $service->getDescription();
                    ?></p>
            </article>
        <?php endforeach; ?>
    </section>
    <!-- Reviews -->
    <section class="reviews">
        <header class="headband">
            <h2 class="title">Les Avis</h2>
            <p class="headband-content">
                Lorem ipsum odor amet, consectetuer adipiscing elit. Lacus in at proin interdum eget quisque congue arcu ut; malesuada penatibus condimentum vehicula erat enim ac donec cras.
            </p>
        </header>
        <!-- review -->
        <?php foreach ($comments as $comment):
            if ($comment->getVisibility()) {
                ?>
                <article class="review">
                    <header class="review-header">
                        <svg class="review-svg" xmlns="http://www.w3.org/2000/svg" width="50" height="50"
                             fill="currentColor"
                             viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                            <path fill-rule="evenodd"
                                  d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                        </svg>
                        <p class="review-title">
                            <?php
                            echo $comment->getNickname();
                            ?>
                        </p>
                    </header>
                    <p class="review-content">
                        <?php
                        echo $comment->getContent();
                        ?>
                    </p>
                </article>
            <?php } endforeach; ?>
    </section>
    <!-- WriteReview -->
    <article class="writeReview">
        <h2 class="form-title">Ecrire un commentaire</h2>
        <form class="form">
            <ul class="form-container">
                <li>
                    <label class="form-header" for="nickname">
                        <svg class="form-svg" xmlns="http://www.w3.org/2000/svg" width="50px" height="50px"
                             fill="currentColor" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                            <path fill-rule="evenodd"
                                  d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                        </svg>
                        <input class="form-placeHolder1" name="nickname" type="text" placeholder="Votre pseudonyme">
                    </label>
                </li>
                <li>
                    <textarea class="form-placeHolder2" name="message" placeholder="Votre message..." rows="5"
                              maxlength="200"></textarea>
                </li>
                <li class="form-buttonContainer">
                    <button class="button" type="submit" formaction="<?php echo HOST; ?>submitComment"
                            formmethod="post">Submit
                    </button>
                    </div>
                </li>
            </ul>
        </form>
    </article>
</main>
</body>
</html>




