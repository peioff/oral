<?php
?>
<head>
    <title>Dashboard - Add user</title>
    <link rel="stylesheet" href="<?php echo ASSETSCSS; ?>dashboard.css"/>
</head>

<header class="view-header--animal">
    <h1 class="view-title">Ajouter un utilisateur</h1>
</header>

<!--View Menu + content-->
<section class="dashboardView-container">
    <div class="form-container">
        <form class="form" action="<?php echo HOST; ?>addUserToDatabase" method="post">
            <fieldset class="adduser-fieldset">
                <legend >Informations de connection</legend>
                <ul>
                    <li>
                        <label class="form-field" for="username"> Nom d'utilisateur:
                            <input type="text" name="username" required>
                        </label>
                    </li>
                    <li>
                        <label class="form-field" for="password"> Mot de passe:
                            <input type="password" name="password" required>
                        </label>
                    </li>
                    <li>
                        <label class="form-field" for="confirmPassword"> Confirmez le mot de passe:
                            <input type="password" name="confirmPassword" required>
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
                            <input type="text" name="lastname" required>
                        </label>
                    </li>
                    <li>
                        <label class="form-field" for="firstname"> Prénom:
                            <input type="text" name="firstname" required>
                        </label>
                    </li>
                    <li>
                        <label class="form-field" for="email"> Email:
                            <input type="email" name="email" required>
                        </label>
                </ul>
            </fieldset>
            <div class="form-buttonContainer">
                <button class="button button--success" type="submit">Ajouter</button>
                <a class="button button--danger" href="<?php echo HOST; ?>dashboardUsers">Annuler</a>
            </div>

        </form>

    </div>
</section>

