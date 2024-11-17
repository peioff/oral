<?php

?>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?php echo ASSETSCSS; ?>dashboard.css"/>
    <link rel="stylesheet" href="<?php echo ASSETSCSS;?>toastr.css">
    <script type="text/javascript" src="<?php echo SCRIPTS; ?>jquery3.7.1.js" defer ></script>
    <script type="text/javascript" src="<?php echo SCRIPTS; ?>toastr.js" defer ></script>
    <script type="text/javascript" src="<?php echo SCRIPTS; ?>addAnimalApproval.js" defer></script>
</head>

<header class="view-header--animal">
    <h1 class="view-title">Ajouter un animal</h1>
</header>

<!--View Menu + content-->
<section class="dashboardView-container">
    <div class="form-container">
        <form class="form" id="formId" method="post" enctype="multipart/form-data">
            <ul>
                <li >
                    <label class="form-field" for="name"> Nom animal:
                        <input type="text" name="name" id="animalName" placeholder="Titus" required>
                    </label>
                </li>
                <li >
                    <label class="form-field" for="species"> Espèce:
                        <input type="text" name="species" id="animalSpecie" placeholder="Antilopinae" required>
                    </label>
                </li>
                <li >
                    <label class="form-field" for="living"> Habitat:
                        <input type="text" name="living" id="animalLiving" placeholder="Savane" required>
                    </label>
                </li>
                <li>
                    <label  class="form-field" for="file"> Ajouter une photo :
                        <input type="file" name="file" id="animalFile" accept=".jpeg,.png,.jpg,.webp" required>
                    </label>
                </li>
                <li>
                    <div class="form-buttonContainer">
                        <button class="button button--success" type="submit" onclick="addAnimal()">Ajouter</button>
                        <a class="button button--danger" href="<?php echo HOST; ?>dashboardAnimals" >Annuler</a>
                    </div>
                </li>
            </ul>
        </form>

    </div>
</section>

