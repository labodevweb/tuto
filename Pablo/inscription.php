<?php
if (array_key_exists(session_name(), $_COOKIE)) {
    session_start();

}

const MIN_PSEUDO_LEN = 3;
const MAX_PSEUDO_LEN = 80;
const MIN_PASSWORD_LEN = 6;

$errors = [];
mb_internal_encoding('UTF-8');
if ('POST' == $_SERVER['REQUEST_METHOD']) {
    require('config.php');


    if (array_key_exists('email', $_POST)) {
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "L'adresse email est invalide";
        } else {
            $stmt = $bdd->prepare('SELECT 1 FROM utilisateurs WHERE email = :email');
            $stmt->execute(['email' => $_POST['email']]);
            if (FALSE !== $stmt->fetchColumn()) {
                $errors['email'] = "Cette adresse email est déjà utilisée";
            }
        }
    } else {
        $errors['email'] = "L'adresse email est absente";
    }

       if (!$errors) {
        $insert = $bdd->prepare('INSERT INTO utilisateurs(email,date_de_naissance,club,nourriture,nom,prenom,civilite,accompagne) VALUES(:email,:date_de_naissance,:club,:nourriture,:nom,:prenom,:civilite,:accompagne)');
        $insert->execute(['email' => $_POST['email'],'date_de_naissance' => $_POST['date_de_naissance'],'civilite' => $_POST['civilite'],'nourriture' => $_POST['nourriture'],'nom' => $_POST['nom'],'accompagne' => $_POST['accompagne'],'prenom' => $_POST['prenom'],'club' => $_POST['club']]);
        $_SESSION['id']=$bdd->lastInsertId();
        header('Location: connexion.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css"/>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12">
<?php
if ($errors) {
    echo '<div class="alert alert-warning"><p>Veuillez corriger les erreurs ci-dessous afin de réaliser votre inscription :</p><ul><li>', implode('</li><li>', $errors), '</li></ul></div>';
}
?>
                    <form class="form-horizontal" method="post" action="">
                            <fieldset>
                                <div class="row form-group <?php if (array_key_exists('civilite', $errors)) echo 'has-error'; ?>">
                                    <legend>Inscription :</legend>
                                    <label for="civilite" id="civilite" class="col-sm-2 control-label" value="<?php if (array_key_exists('civilite', $_POST)) echo htmlspecialchars($_POST['civilite']); ?>">Civilité :</label>
                                    <select name="civilite" class="col-sm-10 form-control">
                                        <option value="Mr">Mr</option>
                                        <option value="Mme">Mme</option>
                                    </select>
                                </div>
                                <div class="row form-group <?php if (array_key_exists('nom', $errors)) echo 'has-error'; ?>">
                                    <label for="Nom" class="col-sm-2 control-label">Nom :</label>
                                    <input type="text" id="nom" name="nom" required class="col-sm-10 form-control" value="<?php if (array_key_exists('nom', $_POST)) echo htmlspecialchars($_POST['nom']); ?>" />
                                </div>
                                <div class="row form-group <?php if (array_key_exists('nom', $errors)) echo 'has-error'; ?>">
                                    <label for="Prénom" class="col-sm-2 control-label">Prénom :</label>
                                    <input type="character" id="prenom" name="prenom" required class="col-sm-10 form-control" value="<?php if (array_key_exists('prenom', $_POST)) echo htmlspecialchars($_POST['prenom']); ?>" />
                                </div>
                                <div class="row form-group <?php if (array_key_exists('email', $errors)) echo 'has-error'; ?>">
                                    <label for="email" class="col-sm-2 control-label">Email :</label>
                                    <input type="email" id="email" name="email" class="col-sm-10 form-control" value="<?php if (array_key_exists('email', $_POST)) echo htmlspecialchars($_POST['email']); ?>" />
                                </div>
                                <div class="form-group <?php if (array_key_exists('date_de_naissance', $errors)) echo 'has-error'; ?>">
                                        <link rel="stylesheet" type="text/css" href="tcal.css" />
                                            <script type="date/javascript" src="tcal.js"></script> 
                                        <label type="date"for="date_de">Date de naissance :</label>
                                        <br/>
                                        <input type="date" required name="date_de_naissance" class="tcal form-control" value= "<?php if (array_key_exists('date_de_naissance', $errors) || array_key_exists('date_de_naissance', $errors)) echo 'has-error'; ?> "/>
                                 </div>
                                 <div class="form-group <?php if (array_key_exists('club', $errors)) echo 'has-error'; ?>">
                                    <label for="club" required value="<?php if (array_key_exists('club', $_POST)) echo htmlspecialchars($_POST['club']); ?>">Choisissez votre club :</label>
                                    <select name="club" id="club">
                                       
                                        <option value="Ligue Regionale du Lyonnais de Basketball">Ligue Regionale du Lyonnais de Basketball</option>
                                        <option value="Bron Basket Club<">Bron Basket Club</option>
                                        <option value="Basket Charpennes Croix Luizet">Basket Charpennes Croix Luizet</option>
                                        <option value="Handisport Lyonnais">Handisport Lyonnais</option>
                                        <option value="Asvel Basket">Asvel Basket</option>
                                        <option value="ALMR Basket">ALMR Basket</option>
                                        <option value="Lyon Basket Feminin">Lyon Basket Feminin</option>
                                        <option value="Lyon P.E.S.D">Lyon P.E.S.D</option>
                                        <option value="Eveil de Lyon">Eveil de Lyon</option>
                                        <option value="Astroballe">Astroballe</option>
                                    </select>
                                </div>
                            
                                   
                              <div class="form-group <?php if (array_key_exists('nbr_personnes', $errors)) echo 'has-error'; ?>">

                            <label for="accompagne">Nombre de personnes accompagnés:</label>
                            <input type="number" min="0" max="10" id="accompagne" name="accompagne" value="<?php if (array_key_exists('accompagne', $_POST)) echo htmlspecialchars($_POST['accompagne']); ?>" />
                            </div>


                              <div class="form-group <?php if (array_key_exists('nourriture', $errors)) echo 'has-error'; ?>">

                           
                                  <label for="nourriture">Qu'apportez-vous à manger?</label>
                                   <input type="text" name="nourriture" id="nourriture" value="<?php if (array_key_exists('nourriture', $_POST)) echo htmlspecialchars($_POST['nourriture']); ?>"/>
                                </div>
                        </fieldset>
                        <input type="submit" class="btn btn-default" />
                        <button type="submit" class="btn btn-default" onclick="document.location.href='connexion.php';" />Annuler</button>

                    </form>
                </div>
            </div>
        </div>
    </body>
</html>