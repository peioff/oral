<?php
?>
<head>
    <title>Dashboard - Add user</title>
    <link rel="stylesheet" href="<?php echo ASSETSCSS; ?>dashboard.css"/>
    <link rel="stylesheet" href="<?php echo ASSETSCSS;?>toastr.css">
    <script type="text/javascript" src="<?php echo SCRIPTS; ?>jquery3.7.1.js" defer ></script>
    <script type="text/javascript" src="<?php echo SCRIPTS; ?>toastr.js" defer ></script>
    <script type="text/javascript" src="<?php echo SCRIPTS; ?>addUserApproval.js" defer></script>
</head>

<header class="view-header--animal">
    <h1 class="view-title">Ajouter un utilisateur</h1>
</header>

<!--View Menu + content-->
<section class="dashboardView-container">
    <div class="form-container">
        <form class="form" id="addUserForm" method="post">
            <fieldset class="adduser-fieldset">
                <legend >Informations de connection</legend>
                <ul>
                    <li>
                        <label class="form-field" for="username"> Nom d'utilisateur:
                            <input id="formUsername" type="text" name="username" required>
                        </label>
                    </li>
                    <li>
                        <label class="form-field" for="password"> Mot de passe:
                            <input id="formPassword" type="password" name="password" required>
                        </label>
                    </li>
                    <li>
                        <label class="form-field" for="confirmPassword"> Confirmez le mot de passe:
                            <input id="formConfirmPassword" type="password" name="confirmPassword" required>
                        </label>
                    </li>
                    <li>
                        <label class="form-field" for="role"> Rôle:
                            <select id="formRole" name="role">
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
                            <input id="formLastname" type="text" name="lastname" required>
                        </label>
                    </li>
                    <li>
                        <label class="form-field" for="firstname"> Prénom:
                            <input id="formFirstname" type="text" name="firstname" required>
                        </label>
                    </li>
                    <li>
                        <label class="form-field" for="email"> Email:
                            <input id="formEmail" type="email" name="email" required>
                        </label>
                </ul>
            </fieldset>
            <div class="form-buttonContainer">
                <button class="button button--success" type="submit" onclick="formApproval()">Ajouter</button>
                <a class="button button--danger" href="<?php echo HOST; ?>dashboardUsers">Annuler</a>
            </div>

        </form>

    </div>
</section>

