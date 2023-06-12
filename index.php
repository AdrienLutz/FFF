<?php
include 'parts/functions.php';
include 'parts/header.php';
?>


<h4>The lucky 23</h4>

<section>
    <div class="container">
        <div class="row justify-content-evenly">
            <?php
            $request = $pdo->query('
            SELECT * FROM players 
            ');
            $players = $request->fetchAll();
            ?>
            <?php foreach ($players as $player) : ?>
                <div class="col-6 border p-3 rounded hover-blue">
                    <p>Name : <a class="card_link"><?php echo $player["name"] ?></a></p>
                    <p>First_name : <a class="card_link"><?php echo $player["first_name"] ?></a></p>
                    <p>Age : <a class="card_link"><?php echo $player["age"] ?></a></p>
                    <p>Position : <a class="card_link"><?php echo $player["position"] ?></a></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php
include 'parts/footer.php';
?>