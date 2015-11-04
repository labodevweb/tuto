<?php
define('LOGIN','pablo');
define('PASSWORD','pablo');
$errorMessage='';

if(!empty($_POST)) 
  {
    // Les identifiants sont transmis ?
    if(!empty($_POST['login']) && !empty($_POST['password'])) 
    {
      // Sont-ils les mêmes que les constantes ?
      if($_POST['login'] !== LOGIN) 
      {
        $errorMessage = 'Mauvais login !';
      }
        elseif($_POST['password'] !== PASSWORD) 
      {  
        $errorMessage = 'Mauvais password !';
      }
        else
      {
        // On ouvre la session
        session_start();
        // On enregistre le login en session
        $_SESSION['login'] = LOGIN;
        // On redirige vers le fichier admin.php
        header('Location: index.php');
        exit();
      }
    }
      else
    {
      $errorMessage = 'Veuillez inscrire vos identifiants svp !';
    }
  }


?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css"/>
                <link rel="stylesheet" type="text/css" href="styles.css"/>

    </head>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" name="login" class="form-horizontal" method="post" accept-charset="utf-8">

      <fieldset>
        <?php
          // Rencontre-t-on une erreur ?
          if(!empty($errorMessage)) 
          {
            echo '<p>', htmlspecialchars($errorMessage) ,'</p>';
          }
        ?>

    <body>
    <div class="block1">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12">
                   
                    <form class="form-horizontal" method="POST">
                        <div class="row">
                            <label for="login" id="login" name="login" class="col-sm-2 control-label">Nom d'utilisateur</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" placeholder="Entrer votre login"id="login" name="login">
                            </div>
                        </div>
                        <br/>
                        <div class="form-group">
                            <label for="password" class="col-sm-2 control-label">Mot de passe</label>
                            <div class="col-sm-3">
                                <input type="password" class="form-control" placeholder="Entrer votre mot de passe" id="password" name="password">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <a class="btn btn-success" href='inscription.php'" value"S'inscrire">S'inscrire</a>
<input class="btn btn-success btn btn-success" type="submit" name="submit" value="Connexion" />                                

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>