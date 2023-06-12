<?php
include '../parts/functions.php';
include '../parts/header.php';
?>
<h3>Add a car</h3>
<!------------------- I. AFFICHAGE ------------------->
<section class="my-3" id="affichage">
    <div class="container">
        <div class="row">

            
            <!-- a. aller chercher les données dans la bdd -->
            <?php
            $reponse = $pdo->query('SELECT * FROM cars');
            $cars = $reponse->fetchAll();
            ?>

            <!-- b. afficher une des données dans un menu déroulant -->
            <form action="" method="POST">
                <div class="row">
                    <div class="col-4">
                        <label for="car_name">Name : </label>
                        <select name="car_name">
                            <option value="">choose a name </option>
                            <?php foreach ($cars as $car) {
                                echo ('<option value="' . $car['car_id'] . '">' . $car['car_name'] . '</option>');
                            } ?>
                        </select>
                    </div>
                    <div class="col-4">
                        <label for="price"> Price : </label>
                        <input type="number" min="1" name="car_price" value="" placeholder="10 000£"></input>
                    </div>
                    <div class="col-4">
                        <label for="img"> Image : </label>
                        <textarea type="text" name="img" value="" placeholder="upload/batmobile_1989.jpg"></textarea>
                    </div>
                </div>
                <div class="my-3">
                    <input class="add_submit" type="submit" value="Add a new car ! ">
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
        $request = $pdo->prepare('INSERT INTO cars (car_name, car_price, img) VALUES (:A, :B, :C)');

        //déclaration des paramètres
        $request->execute([
            "A" => $_POST["car_name"],
            "B" => $_POST["car_price"],
            "C" => $_POST["img"],
        ]);
    }
    ?>


</section>

<?php
include '../parts/footer.php';
?>