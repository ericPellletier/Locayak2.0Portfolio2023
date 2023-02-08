<?php
    require_once "../configuration.php";
    include_once "../administration/header-admin.php";
?>

<body>
    <div id="login">
        <h3 class="text-center text-white pt-5"><?= _('Authentification')?></h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="p-3 mb-2 bg-gradient-primary text-white" action="traitement-authentification.php" method="post">
                            <h3 class="text-center text-info"></h3>
                            <div class="form-group">
                                <label for="username" class="p-3 mb-2 bg-gradient-primary text-white"><?= _('Email:')?></label><br>
                                <input type="text" name="mail" id="mail" class="form-control" required >
                            </div>
                            <div class="form-group">
                                <label for="password" class="p-3 mb-2 bg-gradient-primary text-white"><?= _('Mot De Passe:')?></label><br>
                                <input type="password" name="motDePasse" id="motDePasse" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="<?= _('Connexion')?>">
                            </div>
                            <div id="register-link" class="text-right">
                                <a href="inscription.php" class="btn btn-secondary"><?= _('Devenez membre')?></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>


<?php

    include_once "../administration/header-admin.php";
?>
