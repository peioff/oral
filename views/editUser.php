<?php
if(!empty($data)){

    $user = $data[0];
}
?>
<head>
    <title>Dashboard - Add user</title>
    <link rel="stylesheet" href="<?php echo ASSETSCSS; ?>dashboard.css"/>
</head>

<header class="view-header--animal">
    <h1 class="view-title">Modifier l'utilisateur : <?php echo $user->getUsername() ?> </h1>
</header>

<!--View Menu + content-->
<section class="dashboardView-container">
    <div class="form-container">
        <form class="form" action="<?php echo HOST; ?>updateUser/username/<?php echo $user->getUsername()?>" method="post">
            <fieldset class="adduser-fieldset">
                <legend >Informations de connection</legend>
                <ul>
                    <li>
                        <label class="form-field" for="password"> Mot de passe:
                            <input type="text" name="password" value="<?php echo $user->getPassword() ?>" required>
                        </label>
                    </li>
                    <li>
                        <label class="form-field" for="confirmPassword"> Confirmez le mot de passe:
                            <input type="text" name="confirmPassword" value="<?php echo $user->getPassword() ?>" required>
                        </label>
                    </li>
                    <li>
                        <label class="form-field" for="role"> Rôle:
                            <select name="role">
                                <option>Choose Role</option>
                                <option value="Employee">Employee</option>
                                <option value="Veterinary">Veterinary</option>
                            </select>
                        </label>
                    </li>
                </ul>
            </fieldset>
            <fieldset class="adduser-fieldset">
                <legend >Informations personnelles</legend>
                <ul>
                    <li>
                        <label class="form-field" for="lastname"> Nom:
                            <input type="text" name="lastname" value="<?php echo $user->getLastname() ?>" required>
                        </label>
                    </li>
                    <li>
                        <label class="form-field" for="firstname"> Prénom:
                            <input type="text" name="firstname" value="<?php echo $user->getFirstname() ?>" required>
                        </label>
                    </li>
                    <li>
                        <label class="form-field" for="email"> Email:
                            <input type="email" name="email" value="<?php echo $user->getEmail() ?>" required>
                        </label>
                </ul>
            </fieldset>
            <div class="form-buttonContainer">
                <button class="button button--success" type="submit">Enregistrer</button>
                <a class="button button--danger" href="<?php echo HOST; ?>dashboardUsers">Annuler</a>
            </div>

        </form>

    </div>
</section>

