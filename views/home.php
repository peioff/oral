<head>
    <title>Arcadia - Accueil</title>
    <link rel="stylesheet" href="<?php echo ASSETSCSS; ?>index.css">
</head>


<main class="main">
    <!-- Banner -->
    <section class="banner">
        <div class="banner-container">
            <p class="title">Arcadia - Brocéliande</p>
            <p class="content">Texte de présentation du zoo ou il faut faire ressortir le coté
                écologique
            </p>
            <div class="banner-container--bottom">
                <p class="title" id="open-days">Ouvert tous les jours</p>
                <p class="content" id="open-hours">8h00 - 20h00</p>
            </div>
        </div>
    </section>

    <!-- Livings -->
    <section class="livings">
        <header class="headband">
            <h2 class="title"></h2>
            <p class="content">
                Texte de présentation du zoo, en quelques lignes, présenter le zoo,
                essayer de faire sortir le coté écologique dans la pésentation aussi
            </p>
        </header>
        <!-- living -->
        <article class="living">
            <img class="living-picture" src="<?php echo ASSETSIMG; ?>bird-8018305_1280.jpg" alt=""></img>
            <footer class="living-content">
                <h3 class="living-title"><?php
                    echo $livings[0]->getName();
                    ?></h3>
                <p class="living-text"><?php echo $livings[0]->getDescription()?></p>
                <a class="button" href="">Découvrir</a>
            </footer>
        </article>
        <!-- living -->
        <article class="living living--reverse">
            <img class="living-picture" src="<?php echo ASSETSIMG; ?>trees-3294681_1280.jpg" alt=""></img>
            <footer class="living-content">
                <h3 class="living-title">Habitat</h3>
                <p class="living-text">Ceci est le texte de description de l'habitat</p>
                <a class="button" href="">Découvrir</a>
            </footer>
        </article>
        <!-- living -->
        <article class="living">
            <img class="living-picture" src="<?php echo ASSETSIMG; ?>nature-3358478_1280.jpg" alt=""></img>
            <footer class="living-content">
                <h3 class="living-title">Habitat</h3>
                <p class="living-text">Ceci est le texte de description de l'habitat</p>
                <a class="button" href="">Découvrir</a>
            </footer>
        </article>
    </section>
    <!-- Animals -->
    <section class="animals">
        <header class="headband">
            <h2 class="title">Les animaux</h2>
            <p class="content">
                Texte de présentation du zoo, en quelques lignes, présenter le zoo,
                essayer de faire sortir le coté écologique dans la pésentation aussi
            </p>
        </header>
        <!-- animal -->
        <article class="animal">
            <h3 class="animal-title">Animal</h3>
            <img class="animal-picture" src="<?php echo ASSETSIMG; ?>squirrel-7985502_640.jpg" alt="">
            <p class="animal-content">Habitat</p>
        </article>
        <!-- animal -->
        <article class="animal">
            <h3 class="animal-title">Animal</h3>
            <img class="animal-picture" src="<?php echo ASSETSIMG; ?>fox-5064828_1280.jpg" alt="">
            <p class="animal-content">Habitat</p>
        </article>
        <!-- animal -->
        <article class="animal">
            <h3 class="animal-title">Animal</h3>
            <img class="animal-picture" src="<?php echo ASSETSIMG; ?>raccoon-3538081_1280.jpg" alt="">
            <p class="animal-content">Habitat</p>
        </article>
        <!-- animal -->
        <article class="animal">
            <h3 class="animal-title">Animal</h3>
            <img class="animal-picture" src="<?php echo ASSETSIMG; ?>bobcat-165190_1280.jpg" alt="">
            <p class="animal-content">Habitat</p>
        </article>
        <!-- animal -->
        <article class="animal">
            <h3 class="animal-title">Animal</h3>
            <img class="animal-picture" src="<?php echo ASSETSIMG; ?>turtles-3289690_1280.jpg" alt="">
            <p class="animal-content">Habitat</p>
        </article>
        <!-- animal -->
        <article class="animal">
            <h3 class="animal-title">Animal</h3>
            <img class="animal-picture" src="<?php echo ASSETSIMG; ?>otter-2678776_1280.jpg" alt="">
            <p class="animal-content">Habitat</p>
        </article>
        <!-- animal -->
        <article class="animal">
            <h3 class="animal-title">Animal</h3>
            <img class="animal-picture" src="<?php echo ASSETSIMG; ?>swan-7355432_1280.jpg" alt="">
            <p class="animal-content">Habitat</p>
        </article>
        <!-- animal -->
        <article class="animal">
            <h3 class="animal-title">Animal</h3>
            <img class="animal-picture" src="<?php echo ASSETSIMG; ?>frog-1530803_1280.jpg" alt="">
            <p class="animal-content">Habitat</p>
        </article>
        <!-- animal -->
        <article class="animal">
            <h3 class="animal-title">Animal</h3>
            <img class="animal-picture" src="<?php echo ASSETSIMG; ?>crocodile-6931035_1280.jpg" alt="">
            <p class="animal-content">Habitat</p>
        </article>
        <!-- animal -->
        <article class="animal">
            <h3 class="animal-title">Animal</h3>
            <img class="animal-picture" src="<?php echo ASSETSIMG; ?>giraffe-1544348_1280.jpg" alt="">
            <p class="animal-content">Habitat</p>
        </article>
        <!-- animal -->
        <article class="animal">
            <h3 class="animal-title">Animal</h3>
            <img class="animal-picture" src="<?php echo ASSETSIMG; ?>zebra-6275284_1280.jpg" alt="">
            <p class="animal-content">Habitat</p>
        </article>
        <!-- animal -->
        <article class="animal">
            <h3 class="animal-title">Animal</h3>
            <img class="animal-picture" src="<?php echo ASSETSIMG; ?>nandu-1438617_1280.jpg" alt="">
            <p class="animal-content">Habitat</p>
        </article>
        <!-- animal -->
        <article class="animal">
            <h3 class="animal-title">Animal</h3>
            <img class="animal-picture" src="<?php echo ASSETSIMG; ?>squirrel-7985502_640.jpg" alt="">
            <p class="animal-content">Habitat</p>
        </article>
        <!-- animal -->
        <article class="animal">
            <h3 class="animal-title">Animal</h3>
            <img class="animal-picture" src="<?php echo ASSETSIMG; ?>meerkat-7241664_1280.jpg" alt="">
            <p class="animal-content">Habitat</p>
        </article>
        <!-- animal -->
        <article class="animal">
            <h3 class="animal-title">Animal</h3>
            <img class="animal-picture" src="<?php echo ASSETSIMG; ?>impala-2800376_1280.jpg" alt="">
            <p class="animal-content">Habitat</p>
        </article>
    </section>

    <!-- Services -->
    <section class="services">
        <header class="headband">
            <h2 class="title">Les services</h2>
            <p class="content">
                Texte de présentation du zoo, en quelques lignes, présenter le zoo,
                essayer de faire sortir le coté écologique dans la pésentation aussi
            </p>
        </header>

        <!-- service -->
        <article class="service">
            <h3 class="service-title">Service</h3>
            <img class="service-picture" src="<?php echo ASSETSIMG; ?>beer-garden-4465324_1280.jpg" alt="">
            <p class="service-content">Texte de présentation du service, en quelques lignes, présenter le zoo,
                essayer de faire sortir le coté écologique dans la pésentation aussi</p>
        </article>
        <!-- service -->
        <article class="service">
            <h3 class="service-title">Service</h3>
            <img class="service-picture" src="<?php echo ASSETSIMG; ?>rails-416460_1280.jpg" alt="">
            <p class="service-content">Texte de présentation du service, en quelques lignes, présenter le zoo,
                essayer de faire sortir le coté écologique dans la pésentation aussi</p>
        </article>
        <!-- service -->
        <article class="service">
            <h3 class="service-title">Service</h3>
            <img class="service-picture" src="<?php echo ASSETSIMG; ?>rails-416460_1280.jpg" alt="">
            <p class="service-content">Texte de présentation du service, en quelques lignes, présenter le zoo,
                essayer de faire sortir le coté écologique dans la pésentation aussi</p>
        </article>
    </section>

    <!-- Reviews -->
    <section class="reviews">
        <header class="headband">
            <h2 class="title">Les Avis</h2>
            <p class="content">
                Texte de présentation du zoo, en quelques lignes, présenter le zoo,
                essayer de faire sortir le coté écologique dans la pésentation aussi
            </p>
        </header>
        <!-- review -->
        <article class="review">
            <header class="review-header">
                <svg class="review-svg" xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor"
                     viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                    <path fill-rule="evenodd"
                          d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                </svg>
                <p class="review-title">Pseudonyme</p>
            </header>
            <p class="review-content">
                Cette div représente le texte d'un commentaire.
                Super expérience au parc arcadia ou mes enfants
                et moi meme ont pu découvrir plein d'animaux.
            </p>
        </article>
        <!-- review -->
        <article class="review">
            <header class="review-header">
                <svg class="review-svg" xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor"
                     viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                    <path fill-rule="evenodd"
                          d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                </svg>
                <p class="review-title">Pseudonyme</p>
            </header>
            <p class="review-content">
                Cette div représente le texte d'un commentaire.
                Super expérience au parc arcadia ou mes enfants
                et moi meme ont pu découvrir plein d'animaux.
            </p>
        </article>
        <!-- review -->
        <article class="review">
            <header class="review-header">
                <svg class="review-svg" xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor"
                     viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                    <path fill-rule="evenodd"
                          d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                </svg>
                <p class="review-title">Pseudonyme</p>
            </header>
            <p class="review-content">
                Cette div représente le texte d'un commentaire.
                Super expérience au parc arcadia ou mes enfants
                et moi meme ont pu découvrir plein d'animaux.
            </p>
        </article>
        <!-- review -->
        <article class="review">
            <header class="review-header">
                <svg class="review-svg" xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor"
                     viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                    <path fill-rule="evenodd"
                          d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                </svg>
                <p class="review-title">Pseudonyme</p>
            </header>
            <p class="review-content">
                Cette div représente le texte d'un commentaire.
                Super expérience au parc arcadia ou mes enfants
                et moi meme ont pu découvrir plein d'animaux.
            </p>
        </article>
    </section>
    <!-- WriteReview -->
    <article class="writeReview">
        <h2 class="form-title">Ecrire un commentaire</h2>
        <form class="form" action="/">
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
                    <button class="button" type="submit" href="/">Submit</button>
                    </div>
                </li>
            </ul>
        </form>
    </article>
</main>


