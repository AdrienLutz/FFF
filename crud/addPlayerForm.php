<?php
include '../parts/functions.php';
include '../parts/header.php';
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
                        <textarea type="number" min="16" max="40" name="age" value="" placeholder="22"></textarea>
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


        </div>
    </div>
</section>

<!------------------- II. INSERTION ------------------->
<section class="my-3" id="insertion">

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // requête préparée pour insérer les valeurs dans les colonnes concernées
        $request = $pdo->prepare('INSERT INTO players (player_name, player_price, img) VALUES (:A, :B, :C)');

        //déclaration des paramètres
        $request->execute([
            "A" => $_POST["player_name"],
            "B" => $_POST["player_price"],
            "C" => $_POST["img"],
        ]);
    }
    ?>


</section>

<?php
include '../parts/footer.php';
?>