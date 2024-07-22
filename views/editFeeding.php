<?php
    if (!empty($data)){
        $feeding = $data['feeding'];
        $animal = $data['animal'];
    }

?>
<head>
    <title>Dashboard - Nourrissage</title>
    <link rel="stylesheet" href="<?php echo ASSETSCSS; ?>dashboard.css"/>
</head>

<header class="view-header--animal">
    <h1 class="view-title">Modifier un nourrissage</h1>
</header>

<!--View Menu + content-->
<section class="dashboardView-container">
    <div class="form-container">
        <form class="form" action="<?php echo HOST; ?>updateFeeding/id/<?php echo $feeding->getId()?>" method="post">
            <ul>
                <li >
                    <div class="image-container">
                        <img class="newFeeding-img" src="data:image/jpeg;base64,<?php echo base64_encode( $animal->getImage()->getData() ); ?>" alt="">
                        <p class="newFeeding-title"><?php echo $animal->getName();?></p>
                    </div>
                </li>
                <li >
                    <label class="form-field" for="date"> Date:
                        <input type="date" name="date" value="<?php echo $feeding->getDate()->format('Y-m-d') ?>" required>
                    </label>
                </li>
                <li >
                    <label class="form-field" for="food"> Nourriture:
                        <input type="text" name="food" placeholder="Salade, grain, viande..." value="<?php echo $feeding->getFood();?>" required>
                    </label>
                </li>
                <li >
                    <label class="form-field" for="quantity"> Quantité (g) :
                        <input type="number" name="quantity" placeholder="Quantité en grammes"  value="<?php echo intval($feeding->getQuantity())?>"></input>
                    </label>
                </li>
                <li>
                    <label hidden="hidden" for="animalId>">
                        <input type="number" name="animalId" value="<?php echo $animal->getId()?>">
                    </label>
                </li>
                <li>
                    <div class="form-buttonContainer">
                        <button class="button button--success" type="submit">Modifier</button>
                        <a class="button button--danger" href="<?php echo HOST; ?>dashboardFeedings" >Annuler</a>
                    </div>
                </li>
            </ul>
        </form>

    </div>
</section>

