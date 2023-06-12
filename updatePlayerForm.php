<?php
include 'parts/functions.php';
include 'parts/header.php';
session_start();
if(array_key_exists("email", $_SESSION)){
    header('Location: restricted.php');
} else {
    header('Location: login.php');
}
?>
<h3>Update a player</h3>
<!------------------- I. AFFICHAGE ------------------->
<section class="my-3" id="affichage">
    <div class="container">
        <div class="row">


            <!-- a. aller chercher les données dans la bdd -->
            <?php
            $reponse = $pdo->query('SELECT * FROM players');
            $players = $reponse->fetchAll();
            ?>

            <!-- b. afficher les données -->
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
                            <option value="goal keeper">goal keeper</option>
                            <option value="defender">defender</option>
                            <option value="middlefield">middlefield</option>
                            <option value="striker">striker</option>
                        </select>
                    </div>
                </div>
                <div class="my-3">
                    <input class="add_submit" type="submit" value="Update a player">
                </div>
            </form>
        </div>
    </div>
</section>

<!------------------- II. UPDATE ------------------->
<section class="my-3" id="update">
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $player_id = $_GET['id'];
        var_dump($_GET['id']);
        var_dump($player_id);
        $request = $pdo->prepare(
            "UPDATE players SET name = :A, first_name = :B, age = :C, position = :D 
            WHERE player_id = $player_id");
                    var_dump($_GET['id']);
                    var_dump($player_id);
        $request->execute([
            "A" => $_POST["name"],
            "B" => $_POST["first_name"],
            "C" => $_POST["age"],
            "D" => $_POST["position"],
        ]);
    }
    ?>
</section>

<?php
include 'parts/footer.php';
?>