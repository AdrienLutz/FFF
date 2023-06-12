<?php
include '../parts/functions.php';
include '../parts/header.php';
?>
<h2>Update car information</h2>
<section class="my-3" id="affichage">
    <div class="container">
        <div class="row">
            <?php
            $reponse = $pdo->query('SELECT * FROM car');
            $cars = $reponse->fetchAll();
            ?>
            <form action="" method="POST">
                <div class="row">
                    <div class="col-4">
                        <label for="author">Author : </label>
                        <select name="author">
                            <option value="">choose an author </option>
                            <?php foreach ($cars as $car) {
                                echo ('<option value="' . $car['car_id'] . '">' . $car['author'] . '</option>');
                            } ?>
                        </select>
                    </div>
                    <div class="col-4">
                        <label for="title"> Title : </label>
                        <input type="text" name="title" value="" placeholder="Jules Verne"></input>
                    </div>
                    <div class="col-4">
                        <label for="content"> Content : </label>
                        <textarea type="text" name="content" value="" placeholder="Once upon a time..."></textarea>
                    </div>
                </div>
                <div class="my-3">
                    <input class="add_submit" type="submit" value="Let's go">
                </div>
            </form>           
        </div>
    </div>
</section>
<section class="my-3" id="insertion">
    <?php   
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // requête préparée pour insérer les valeurs dans les colonnes concernées
        $car_id = $_GET['id'];
        $request = $pdo->prepare(
            "UPDATE car SET title = :A, content = :B, author = :C
            WHERE car_id = $car_id");
        $request->execute([
            "A" => $_POST["title"],
            "B" => $_POST["content"],
            "C" => $_POST["author"],         
        ]);
    }
    ?>
</section>
<?php
include("parts/footer.php");
?>