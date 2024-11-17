<?php
    if (!empty($animalToFeed)){
    }

?>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?php echo ASSETSCSS; ?>dashboard.css"/>
    <link rel="stylesheet" href="<?php echo ASSETSCSS;?>toastr.css">
    <script type="text/javascript" src="<?php echo SCRIPTS; ?>jquery3.7.1.js" defer ></script>
    <script type="text/javascript" src="<?php echo SCRIPTS; ?>toastr.js" defer ></script>
    <script type="text/javascript" src="<?php echo SCRIPTS; ?>addFeedingApproval.js" defer></script>
</head>

<header class="view-header--animal">
    <h1 class="view-title">Nouveau nourrissage</h1>
</header>

<!--View Menu + content-->
<section class="dashboardView-container">
    <div class="form-container">
        <form class="form" id="addFeedingForm"  method="post">
            <ul>
                <li >
                    <div class="image-container">
                        <img class="newFeeding-img" src="data:image/jpeg;base64,<?php echo base64_encode( $animalToFeed->getImage()->getData() ); ?>" alt="">
                        <p class="newFeeding-title"><?php echo $animalToFeed->getName();?></p>
                    </div>
                </li>
                <li >
                    <label class="form-field" for="date"> Date:
                        <input type="date" id="feedingDate" name="date" required>
                    </label>
                </li>
                <li >
                    <label class="form-field" for="food"> Nourriture:
                        <input type="text" id="feedingFood" name="food" placeholder="Salade, grain, viande..." required>
                    </label>
                </li>
                <li >
                    <label class="form-field" for="quantity"> Quantité (g) :
                        <input type="number" id="feedingQuantity" name="quantity" placeholder="Quantité en grammes" required></input>
                    </label>
                </li>
                <li >
                    <label class="form-field" for="animalId" hidden="hidden">
                        <input hidden="hidden" type="number" id="animalId" name="animalId" value="<?php echo $animalToFeed->getId()?>"></input>
                    </label>
                </li>
                <li>
                    <div class="form-buttonContainer">
                        <button class="button button--success" type="submit" onclick="addFeeding()">Ajouter</button>
                        <a class="button button--danger" href="<?php echo HOST; ?>dashboardFeedings" >Annuler</a>
                    </div>
                </li>
            </ul>
        </form>

    </div>
</section>

