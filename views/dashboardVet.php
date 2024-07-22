<?php
session_start();

if (!empty($data)) {
    $animals = $data['animals'];
    $reports = $data['reports'];
}
$count = 1;
?>
<head>
    <title>Dashboard - Veterinary</title>
</head>

<header class="view-header">
    <h1 class="view-title">Rapports vétérinaire</h1>
    <div class="view-search">
        Barre de recherche
    </div>
    <div class="view-actions">
        <a class="view-action" href="<?php echo HOST; ?>addReport.php">Créer un rapport</a>
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
    <section class="reports">
        <div class="report-table-row">
            <p class="report-table-cell">Date du rapport</p>
            <p class="report-table-cell">Animal</p>
            <p class="report-table-cell">Santé</p>
            <p class="report-table-cell report-table-cell--food">Dernière nourriture</p>
            <p class="report-table-cell report-table-cell--food hidden">Quantité</p>
            <p class="report-table-cell report-table-cell--food hidden">Date Nourr.</p>
            <p class="report-table-cell">Remarques</p>
            <p class="report-table-cell">Action</p>
        </div>
        <?php
        foreach ($reports as $report):
            if ($count % 2 == 0)  {
                $class = 'report-table-row  report-table-row--content';
            } else {
                $class = 'report-table-row  report-table-row--contentAlt';
            }
            ?>
            <div class="<?php echo $class?>">
                <p class="report-table-cell"><?php echo $report->getDate()->format('d-m-Y') ?></p>
                <?php foreach ($animals as $animal):
                    if ($animal->getId() == $report->getAnimalId()) {
                        ?>
                        <p class="report-table-cell"><?php echo $animal->getName()?></p>
                    <?php } endforeach; ?>
                <p class="report-table-cell"><?php echo $report->getHealth()?></p>
                <p class="report-table-cell report-table-cell--food">
                    <a title="Voir l'historique complet"  href="feedingHistory/id/<?php echo $report->getAnimalId()?>">
                        <svg class="report-table-cell--action" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                        </svg>
                    </a>

                    <?php echo $report->getFood()?></p>
                <p class="report-table-cell report-table-cell--food hidden"><?php echo $report->getFoodQuantity() . 'g'?></p>
                <p class="report-table-cell report-table-cell--food hidden"><?php echo $report->getFeedingDate()->format('d-m-Y') ?></p>
                <p class="report-table-cell"><?php echo $report->getRemark() . 'g' ?></p>
                <p class="report-table-cell">
                    <a title="Supprimer le rapport" href="<?php echo HOST ?>deleteReport/id/<?php echo $report->getId()?>">
                        <svg class="button-delete" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                             viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                        </svg>
                    </a>
                </p>

            </div>
        <?php $count++; endforeach; ?>
    </section>
</section>


