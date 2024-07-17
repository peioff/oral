<?php
    if (!empty($animalToFeed)){
        echo $animalToFeed->getName();
    }

?>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?php echo ASSETSCSS; ?>dashboard.css"/>
</head>

<header class="view-header--animal">
    <h1 class="view-title">Nouveau nourrissage</h1>
</header>

<!--View Menu + content-->
<section class="addView-container">
    <div class="form-container">
        <form class="form" action="<?php echo HOST; ?>addFeedingToDatabase/id/<?php echo $animalToFeed->getId()?>" method="post">
            <ul>
                <li >
                    <div class="image-container">
                        <img class="newFeeding-img" src="data:image/jpeg;base64,<?php echo base64_encode( $animalToFeed->getImage()->getData() ); ?>" alt="">
                        <p class="newFeeding-title"><?php echo $animalToFeed->getName();?></p>
                    </div>
                </li>
                <li >
                    <label class="form-field" for="date"> Date:
                        <input type="date" name="date" required>
                    </label>
                </li>
                <li >
                    <label class="form-field" for="food"> Nourriture:
                        <input type="text" name="food" placeholder="Salade, grain, viande..." required>
                    </label>
                </li>
                <li >
                    <label class="form-field" for="quantity"> Quantité (g) :
                        <input type="number" name="quantity" placeholder="Quantité en grammes" required></input>
                    </label>
                </li>
                <li>
                    <div class="form-buttonContainer">
                        <button class="button button--success" type="submit">Ajouter</button>
                        <a class="button button--danger" href="<?php echo HOST; ?>dashboardFeedings" >Annuler</a>
                    </div>
                </li>
            </ul>
        </form>

    </div>
</section>

