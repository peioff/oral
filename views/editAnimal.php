<?php
if (isset($animals)) {
    $animal = $animals[0];
}
?>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?php echo ASSETSCSS; ?>dashboard.css"/>
</head>

<header class="view-header--animal">
    <h1 class="view-title">Editer un animal</h1>
</header>

<!--View Menu + content-->
<section class="addAnimal-container">
    <div class="form-container">
        <form class="form" action="<?php echo HOST ?>updateAnimal/id/<?php echo $animal->getId() ?>" method="post" enctype="multipart/form-data">
            <ul>
                <li >
                    <label class="form-field" for="name"> Nom animal:
                        <input type="text" name="name" placeholder="Titus" value="<?php echo $animal->getName()?>" required >
                    </label>
                </li>
                <li >
                    <label class="form-field" for="species"> Espèce:
                        <input type="text" name="species" placeholder="Antilopinae" value="<?php echo $animal->getSpecies()?>" required>
                    </label>
                </li>
                <li >
                    <label class="form-field" for="living"> Habitat:
                        <input type="text" name="living" placeholder="Savane" value="<?php echo $animal->getLiving()?>" required>
                    </label>
                </li>
                <li>
                    <label  class="form-field" for="file"> Photo actuelle:
                        <div class="form-imageContainer" >
                            <img class="animal-picture"
                                 src="data:image/jpeg;base64,<?php echo base64_encode($animal->getImage()->getData()); ?>" alt="">
                        </div>
                        Choisir une autre photo :
                        <input type="file" name="file" accept=".jpeg,.png,.jpg,.webp" >
                    </label>
                </li>
                <li>
                    <div class="form-buttonContainer">
                        <button class="button button--success" type="submit">Modifier</button>
                        <a class="button button--danger" href="<?php echo HOST; ?>dashboardAnimals" >Annuler</a>
                    </div>
                </li>
            </ul>
        </form>

    </div>
</section>

