<?php
session_start();

if (!empty($data)) {
    $comments = $data;
}


?>
<head>
    <title>Dashboard - Comments</title>
</head>

<header class="view-header">
    <h1 class="view-title">Gestion des commentaires</h1>
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
    <section class="comments">
        <?php foreach ($comments as $comment):?>
                <article class="comment">
                    <?php if ($comment->getVisibility()){
                        $indicatorClass = 'comment-visibilityIndicator';
                        $indicatorText = 'Commentaire visible';
                        $toggleClass = 'view-action--warning';
                        $toggleText = 'Rendre invisible';
                    }
                    else {
                        $indicatorClass = 'comment-visibilityIndicator comment-visibilityIndicator--invisible';
                        $indicatorText = 'Commentaire invisible';
                        $toggleClass = 'view-action';
                        $toggleText = 'Rendre invisible';

                    } ?>
                    <p class="<?php echo $indicatorClass?>"> <?php echo $indicatorText?> </p>
                    <header class="comment-header">
                        <svg class="comment-svg" xmlns="http://www.w3.org/2000/svg" width="50" height="50"
                             fill="currentColor"
                             viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                            <path fill-rule="evenodd"
                                  d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                        </svg>
                        <p class="comment-title">
                            <?php
                            echo $comment->getNickname();
                            ?>
                        </p>
                        <a title="<?php echo $toggleText ?>" class="<?php echo $toggleClass?>" href="switchVisibility/id/<?php echo $comment->getId()?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M4.5 9a3.5 3.5 0 1 0 0 7h7a3.5 3.5 0 1 0 0-7zm7 6a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5m-7-14a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5m2.45 0A3.5 3.5 0 0 1 8 3.5 3.5 3.5 0 0 1 6.95 6h4.55a2.5 2.5 0 0 0 0-5zM4.5 0h7a3.5 3.5 0 1 1 0 7h-7a3.5 3.5 0 1 1 0-7"/>
                            </svg>
                        </a>
                    </header>
                    <p class="comment-content">
                        <?php
                        echo $comment->getContent();
                        ?>
                    </p>
                    <a class="view-action--danger" href="deleteComment/id/<?php echo $comment->getId()?>"> Supprimer commentaire</a>
                </article>
            <?php  endforeach; ?>
    </section>
</section>


