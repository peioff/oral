<?php

session_start();

if (!empty($data)) {
    $contacts = $data;
}
?>
<head>
    <title>Dashboard - Contacts</title>
</head>

<header class="view-header">
    <h1 class="view-title">Gestion des contacts</h1>
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
    } ?>

    <!--Content-->
    <section class="contacts">
        <?php foreach ($contacts as $contact):
            $date = $contact->getDate();
            $result = $date->format('d-m-Y');
            ?>
            <article class="contact">
                <?php
                switch ($contact->getAnswered()) {
                    case 0:
                        $indicatorClass = 'contact-indicator--pending';
                        $indicatorText = 'En attente de réponse';
                        break;
                    case 1:
                        $indicatorClass = 'contact-indicator--answered';
                        $indicatorText = 'Répondu';
                }
                ?>
                <p class="contact-indicator <?php echo $indicatorClass?>"><?php echo $indicatorText ?></p>
                <p class="contact-date"><?php echo 'Date : ' . $result; ?></p>
                <h2 class="contact-title"> <?php echo $contact->getTitle(); ?></h2>
                <p class="contact-content"><?php echo $contact->getContent(); ?></p>
                <?php if (!$contact->getAnswered()){ ?>
                <div class="contact-actions">
                    <a class="view-action" href="mailto:<?php echo $contact->getEmail()?>">Répondre</a>
                    <a class="view-action--danger" href="<?php echo HOST?>deleteContact/id/<?php echo $contact->getId()?>">Supprimer</a>
                </div>
                <?php } else {?>
                <div class="contact-actions">
                    <a class="view-action--danger" href="<?php echo HOST?>deleteContact/id/<?php echo $contact->getId()?>">Supprimer</a>
                </div>
                <?php }?>




            </article>
        <?php endforeach; ?>
    </section>
</section>


