<?php
session_start();

if (isset($data)) {
    $users = $data;
}

?>
<head>
    <title>Dashboard - Users</title>
</head>

<header class="view-header">
    <h1 class="view-title">Gestion utilisateurs</h1>
    <div class="view-search">
        Barre de recherche
    </div>
    <div class="view-actions">
        <a class="view-action" href="<?php echo HOST; ?>addUser.php">Ajouter un utilisateur</a>
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
    <section class="users">
        <div class="user-table-row">
            <p class="user-table-cell">Username</p>
            <p class="user-table-cell">Password</p>
            <p class="user-table-cell">Role</p>
            <p class="user-table-cell ">FirstName</p>
            <p class="user-table-cell lastname">LastName</p>
            <p class="user-table-cell mail ">Email</p>
            <p class="user-table-cell">Actions</p>

        </div>
        <?php foreach ($users as $user):
            if ($user->getRole() != 'Admin'){
            ?>
            <article class="user">
                <div class="user-table-row user-table-row--content">
                    <p class="user-table-cell"><?php echo $user->getUsername()?></p>
                    <p class="user-table-cell"><?php echo $user->getPassword()?></p>
                    <p class="user-table-cell"><?php echo $user->getRole()?></p>
                    <p class="user-table-cell"><?php echo $user->getFirstname()?></p>
                    <p class="user-table-cell lastname"><?php echo $user->getLastname()?></p>
                    <p class="user-table-cell mail"><?php echo $user->getEmail()?></p>
                    <div class="user-table-cell user-table-cell--actions">
                        <a title="Editer utilisateur" href="editUser/username/<?php echo $user->getUsername() ?>">
                            <svg  class="button-edit" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                  viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd"
                                      d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                            </svg>
                        </a>
                        <a title="Supprimer utilisateur"  href="deleteUser/username/<?php echo $user->getUsername()?>">
                            <svg class="button-delete" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                 viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </article>
        <?php } endforeach; ?>
    </section>
</section>


