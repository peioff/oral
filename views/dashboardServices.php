<?php

if (isset($servicesToManage)){
    $services = $servicesToManage;
}
?>
<head>
    <title>Dashboard - Services</title>
</head>

<header class="view-header">
    <h1 class="view-title">Gestion des services</h1>
    <div class="view-search">
        Barre de recherche
    </div>
    <div class="view-actions">
        <a class="view-action" href="<?php echo HOST; ?>addService.php">Ajouter un Service</a>
    </div>
</header>

<!--View Menu + content-->
<section class="main-container">
    <!--Menu-->
    <?php include_once VIEWS . '_dashboardMenu.php' ?>
    <!--Content-->
    <section class="livings">
        <?php foreach ($services as $service): ?>
            <article class="service">
                <img class="service-picture"
                     src="data:image/jpeg;base64,<?php echo base64_encode($service->getImage()->getData()); ?>" alt=""/>
                <div class="service-infoAndActions">
                    <p class="service-name"><?php echo $service->getName() ?></p>
                    <div class="service-actions">
                        <a title="Editer le service" href="<?php echo HOST ?>editService.php/id/<?php echo $service->getId() ?>">
                            <svg  class="button-edit" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                  viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd"
                                      d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                            </svg>
                        </a>
                        <a title="Supprimer le service"  href="<?php echo HOST ?>deleteService/id/<?php echo $service->getId() ?>">
                            <svg class="button-delete" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                 viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                            </svg>
                        </a>
                    </div>
                </div>
                <p class="service-description"><?php echo $service->getDescription() ?></p>
            </article>
        <?php endforeach; ?>
    </section>
</section>


