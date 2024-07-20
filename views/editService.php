<?php
if (isset($service))
?>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?php echo ASSETSCSS; ?>dashboard.css"/>
</head>

<header class="view-header--animal">
    <h1 class="view-title">Modifier un service</h1>
</header>

<!--View Menu + content-->
<section class="dashboardView-container">
    <div class="form-container">
        <form class="form" action="<?php echo HOST; ?>updateService/id/<?php echo $service->getId() ?>" method="post"
              enctype="multipart/form-data">
            <ul>
                <li>
                    <label class="form-field" for="name"> Nom Service:
                        <input type="text" name="name" placeholder="Restaurant"
                               value="<?php echo $service->getName() ?>" required>
                    </label>
                </li>
                <li>
                    <label class="form-field" for="schedule"> Horaires:
                        <input type="text" name="schedule" placeholder="11h30 - 14h00"
                               value="<?php echo $service->getSchedule() ?>" required>
                    </label>
                </li>
                <li>
                    <label class="form-field" for="contactInfos"> Information de contact:
                        <input type="text" name="contactInfos" placeholder="04 56 78 91 01"
                               value="<?php echo $service->getContactInfo() ?>" required>
                    </label>
                </li>
                <li>
                    <label class="form-field" for="description"> Description:
                        <textarea rows="5" cols="33" name="description" placeholder="Texte de description"
                                  required><?php echo $service->getDescription() ?></textarea>
                    </label>
                </li>
                <li>
                    <label class="form-field" for="file"> Photo actuelle:
                        <div class="form-imageContainer">
                            <img class="animal-picture"
                                 src="data:image/jpeg;base64,<?php echo base64_encode($service->getImage()->getData()); ?>"
                                 alt="">
                        </div>
                        Choisir une autre photo :
                        <input type="file" name="file" accept=".jpeg,.png,.jpg,.webp">
                    </label>
                </li>

                <li>
                    <div class="form-buttonContainer">
                        <button class="button button--success" type="submit">Modifier</button>
                        <a class="button button--danger" href="<?php echo HOST; ?>dashboardServices">Annuler</a>
                    </div>
                </li>
            </ul>
        </form>

    </div>
</section>

