
<?php
?>

<html>
    <head>
        <?php
        <title> Exercice PHP</title>
        include ("config.php");
        $db = connect();
        ?>
    </head>

    <body>
    <div id="container_demo" >

        <a class="hiddenanchor" id="toregister"></a>
        <a class="hiddenanchor" id="tologin"></a>
        <div id="wrapper">
            <div id="login" class="animate form">
                <form  action="mysuperscript.php" autocomplete="on">
                    <h1>Connexion</h1>
                    <p>
                        <label for="username" class="uname" data-icon="u" > Email ou nom d'utilisateur </label>
                        <input id="username" name="username" required="required" type="text" placeholder=""/>
                    </p>
                    <p>
                        <label for="password" class="youpasswd" data-icon="p"> Mot de passe </label>
                        <input id="password" name="password" required="required" type="password" placeholder="" />
                    </p>
                    <p class="keeplogin">
                        <input type="checkbox" name="loginkeeping" id="loginkeeping" value="loginkeeping" />
                        <label for="loginkeeping">Maintenir la connexion</label>
                    </p>
                    <p class="login button">
                        <input type="submit" value="Login" />
                    </p>
                    <p class="change_link">
                        Pas encore membre ?
                        <a href="#toregister" class="to_register">Rejoignez-nous</a>
                    </p>
                </form>
            </div>

            <div id="register" class="animate form">
                <form  action="mysuperscript.php" autocomplete="on">
                    <h1> Inscription </h1>
                    <p>
                        <label for="userfirstnamesignup" class="ufirstname" data-icon="u">Prenom </label>
                        <input id="userfirstnamesignup" name="userfirstnamesignup" required="required" type="text" placeholder="" />
                    </p>

                    <p>
                        <label for="userlastnamesignup" class="ulastname" data-icon="e" > Nom de Famille</label>
                        <input id="userlastnamesignup" name="userlastnamesignup" required="required" type="email" placeholder=""/>
                    </p>



                    <p>
                        <label for="agesignup" class="youage" data-icon="e" > Age</label>
                        <input id="agesignup" name="agesignup" required="required" type="email" placeholder=""/>
                    </p>





                    <p class="signin button">
                        <input type="submit" value="S'inscrire"/>
                    </p>

                    <?php

                    if (isset($_POST['firstname']) && isset ($_POST['lastname']) && isset($_POST['age']))
                    ?>

                </form>
            </div>

        </div>
    </div>

    </body>

    </html>
