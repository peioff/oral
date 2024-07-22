<?php
session_start();

if (!empty($data)) {
    $feedings = $data['feedings'];
    $animals = $data['animals'];
}

?>
<head>
    <title>Dashboard - Feedings</title>
</head>

<header class="view-header">
    <h1 class="view-title">Nourrissage</h1>
    <div class="view-search">
        Barre de recherche
    </div>
    <div class="view-actions">
    </div>
</header>

<!--View Menu + content-->
<section class="main-container">
    <!--Menu-->
    <?php
    switch ($_SESSION['role']) {
        case 'Admin':
            include_once VIEWS . '_dashboardMenu.php';
            break;
        case 'Employee':
            include_once VIEWS . '_dashboardMenuEmployee.php';
            break;
        case 'Veterinary':
            include_once VIEWS . '_dashboardMenuVeterinary.php';
            break;
    } ?>    <!--Content-->
    <section class="feedings">
        <?php foreach ($animals as $animal):?>
            <article class="feeding-cell">
                <p class="feeding-animal"><?php echo $animal->getName()?></p>
                <div>
                    <img class="animal-picture"
                         src="data:image/jpeg;base64,<?php echo base64_encode($animal->getImage()->getData()); ?>"
                         alt="">
                </div>
                <div class="table-row">
                    <a title="Ajouter un nourrissage" class="table-cell" href="<?php echo HOST ?>addFeeding.php/id/<?php echo $animal->getId() ?>">
                        <svg class ="table-action" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"  viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                        </svg>
                    </a>
                    <p class="table-cell">Date</p>
                    <p class="table-cell">Nourriture</p>
                    <p class="table-cell">Quantité (g)</p>

                </div>
                <?php foreach ($feedings as $feeding):
                    if ($animal->getId() == $feeding->getAnimalId()) {
                        $date = $feeding->getDate();
                        $result =  $date->format('d-m-Y');
                    ?>
                        <article class="table-row" >
                            <div class="table-actions">
                                <a title="Editer le nourrissage" href="<?php echo HOST ?>editFeeding.php/id/<?php echo $feeding->getId() ?>">
                                    <svg class="button-edit" xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                                          viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd"
                                              d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                    </svg>
                                </a>
                                <a title="Supprimer le nourrissage" href="<?php echo HOST ?>deleteFeeding/id/<?php echo $feeding->getId() ?>">
                                    <svg class="button-delete" xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                                         viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                    </svg>
                                </a>
                            </div>


                            <p class="table-cell"><?php echo $result?></p>
                            <p class="table-cell"><?php echo $feeding->getFood()?> </p>
                            <p class="table-cell"><?php echo $feeding->getQuantity()?> </p>

                        </article>
                <?php } endforeach;?>
            </article>
        <?php endforeach; ?>
    </section>
</section>


