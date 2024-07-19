<?php
?>

<head>
    <title>Arcadia - Connexion</title>
    <link rel="stylesheet" href="<?php echo ASSETSCSS;?>main.css">
    <link rel="stylesheet" href="<?php echo ASSETSCSS;?>connect.css">
</head>
<body class="body" id="body">
<header id="header">
    <svg class="svg" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"  viewBox="0 0 16 16">
        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
    </svg>
    <p class="text">Espace réservé aux administrateur et aux collaborateurs
        <a id="back" href="<?php echo HOST;?>home">(retour accueil <svg class="label-svg"  xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"  viewBox="0 0 16 16">
                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5"/>
            </svg>)</a>
    </p>
</header>
<main class="main">
    <form class="form flux">
        <ul class="form-container">
            <li class="field">
                <label class="label" for="username">
                    <p class="label-text">Identifiant</p>
                    <input class="input" type="text" name="username">
                </label>
            </li>
            <li class="field">
                <label class="label" for="password">
                    <div class="label-header">
                        <p class="label-text">Mot de passe</p>
                        <div class="label-container">
                            <svg class="label-svg"  xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"  viewBox="0 0 16 16">
                                <path d="m10.79 12.912-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7 7 0 0 0 2.79-.588M5.21 3.088A7 7 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474z"/>
                                <path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829zm4.95.708-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829zm3.171 6-12-12 .708-.708 12 12z"/>
                            </svg>
                            <p class="label-text">Masquer</p>

                        </div>

                    </div>
                    <input class="input" type="password" name="password">
                </label>
            </li>
            <li class="form-buttonContainer">
                <button class="button button--form" type="submit" formaction="<?php echo HOST; ?>connection" formmethod="post">Se connecter</button>
            </li>
        </ul>
    </form>

</main>
</body>