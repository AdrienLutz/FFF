<?php
include 'parts/functions.php';
include 'parts/header.php';


?>


<h3>Add a player</h3>
<!------------------- I. AFFICHAGE ------------------->
<section class="my-3" id="affichage">
    <div class="container">
        <div class="row">


            <!-- a. aller chercher les données dans la bdd -->
            <?php
            $reponse = $pdo->query('SELECT * FROM players');
            $players = $reponse->fetchAll();
            ?>

            <!-- b. afficher une des données dans un menu déroulant -->
            <form action="" method="POST">
                <div class="row">

                    <div class="col-4">
                        <label for="name"> Name : </label>
                        <textarea type="text" name="name" value="" placeholder="Zidane"></textarea>
                    </div>

                    <div class="col-4">
                        <label for="first_name"> First name : </label>
                        <textarea type="text" name="first_name" value="" placeholder="Zinedine"></textarea>
                    </div>

                    <div class="col-4">
                        <label for="age"> Age : </label>
                        <input type="number" min="16" max="40" name="age" value="" placeholder="22"></input>
                    </div>

                    <div class="col-4">
                        <label for="position"> Position : </label>
                        <select name="position">
                            <option value=""> choose a position </option>
                            <!-- <?php foreach ($players as $player) {
                                        echo ('<option value="' . $player['player_id'] . '">' . $player['position'] . '</option>');
                                    } ?> -->
                            <option value="goal keeper">goal keeper</option>
                            <option value="defender">defender</option>
                            <option value="middlefield">middlefield</option>
                            <option value="striker">striker</option>
                        </select>
                    </div>


                </div>
                <div class="my-3">
                    <input class="add_submit" type="submit" value="Add a new player ! ">
                </div>
            </form>

            <div class="my-3">
                <a href="restricted.php"><input class="add_submit" type="submit" value="See your team ! "></a>
            </div>


        </div>
    </div>
</section>

<!------------------- II. INSERTION ------------------->
<section class="my-3" id="insertion">

    <?php
    $errors = [];
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (empty($_POST["name"])) {
            $errors["name"] = 'Veuillez saisir un nom';
        }

        if (empty($_POST["first_name"])) {
            $errors["first_name"] = 'Veuillez saisir un prénom';
        }

        if (empty($_POST["first_name"])) {
            $errors["age"] = 'Veuillez saisir un âge';
        }

        if (empty($_POST["position"])) {
            $errors["position"] = 'Veuillez saisir une position';
        }

        if (count($errors) == 0) {
            // requête préparée pour insérer les valeurs dans les colonnes concernées
            $request = $pdo->prepare('INSERT INTO players (name, first_name, age, position, img) VALUES (:A, :B, :C, :D, :E)');

            //déclaration des paramètres
            $request->execute([
                "A" => $_POST["name"],
                "B" => $_POST["first_name"],
                "C" => $_POST["age"],
                "D" => $_POST["position"],
                "E" => "upload/foot.png",
            ]);
            header('Location: restricted.php');
        }
    }
    ?>


</section>

<?php
include 'parts/footer.php';
?>